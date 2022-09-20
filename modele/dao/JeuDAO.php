<?php 
namespace modele\dao;

class JeuDAO { 

    private const TABLE = "T_JEU";

    // Connexion à la base de données
    private $Connection;

    /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet UtilisateurDAO
    */ 
    public function __construct() 
    { 
        // Enregistrement du message dans le fichier log
        error_log("JEUDAO -> __construct()".PHP_EOL, 3, LOGFILE);

        try {
            // Obtenir une connexion à la base
            // Mémorisation de la connexion dans l'attribut d'instance ($Connection) de la classe
            // Cette connexion est utilisée par les autres méthodes pour envoyer des requêtes
            $hconnection = new Connexion();
            $this->Connection = $hconnection->getConnection();
        }
        // Exception est levée si connexion à la BD impossible
        catch (\Exception $e) {
            // Créer une exception qui sera reçue par la méthode qui a effectué un new de cette classe
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    } 

    // Fonction qui retourne sous forme d'un tableau tous les enregistrements de la table T_UTILISATEUR
    public function findAll() : array{

        // Enregistrement du message dans le fichier log
        error_log("JEUDAO -> findAll()".PHP_EOL, 3, LOGFILE);
        
        // Création d'une requête préparée
        $requete = $this->Connection->prepare("SELECT * FROM ".self::TABLE);

        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetchAll();

        // Tableau des utilisateurs
        $tab_utilisateurs = array();

        foreach ($result as $valeur) {
            // Création d'un objet Utilisateur
            $utilisateur = new \modele\metier\Jeu();

            // Positionner les attributs en utilisant les fonctions setter
            $utilisateur->setId($valeur["id"]);
            $utilisateur->setNom($valeur["nom"]);
            $utilisateur->setMinimum($valeur["minimum"]);
            $utilisateur->setMaximum($valeur["maximum"]);

            // Ajouter l'objet Utilisateur dans le tableau
            $tab_utilisateurs[] = $utilisateur;

            // Enregistrement du message dans le fichier log
            error_log("JEUDAO -> Utilisateur : ".$utilisateur, 3, LOGFILE);
        }

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourner le tableau des utilisateurs
        return $tab_utilisateurs;
    }
    
    /**  
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
        // Enregistrement du message dans le fichier log
        error_log("JEUDAO -> __destruct()".PHP_EOL, 3, LOGFILE);
    }
}

?>