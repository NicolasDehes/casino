<?php

require_once("../Autoloader.php");

$action = $_GET['action'];
$data = [
    "message" => "Une erreur est survenue."
];
$statusCode = 500;

// Add an admin key peut etre un jour

switch ($action) {
    case "changeAdmin":
        $utilisateurService = new \modele\service\UtilisateurService();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $statusCode = 405;
            $data['message'] = "Méthode invalide.";
        }
        $id = $_POST['id'];
        if (is_null($id) || is_nan($id)) {
            $statusCode = 400;
            $data['message'] = "Paramètre id manquant.";
            break;
        }
        $result = $utilisateurService->changeAdmin($id);
        if ($result === false) {
            $data['message'] = "Une erreur est survenue au niveau de la base";
            $statusCode = 400;
            break;
        }
        $statusCode = 200;
        $data['message'] = "Le changement des droits s'est bien appliqué.";
        break;

    case "updateGameById":
        if($_SERVER['REQUEST_METHOD'] !== "POST"){
            $statusCode = 405;
            $data['message'] = "Méthode invalide.";
            break;
        }
        $id = (is_null($_POST['id']) || $_POST['id'] == "") ? null : intval($_POST['id']);
        $min = (is_null($_POST['min']) || $_POST['min'] == "") ? null : intval($_POST['min']);
        $max = (is_null($_POST['max']) || $_POST['max'] == "") ? null : intval($_POST['max']);
        if(is_null($id) || is_null($min)){
            $statusCode = 400;
            $data['message'] = "Paramètre(s) manquant(s)";
            break;
        }
        if(!is_null($max) && $min > $max){
            $statusCode = 400;
            $data['message'] = "Le montant maximmum ne peut pas être inférieur au minimum.";
            break;
        }
        $jeuService = new \modele\service\JeuService();
        $result = $jeuService->editMise($id, $min, $max);
        if ($result === false) {
            $statusCode = 400;
            $data['message'] = "Une erreur s'est produite lors de la modification de la base de données.";
            break;
        }
        $statusCode = 200;
        $data['message'] = "Le jeu a bien été modifié.";
        $data['min'] = $min;
        $data['max'] = $max;
        break;
    default:
        $statusCode = 404;
        $data['message'] = "Action inconnu.";
        break;
}

header('Content-Type: application/json; charset=utf-8');
http_response_code($statusCode);
echo json_encode($data);
