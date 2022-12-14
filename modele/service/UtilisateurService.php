<?php 
namespace modele\service;

// Inclure le fichier des constantes : il contient notamment la constante LOGFILE
//include(__DIR__.'/../../Constantes.php');

class UtilisateurService { 

    // Référence sur l'objet UtilisateurDao
    private $hUtilisateurDao;

        /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet UtilisateurService
    */ 
    public function __construct() 
    {   
        // Enregistrement du message dans le fichier log
        error_log("UtilisateurService -> __construct()".PHP_EOL, 3, LOGFILE);

        try {
            // Instancier la classe UtilisateurDao : appel du constructeur __construct() 
            // Si problème, la classe UtilisateurDao lève une exception
            $this->hUtilisateurDao = new \modele\dao\UtilisateurDao();
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
        error_log("UtilisateurService -> __destruct".PHP_EOL, 3, LOGFILE);	
    }

    public function check_login($login, $password)
    { 
        // Enregistrement du message dans le fichier log
        error_log("UtilisateurService -> check_login()".PHP_EOL, 3, LOGFILE);

        // Appel de la méthode check_login() de la classe UtilisateurDao
        // Retourne true si authentification ok SINON false 
        $bRet = $this->hUtilisateurDao->check_login($login, $password);

        // Retourne true si authentification ok SINON false
        return $bRet;
    }

    public function findAll() : array
    { 
        // Enregistrement du message dans le fichier log
        error_log("UtilisateurService -> findAll()".PHP_EOL, 3, LOGFILE);

        // Appel de la méthode findAll() de la classe UtilisateurDao
        // Retourne le tableau des utilisateurs
        $results = $this->hUtilisateurDao->findAll();

        // Enregistrement du tableau dans le fichier log
        error_log("UtilisateurService -> Utilisateurs : ".print_r($results, TRUE), 3, LOGFILE);

        // Retourne le tableau des utilisateurs
        return $results;
    }

    public function createUser($utilisateur)
    { 
        // Enregistrement du message dans le fichier log
        error_log("UtilisateurService -> createUser()".PHP_EOL, 3, LOGFILE);

        try {
            // Appel de la méthode create() de la classe UtilisateurDao
            // Retourne true si utilisateur créé SINON false
            $bRet = $this->hUtilisateurDao->create($utilisateur);
        }
        // Propagation de l'exception : utilisateur existe déjà
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        // Retourne true si utilisateur créé SINON false 
        return $bRet;
    }

    public function deleteUser($id)
    { 
        // Enregistrement du message dans le fichier log
        error_log("UtilisateurService -> deleteUser()".PHP_EOL, 3, LOGFILE);

        try {
            // Appel de la méthode deleteUser() de la classe UtilisateurDao
            // Retourne true si utilisateur créé SINON false
            $bRet = $this->hUtilisateurDao->deleteUser($id);
        }
        // Propagation de l'exception : suppression impossible
        catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        // Retourne true si utilisateur a été supprimé 
        return $bRet;
    }
}
?>