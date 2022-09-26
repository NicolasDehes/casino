<?php

require_once("../Autoloader.php");

$idUser = $_POST['idUser'];
$mise = $_POST['mise'];

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

    

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode($data);

} catch (Exception $e) {
    
    $data = $e;
    
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
}