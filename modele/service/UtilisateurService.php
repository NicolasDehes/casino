<?php 

namespace modele\service;

use Exception;
use \modele\dao\UtilisateurDAO;

class UtilisateurService { 

    // Référence sur l'objet UtilisateurDao
    private $hUtilisateurDAO;

        /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet UtilisateurService
    */ 
    public function __construct() 
    {   
        // Enregistrement du message dans le fichier log

        try {
            // Instancier la classe UtilisateurDao : appel du constructeur __construct() 
            // Si problème, la classe UtilisateurDao lève une exception
            $this->hUtilisateurDAO = new UtilisateurDAO();
        }
        // Propagation de l'exception : l'exception est transmise à la méthode appelante
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    } 
	
    /**  
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
        // Enregistrement du message dans le fichier log
    }

    public function check_login($login, $password)
    { 
        // Enregistrement du message dans le fichier log

        // Appel de la méthode check_login() de la classe UtilisateurDao
        // Retourne true si authentification ok SINON false 
        $bRet = $this->hUtilisateurDAO->check_login($login, $password);

        // Retourne true si authentification ok SINON false
        return $bRet;
    }

    public function findAll() : array
    { 
        // Enregistrement du message dans le fichier log

        // Appel de la méthode findAll() de la classe UtilisateurDao
        // Retourne le tableau des utilisateurs
        $results = $this->hUtilisateurDAO->findAll();

        // Enregistrement du tableau dans le fichier log
        
        // Retourne le tableau des utilisateurs
        return $results;
    }

    public function createUser($utilisateur)
    { 
        // Enregistrement du message dans le fichier log

        try {
            // Appel de la méthode create() de la classe UtilisateurDao
            // Retourne true si utilisateur créé SINON false
            $id = $this->hUtilisateurDAO->create($utilisateur);
        }
        // Propagation de l'exception : utilisateur existe déjà
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        // Retourne true si utilisateur créé SINON false 
        return $id;
    }

    public function deleteUser($id)
    { 
        // Enregistrement du message dans le fichier log

        try {
            // Appel de la méthode deleteUser() de la classe UtilisateurDao
            // Retourne true si utilisateur créé SINON false
            $bRet = $this->hUtilisateurDAO->deleteUser($id);
        }
        // Propagation de l'exception : suppression impossible
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        // Retourne true si utilisateur a été supprimé 
        return $bRet;
    }


    public function getUserById($id){
        try {
            $bRet = $this->hUtilisateurDAO->getUserById($id);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $bRet;
    }

    public function changeSolde($id,$gain){
        try {
            $bRet = $this->hUtilisateurDAO->changeSolde($id,$gain);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $bRet;
    }

    public function isSoldeOk($id,$mise){
        try {
            $bRet = $this->hUtilisateurDAO->isSoldeOk($id,$mise);
        }
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $bRet;
    }

    public function updateMDPUser($email,$mdp){
        try {
            $bRet = $this->hUtilisateurDAO->updateMDPUser($email,$mdp);
        }
        catch (\Exception $e) {
            throw new \Exception($e);
        }
        return $bRet;
    }

    public function updateUser($id, $nom, $prenom, $email, $mdp): bool{
        try{
            $bRet = $this->hUtilisateurDAO->updateUser($id, $nom, $prenom, $email);
            if($bRet && $mdp != null && $mdp!=""){
                $bRet = $this->updateMDPUser($email,$mdp);
            }
        }
        catch (\Exception $e) {
            throw new \Exception($e);
        }
        return $bRet;
    }

    public function changeAdmin($id){
        try{
            $result = $this->hUtilisateurDAO->changeAdmin($id);
            if($result === false){
                throw new Exception("Une erreur s'est produite lors du changement de rôle");
            }
        } catch (Exception $e) {
            throw new Exception($e);
        }
        return $result;
    }
}
?>

