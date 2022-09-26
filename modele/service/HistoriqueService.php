<?php 

namespace modele\service;

use \modele\dao\HistoriqueDAO;

class HistoriqueService { 

    private $hHistoriqueDao;

    public function __construct() 
    {   

        try {
            // Instancier la classe HistoriqueDao : appel du constructeur __construct() 
            // Si problème, la classe HistoriqueDao lève une exception
            $this->hHistoriqueDao = new HistoriqueDao();
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

    public function findByUserAndGame($jeu, $idUser) : array
    { 
        // Enregistrement du message dans le fichier log

        // Appel de la méthode findAll() de la classe HistoriqueDao
        // Retourne le tableau des utilisateurs
        $results = $this->hHistoriqueDao->findByUserAndGame($jeu, $idUser);

        // Enregistrement du tableau dans le fichier log
    
        // Retourne le tableau des utilisateurs
        return $results;
    }
    
    public function findByUser($jeu) : array
    { 
        // Enregistrement du message dans le fichier log

        // Appel de la méthode findAll() de la classe HistoriqueDao
        // Retourne le tableau des utilisateurs
        $results = $this->hHistoriqueDao->findByUser($jeu);

        // Enregistrement du tableau dans le fichier log
    
        // Retourne le tableau des utilisateurs
        return $results;
    }
}
?>