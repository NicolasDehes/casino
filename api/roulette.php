<?php
session_start();
require_once("../Autoloader.php");

use modele\service\UtilisateurService;
use modele\service\HistoriqueService;

$idUser = (is_null($_POST['idUser']) || $_POST['idUser'] == "") ? null : intval($_POST['idUser']);
$mise = (is_null($_POST['mise']) || $_POST['mise'] == "") ? null : intval($_POST['mise']);

if(is_null($mise) || is_null($idUser)){
    $data = [
        "error" => 1,
        "message" => "Un paramètre est manquant"
    ];
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
    exit;
}
try{

    $jeuService = new \modele\service\JeuService();
    $jeu = $jeuService->findById(1);
    if($mise < (int) $jeu['minimum'] || $mise > (int) $jeu['maximum']){
        $data['message'] = "Mise Invalide";
        header('Content-Type: application/json; charset=utf-8');
        http_response_code(400);
        echo json_encode($data);
        exit;
    }
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
        'random' => $random
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
