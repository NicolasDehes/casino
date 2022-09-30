<?php

require_once("../Autoloader.php");

use modele\service\UtilisateurService;

$action = $_GET['action'];

$credit = $_POST['credit'];
$idUser = $_POST['idUser'];

if($credit == null || $idUser == null){
    $data = [
        "message" => "Un paramètre est manquant"
    ];
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(418);
    echo json_encode($data);
    exit;
}
try{
    
    $UtilisateurService = new UtilisateurService();
    
    $data = $UtilisateurService->changeSolde($idUser, $credit);

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode($data);

} catch (Exception $e) {
    
    $data = $e;
    
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
}