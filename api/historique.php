<?php

require_once("../Autoloader.php");

use modele\service\HistoriqueService;

$jeu = $_POST['jeu'];
$idUser = $_POST['idUser'];

if($jeu == null || $idUser == null){
    $data = [
        "message" => "Un paramètre est manquant"
    ];
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(418);
    echo json_encode($data);
    exit;
}
try{
    
    $historiqueService = new HistoriqueService();
    
    $data = $historiqueService->findByUserAndGame($jeu, $idUser);

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode($data);

} catch (Exception $e) {
    
    $data = $e;
    
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
}