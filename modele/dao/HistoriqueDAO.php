<?php 
namespace modele\dao;

class HistoriqueDAO { 

    private const TABLE = "T_HISTORIQUE";

    // Connexion à la base de données
    private $Connection;

    /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet UtilisateurDAO
    */ 
    public function __construct() 
    { 
        // Enregistrement du message dans le fichier log
        error_log("HistoriqueDAO -> __construct()".PHP_EOL, 3, LOGFILE);

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
    public function findByUserAndGame($jeu, $idUser) : array{

        // Enregistrement du message dans le fichier log
        error_log("HistoriqueDAO -> findAll()".PHP_EOL, 3, LOGFILE);
        
        // Création d'une requête préparée
        $requete = $this->Connection->prepare("
            SELECT h.idUtilisateur, h.idJeu, h.dateJeu, h.mise, h.gain
            FROM ".self::TABLE." h 
            JOIN T_UTILISATEUR u ON h.idUtilisateur = u.id
            JOIN T_JEU j ON h.idJeu = j.id
            WHERE j.nom = :nomJeu 
            AND u.id = :idUtilisateur
        ");
        $requete->bindParam("nomJeu",$jeu);
        $requete->bindParam("idUtilisateur", $idUser);
        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetchAll();

        // Tableau des historique
        $tab_historique = array();

        foreach ($result as $valeur) {
            // Création d'un objet historique
            $historique = new \modele\metier\Historique();

            // Positionner les attributs en utilisant les fonctions setter
            $historique->setIdJeu($valeur["idJeu"]);
            $historique->setIdUtilisateur($valeur["idUtilisateur"]);
            $historique->setDateJeu($valeur['dateJeu']);
            $historique->setMise($valeur["mise"]);
            $historique->setGain($valeur["gain"]);
            // Ajouter l'objet historique dans le tableau
            $tab_historique[] = $historique;

            // Enregistrement du message dans le fichier log
            error_log("HistoriqueDAO -> Utilisateur : ".$historique, 3, LOGFILE);
        }

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourner le tableau des utilisateurs
        return $tab_historique;
    }
    
    /**  
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
        // Enregistrement du message dans le fichier log
        error_log("HistoriqueDAO -> __destruct()".PHP_EOL, 3, LOGFILE);
    }
}

?>