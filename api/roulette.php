<?php

require_once("../Autoloader.php");

use modele\service\UtilisateurService;
use modele\service\HistoriqueService;

$idUser = (int)$_POST['idUser'];
$mise = (int)$_POST['mise'];

if($mise == null || $idUser == null){
    $data = [
        "message" => "Un paramètre est manquant"
    ];
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(418);
    echo json_encode($data);
    exit;
}
try{

    $roulette = [-1,-1,-1,-1,1,1,1,2,2,3];  
    $random = rand(0,count($roulette));
    $gain = $roulette[$random]*$mise;

    $utilisateurService = new UtilisateurService();
    $newSolde = $utilisateurService->changeSolde($idUser,$gain);

    $historiqueService = new HistoriqueService();
    $result = $historiqueService->addHistorique($idUser, $mise, $gain, 1);

    $data = [
        "result" => $gain >= $mise,
        "mise" => $mise,
        "gain" => $gain,
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