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

    $random = rand(0,1);
    if($random){
        $gain = $gain * 2;
    } else {

    }
    $gain = $random*$mise;

    $utilisateurService = new UtilisateurService();
    $newSolde = $utilisateurService->changeSolde($idUser,$gain);

    $historiqueService = new HistoriqueService();
    $result = $historiqueService->addHistorique($idUser, $mise, $gain, 2);

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