<?php

require_once("../Autoloader.php");

use modele\service\UtilisateurService;
use modele\service\HistoriqueService;

$idUser = (int)$_POST['idUser'];
$mise = (int)$_POST['mise'];

if($mise == null || $idUser == null){
    $data = [
        "error" => 1,
        "message" => "Un paramètre est manquant"
    ];
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(418);
    echo json_encode($data);
    exit;
}
try{

    $utilisateurService = new UtilisateurService();
    $isSoldeOk = $utilisateurService->isSoldeOk($idUser, $mise);

    if(!$isSoldeOk){
        $data = [
            "error" => 2,
            "message" => "Le solde de l'utilisateur est insuffisant."
        ];
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(401);
        echo json_encode($data);
        exit;
    }

    $roulette = [-1,0,-1,2,-1,1,-1,1];  // -1 => 0, 0 => 1, 1 => 2, 2 => 3
    $random = rand(0, count($roulette)-1);
    $gain = $roulette[$random]*$mise;

    $newSolde = $utilisateurService->changeSolde($idUser,$gain);

    $historiqueService = new HistoriqueService();
    $result = $historiqueService->addHistorique($idUser, $mise, $gain, 1);

    $gainToPrint = $gain;

    if($gain >= 0){
        $gainToPrint+= $mise;
    }

    $data = [
        "result" => $gain >= $mise,
        "gain" => $gainToPrint,
        "newSolde" => $newSolde,
        'random' => $random,
    ];

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode($data);

} catch (Exception $e) {
    
    $data = $e;
    
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
}