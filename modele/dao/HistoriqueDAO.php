<?php 

namespace modele\dao;

use \modele\metier\Historique;

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

        // Création d'une requête préparée
        $requete = $this->Connection->prepare("
            SELECT h.idUtilisateur, h.idJeu, h.dateJeu, h.mise, h.gain
            FROM ".self::TABLE." h 
            JOIN T_UTILISATEUR u ON h.idUtilisateur = u.id
            JOIN T_JEU j ON h.idJeu = j.id
            WHERE j.id = :idjeu 
            AND h.idUtilisateur = :idUtilisateur
            ORDER BY h.dateJeu
            LIMIT 50;
        ");
        $requete->bindParam("idjeu",$jeu);
        $requete->bindParam("idUtilisateur", $idUser);
        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetchAll();

        // Tableau des historique
        $tab_historique = array();
        if(count($tab_historique)>0){
            foreach ($result as $valeur) {
                // Création d'un objet historique
                $historique = new Historique();
                // Positionner les attributs en utilisant les fonctions setter
                $historique->setIdUtilisateur($valeur["idUtilisateur"]);
                $historique->setIdJeu($valeur["idJeu"]);
                $historique->setDateJeu($valeur["dateJeu"]);
                $historique->setMise($valeur["mise"]);
                $historique->setGain($valeur["gain"]);
                // Ajouter l'objet historique dans le tableau
                array_push($tab_historique, $historique->toJson());
            }
        }
        

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourner le tableau des utilisateurs
        return $tab_historique;
    }

    // Fonction qui retourne sous forme d'un tableau tous les enregistrements de la table T_UTILISATEUR
    public function findByUser($jeu) : array{

        // Création d'une requête préparée
        $requete = $this->Connection->prepare("
            SELECT h.idUtilisateur, h.idJeu, h.dateJeu, h.mise, h.gain
            FROM ".self::TABLE." h 
            JOIN T_UTILISATEUR u ON h.idUtilisateur = u.id
            JOIN T_JEU j ON h.idJeu = j.id
            WHERE h.idUtilisateur = :idUtilisateur
            ORDER BY h.dateJeu
            LIMIT 50;
        ");
        $requete->bindParam("idUtilisateur", $idUser);
        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetchAll();

        // Tableau des historique
        $tab_historique = array();
        if(count($tab_historique)>0){
            foreach ($result as $valeur) {
                // Création d'un objet historique
                $historique = new Historique();
                // Positionner les attributs en utilisant les fonctions setter
                $historique->setIdUtilisateur($valeur["idUtilisateur"]);
                $historique->setIdJeu($valeur["idJeu"]);
                $historique->setDateJeu($valeur["dateJeu"]);
                $historique->setMise($valeur["mise"]);
                $historique->setGain($valeur["gain"]);
                // Ajouter l'objet historique dans le tableau
                array_push($tab_historique, $historique->toJson());
            }
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
    }
}

?>