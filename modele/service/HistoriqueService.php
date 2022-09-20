<?php 
namespace modele\service;

class HistoriqueService { 

    private $hHistoriqueDao;

    public function __construct() 
    {   
        // Enregistrement du message dans le fichier log
        error_log("HistoriqueService -> __construct()".PHP_EOL, 3, LOGFILE);

        try {
            // Instancier la classe HistoriqueDao : appel du constructeur __construct() 
            // Si problème, la classe HistoriqueDao lève une exception
            $this->hHistoriqueDao = new \modele\dao\HistoriqueDao();
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
        error_log("HistoriqueService -> __destruct".PHP_EOL, 3, LOGFILE);	
    }

    public function findByUserAndGame($jeu, $idUser) : array
    { 
        // Enregistrement du message dans le fichier log
        error_log("HistoriqueService -> findAll()".PHP_EOL, 3, LOGFILE);

        // Appel de la méthode findAll() de la classe HistoriqueDao
        // Retourne le tableau des utilisateurs
        $results = $this->hHistoriqueDao->findByUserAndGame($jeu, $idUser);

        // Enregistrement du tableau dans le fichier log
        error_log("HistoriqueService -> Utilisateurs : ".print_r($results, TRUE), 3, LOGFILE);

        // Retourne le tableau des utilisateurs
        return $results;
    }
}
?>