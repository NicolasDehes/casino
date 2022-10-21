<?php 

namespace modele\service;

use LDAP\Result;
use modele\dao\JeuDAO;

class JeuService { 

    private $hJeuDao;

    public function __construct() 
    {   

        try {
            // Instancier la classe JeuDao : appel du constructeur __construct() 
            // Si problème, la classe JeuDao lève une exception
            $this->hJeuDao = new JeuDAO();
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

    public function findAll() : array
    { 
        // Enregistrement du message dans le fichier log

        // Appel de la méthode findAll() de la classe JeuDao
        // Retourne le tableau des utilisateurs
        $results = $this->hJeuDao->findAll();

        // Enregistrement du tableau dans le fichier log
    
        // Retourne le tableau des utilisateurs
        return $results;
    }

    public function findByName($name){
        $result = $this->hJeuDao->findByName($name);
        return $result;
    }

    public function findById($id){
        $result = $this->hJeuDao->findById($id);
        return $result;
    }

    public function editMise($id,$min,$max){
        $result = $this->hJeuDao->editMise($id,$min,$max);
        return $result;
    }

}
?>