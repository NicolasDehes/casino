<?php

require_once("../Autoloader.php");

use modele\service\ForgetPasswordService;

$ForgetPasswordService = new ForgetPasswordService();

$action = $_GET['action'];

try{

    switch($action){

        case "create":

            $mail = $_POST['mail'];

            if($mail == null){
                $data = [
                    "message" => "Un paramètre est manquant"
                ];
                header('Content-Type: application/json; charset=utf-8');
                http_response_code(418);
                echo json_encode($data);
                exit;
            }

            $newHach = $ForgetPasswordService->create($mail);

            $message = "Nouveau hash créé.";
            
            if($newHach == false){
                $message = "Mail invalide";
            }


            $data = [
                "hash" => $newHach,
                "mail" => $mail,
                "message" => $message
            ];

            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode($data);
            break;
        
        case "check":

            $hash = $_POST['hash'];
            $mail = $_POST['mail'];

            if($hash == null || $mail == null){
                $data = [
                    "message" => "Un paramètre est manquant"
                ];
                header('Content-Type: application/json; charset=utf-8');
                http_response_code(418);
                echo json_encode($data);
                exit;
            }

            $response = $ForgetPasswordService->check($hash,$mail);

            $data = [
                "result" => $response
            ];

            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode($data);
            break;

        case "delete":

            $hash = $_POST['hash'];

            if($hash == null){
                $data = [
                    "message" => "Un paramètre est manquant"
                ];
                header('Content-Type: application/json; charset=utf-8');
                http_response_code(418);
                echo json_encode($data);
                exit;
            }

            $response = $ForgetPasswordService->delete($hash);

            $data = [
                "result" => $response
            ];

            header('Content-Type: application/json; charset=utf-8');
            http_response_code(200);
            echo json_encode($data);

            break;
        
        default:

            $data = [
                "message" => "Action inconnu"
            ];
            header('Content-Type: application/json; charset=utf-8');
            http_response_code(418);
            echo json_encode($data);

            break;
    }

    exit;

} catch (Exception $e) {
    
    $data = $e;
    
    header('Content-Type: application/json; charset=utf-8');
    http_response_code(400);
    echo json_encode($data);
}