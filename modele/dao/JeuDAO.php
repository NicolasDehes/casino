<?php 
namespace modele\dao;

use \modele\metier\Jeu;

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
        
        // Création d'une requête préparée
        $requete = $this->Connection->prepare("SELECT * FROM ".self::TABLE);

        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $results = $requete->fetchAll();

        // Tableau des jeus
        $tab_jeux = array();

        foreach ($results as $valeur) {
            // Création d'un objet jeu
            $jeu = new Jeu();

            // Positionner les attributs en utilisant les fonctions setter
            $jeu->setId($valeur["id"]);
            $jeu->setNom($valeur["nom"]);
            $jeu->setMinimum($valeur["minimum"]);
            $jeu->setMaximum($valeur["maximum"]);

            // Ajouter l'objet jeu dans le tableau
            $tab_jeux[] = $jeu->toArray();

            // Enregistrement du message dans le fichier log
        }

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourner le tableau des jeux
        return $tab_jeux;
    }

    public function findByName($name){
        $requete = $this->Connection->prepare("
            SELECT * 
            FROM ".self::TABLE."
            WHERE name = :name
        ");
        $requete->bindValue("name",$name);
        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetch();
        return $result;
    }

    public function findById($id){
        $requete = $this->Connection->prepare("
            SELECT * 
            FROM ".self::TABLE."
            WHERE id = :id
        ");
        $requete->bindValue('id',$id);
        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetch();
        return $result;
    }

    public function editMise($id,$min,$max){
        try{
            $requete = $this->Connection->prepare("
                UPDATE ".self::TABLE." 
                SET minimum = :min, maximum = :max
                WHERE id = :id"
            );
            $requete->bindValue('min',$min);
            $requete->bindValue('max',$max);
            $requete->bindValue('id',$id);
            $succes = $requete->execute();
            return $succes;
        } catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }
    
    /**  
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
        // Enregistrement du message dans le fichier log
    }
}

?>