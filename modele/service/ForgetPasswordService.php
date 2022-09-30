<?php 

namespace modele\service;


use modele\dao\ForgetPasswordDAO;
use modele\dao\UtilisateurDAO;

class ForgetPasswordService { 

    private $hForgetPasswordDAO;

    public function __construct() 
    {   

        try {
            $this->hForgetPasswordDAO = new ForgetPasswordDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    } 

    //Check si le mail renseigner est dans la base, si oui crée un hash de récup
    //                                              si non return false
    public function create($mail){
        $UtilisateurDAO = new UtilisateurDAO();
        $didMailExist = $UtilisateurDAO->didMailExist($mail);
        if($didMailExist){
            return $this->hForgetPasswordDAO->create($mail);
        }
        return false;
    }

    public function check($hash, $mail){
        $response = $this->hForgetPasswordDAO->check($hash, $mail);
        return $response;
    }

    public function delete($hash){
        $response = $this->hForgetPasswordDAO->delete($hash);
        return $response;
    }
	
    public function __destruct()  
    {  
    }

}
?>