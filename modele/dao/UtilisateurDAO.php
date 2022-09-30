<?php 

namespace modele\dao;

use \modele\metier\Utilisateur;
// Inclure le fichier des constantes : il contient notamment la constante LOGFILE
//include(__DIR__.'/../../Constantes.php');

// Classe de gestion des accès à la base de données pour la table T_UTILISATEUR
class UtilisateurDAO { 

    // Table des utilisateurs
    private const TABLE = "T_UTILISATEUR";

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

    // Vérifier si l'authentification est ok à partir du login et mot de passe passés en paramètre
    // Retourne true si authentification ok SINON false
    public function check_login($login, $password) : bool
    { 
        // Enregistrement du message dans le fichier log

        // Par défaut, le retour de la fonction est positionné à false
        $bRet = false;
        
       // Création d'une requête préparée (prepared statement)
    	$requete = $this->Connection->prepare("SELECT * FROM ".self::TABLE." 
        where email=? and motdepasse=? limit 1");
        
        // Encrypter le mot de passe avec md5
        $password = md5($password);
        //$password = hash('sha256', $password);

        // Enregistrement du message dans le fichier log
        
        // Exécuter la requête préparée en lui passant une tableau avec le login et le 
        // mot de passe : 1er ? est remplacé par le login, le second ? par le password
        $bret = $requete->execute(array($login, $password));

        // Récupérer le résultat de la requête sour forme d'un tableau
        $user = $requete->fetchAll();

        // SI un utilisateur existe avec ce login et mot de passe
        if (count($user) > 0) {
            
            // Modification du nom de l'ID de session (par sécurité)
            // Par défaut le nom est PHPSESSID
            //session_name('myid');
            // Démarrer une session
            //session_start();

            $_SESSION["id_user"] = $user[0]["id"]; 

            // Positionner à true le booléen retourné par la fonction
            $bRet = true;
        } 

        // Fermer la connexion
        $this->Connection = null;

        // Retourner le booléen : false ou true
        return $bRet;
    }

    // Fonction de création d'un utilisateur
    public function create($user) : int
    { 
        // Enregistrement du message dans le fichier log

        //
        // Vérifier si le compte existe déjà
        //

        // Création d'une requête préparée
        $requete = $this->Connection->prepare("SELECT * FROM ".self::TABLE." where email=? limit 1");
        
        // Exécution de la requête
        $requete->execute(array($user->getEmail()));

        // Récupérer le résultat de la requête sous forme d'un tableau 
        $result = $requete->fetchAll();

        // Si le compte existe déjà
        if (count($result) > 0)
            // Lever une exception : fin de la méthode
            throw new \Exception('Compte existe.');

        //
        // Création du nouveau compte dans la base de données
        //

        // nom, prenom , email, motdepasse
        // Création d'une requête préparée
        $requete = $this->Connection->prepare("INSERT INTO ".self::TABLE." (nom,prenom,email,motdepasse)
        VALUES (:nom,:prenom,:email,:motdepasse)");

        // Encrypter le mot de passe avec l'algorithme md5
        $password = md5($user->getMotdepasse());
        // sha256 => 64 bits sha384 => 96 bits sha512 => 128 bits
        //$password = hash('sha256', $user->getMotdepasse());

        // Exécution de la requête : execute() retourne si exécution requête ok sinon false
        $result = $requete->execute(array(
                "nom" => $user->getNom(),
                "prenom" => $user->getPrenom(),
                "email" => $user->getEmail(),
                "motdepasse" => $password));

        $id = $this->Connection->lastInsertId();
        
        // Fermer la connexion à la BDD
        $this->Connection = null;


        // Retourner le résultat
        return $id;
    }

     // Fonction de suppression d'un utilisateur à partir de son id
     public function deleteUser($id)
     {
        // Enregistrement du message dans le fichier log

        $bRet = true;
        try {
            // Création d'une requête préparée
            $requete = $this->Connection->prepare("DELETE FROM ".self::TABLE." WHERE id = ?");

            // Exécuter la requête
            $bRet = $requete->execute(array($id));
        }
        catch (\Exception $e) {
            $bRet = false;
            // Lever une exception : fin de la méthode
             throw new \Exception('Suppression compte impossible.');
        }

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourne true si suppression ok sinon false
        return $bRet;
     }

    // Fonction qui retourne sous forme d'un tableau tous les enregistrements de la table T_UTILISATEUR
    public function findAll() : array{

        // Enregistrement du message dans le fichier log
        
        // Création d'une requête préparée
        $requete = $this->Connection->prepare("SELECT id,nom,prenom,email,motdepasse FROM ".self::TABLE);

        // Exécution de la requête
        $requete->execute();
        
        // Retourne le résultat de la requête sous forme d'un tableau
        $result = $requete->fetchAll();

        // Tableau des utilisateurs
        $tab_utilisateurs = array();

        foreach ($result as $valeur) {
            // Création d'un objet Utilisateur
            $utilisateur = new Utilisateur();

            // Positionner les attributs en utilisant les fonctions setter
            $utilisateur->setId($valeur["id"]);
            $utilisateur->setNom($valeur["nom"]);
            $utilisateur->setPrenom($valeur["prenom"]);
            $utilisateur->setEmail($valeur["email"]);
            $utilisateur->setMotdepasse($valeur["motdepasse"]);

            // Ajouter l'objet Utilisateur dans le tableau
            $tab_utilisateurs[] = $utilisateur;

            // Enregistrement du message dans le fichier log
        }

        // Fermer la connexion à la BDD
        $this->Connection = null; 

        // Retourner le tableau des utilisateurs
        return $tab_utilisateurs;
    }

    public function getUserById($id){
        $requete = $this->Connection->prepare("
            SELECT id,nom,prenom,email,motdepasse,solde
            FROM ".self::TABLE."
            WHERE id = :id"
        );
        $requete->bindValue("id",$id);
        $requete->execute();
        $result = $requete->fetch();
        $user = new Utilisateur();
        $user->setId($result['id']);
        $user->setEmail($result['email']);
        $user->setNom($result['nom']);
        $user->setPrenom($result['prenom']);
        $user->setSolde($result['solde']);
        return $user;
    }

    // Change le solde de l'utilisateur et retourne son nouveau solde
    public function changeSolde($id, $gain){
        $user = $this->getUserById($id);
        $newSolde = $user->getSolde() + $gain;
        $requete = $this->Connection->prepare("
            UPDATE ".self::TABLE." 
            SET solde = :newSolde
            WHERE id = :id"
        );
        $requete->bindValue('newSolde',$newSolde);
        $requete->bindValue('id',$id);
        $succes = $requete->execute();
        return $newSolde;
    }

    // Défini si l'utilisateur à les fonds necéssaire pour jouer
    public function isSoldeOk($id, $mise){
        $requete = $this->Connection->prepare("
            SELECT *
            FROM ".self::TABLE." 
            WHERE id = :id"
        );
        $requete->bindValue('id',$id);
        $succes = $requete->execute();
        $user = $requete->fetch();
        $isSoldeOk = $user['solde'] >= $mise;
        return $isSoldeOk;
    }

    // Défini si l'utilisateur à les fonds necéssaire pour jouer
    public function updateMDPUser($email, $mdp){
        $requete = $this->Connection->prepare("
            UPDATE ".self::TABLE." 
            SET motdepasse = :motdepasse
            WHERE email = :email"
        );
        $requete->bindValue('email',$email);
        $requete->bindValue('motdepasse', md5($mdp));
        $succes = $requete->execute();
        $user = $requete->fetch();
        $this->Connection = null;
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