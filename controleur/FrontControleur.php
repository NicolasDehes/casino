<?php
// Auto chargement des classes utilisées
require_once("../Autoloader.php");
require_once(__DIR__.'/../Constantes.php');

// LES SESSIONS
// Une session en PHP correspond à une façon de stocker des données différentes pour chaque 
// utilisateur en utilisant un identifiant de session unique.
// PHP vous donne accès à la variable superglobale $_SESSION pour manipuler les sessions. 
// Il s’agit d’un tableau associatif accessible au script courant.
// Un des grands intérêts des sessions est que vous allez pouvoir conserver des informations pour un utilisateur 
// lorsqu’il navigue d’une page à une autre. 
// Les données d’une session sont sauvegardés jusqu’à la fermeture du navigateur de l’utilisateur. 
// Il faut savoir que les informations de sessions sont enregistrés côté serveur et non sur l’ordinateur 
// de l’utilisateur ce qui est beaucoup plus sûres que les cookies.
// En PHP une session démarre dés que la fonction session_start() est appelée et se termine en général 
// dès que la fenêtre courante du navigateur est fermée.

// Modification du nom de l'ID de session (par sécurité)
// Par défaut le nom est PHPSESSID 
session_name('myid');
// Démarrage d'une session. 
// Si la session existe session_start() récupère la session courante SINON il crée une nouvelle session
session_start();

// Valeurs du paramètre action : 
//  authentifier                -> clique sur le bouton valider de la page login.php
//  creer_inscription           -> affichage de la page inscription.php
//  demander_inscription        -> clique sur le bouton valider de la page inscription.php
//  demander_motdepasse         -> affichage de la page de motdepasse.php
//  valider_demander_motdepasse -> clique sur le bouton valider de la page motdepasse.php
//  supprimer_utilisateur       -> clique sur un lien supprimer de la page list_utilisateurs.php
//  list_utilisateurs           -> affichage de la page list_utilisateurs.php
//  login                       -> affichage de la page login.php
//  accueil                     -> affichage de la page accueil.php
//  deconnexion                 -> clique sur un lien déconnexion : suppprimer session et affichage de la page login.php

// Exemple d'enchainement des appels : authentification
//  -> Clique sur le bouton Valider de la page login.php
//      <form class="form-inlin mt-4" method="POST" action="../controleur/FrontControleur.php?action=authentifier"
//  -> FrontControleur recoit une action avec la valeur authentifier : $_GET['action'] = "authentifier"
//  -> FrontControleur mémorise la valeur dans la variable $requested_page
//  -> FrontControleur exécute le code en fonction de l'action.
//      switch ($requested_page) {
//          case 'authentifier': 
//              Code
//          break;

//  Code :
//  -> Instanciation de la classe UtilisateurService 
//      -> Appel du constructeur (__construct()) de la classe UtilisateurService
//          -> Instanciation de la classe UtilisateurDao
//          -> Appel du constructeur (__construct()) de la classe UtilisateurDao
//               -> Instanciation de la classe Connexion
//                  -> Appel du constructeur (__construct()) de la classe Connexion
//               -> Mémorisation de la connexion dans une variable d'instance de la classe  UtilisateurDao
//      -> Appel de la méthode check_login() de la classe UtilisateurService 
//           -> Appel de la méthode check_login() de la classe UtilisateurDao
//              --> check_login() de la classe UtilisateurDao envoie une requête SELECT pour véfiier si le login et mot de passe existent
//              <-- check_login() de la classe UtilisateurDao retourne true si authentification ok sinon elle retourne false
//      <-- check_login() de la classe UtilisateurService retourne true si authentification ok sinon elle retourne false
//  FrontControleur : Si retour = true FrontControleur retourne la page accueil.php sinon elle retourne la page login.php

// SI paramètre action existe 
if (isset($_GET['action']))
    // htmlspecialchars() s'assure que tous les caractères spéciaux HTML 
    // sont proprement encodés afin d'éviter des injections de balises HTML 
    // et de Javascript dans vos pages
    // Récupérer la valeur du paramètre action
    $requested_page = htmlspecialchars($_GET['action']);
// SINON paramètre action absent
else 
    // Retourner la page d'authentification
    $requested_page = 'login';

// En fonction de la demande de l'utilisateur, effectuer le traitement
switch ($requested_page) {

    // Demande d'authentification
    case 'authentifier':  

        // Enregistrement du message dans le fichier log
        error_log("FrontControleur -> Demande de login".PHP_EOL, 3, LOGFILE);

        // SI formulaire soumis = attribut name du bouton submit
        if(isset($_POST['envoi'])) { 

            // Il est possible de valider le format des données d’une variable en utilisant 
            // la méthode filter_var() et un filtre correspondant au type de données attendu.
            // SI format du mail non valide
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // Positionner un message en variable de session
                $_SESSION['message'] = "Adresse mail incorrecte."; 
                // Retourner la page login.php
                header("Location: ../vue/login.php");
                // Fin du script
                die();
            }

            // Vérifier si les paramètres obligatoires ont été saisis
            // SI un des champs n'a pas été saisi
            if (!checkPOSTParameters(['email', 'password'])) {
                $_SESSION['message'] = "Champ obligatoire non renseigné.";
                // Retourner la page login.php
                header("Location: ../vue/login.php");
                // Fin du script
                die();
            }

            try {
                // Création de l'objet UtilisateurService : appel du constructeur de la classe
                // Si problème retourne une exception
                $hUtilisateurService = new \modele\service\UtilisateurService();
            }
            // Impossible de se connecter à la BD
            catch (\Exception $e) {
                // Positionner un message en variable de session
                $_SESSION['message'] = "Authentification impossible."; 
                // Retourner la page login.php
                header('Location: ../vue/login.php');
                // Fin du script
                die();
            }

            // Appel de la méthode check_login() de la classe UtilisateurService
            // Retourne true si authentification ok SINON false
            $bRet = $hUtilisateurService->check_login(htmlspecialchars($_POST['email']),
            htmlspecialchars($_POST['password']));

            // SI authentification incorrecte
            if (!$bRet) {
                // Positionner un message en variable de session
                $_SESSION['message'] = "Authentification incorrecte."; 
                // Retourner la page login.php
                header('Location: ../vue/login.php');
            }
            // SINON authentification correcte
            else
                // Retourner la page accueil.php : page d'accueil de l'application
                header("Location: ../vue/accueil.php");
        
            // Suppression de l'objet
            $hUtilisateurService = null;
        }
    break;

    // Afficher la page d'accueil
    case 'accueil':
            // Retourner la page accueil.php : page d'accueil de l'application
        header("Location: ../vue/accueil.php");
    break;

    // Afficher la page de saisie d'un compte
    case 'demander_inscription':
        // Suppression de la variable de session nommée message
        unset ($_SESSION['message']);

        // Retourner la page inscription.php 
        header('Location: ../vue/inscription.php');
    break;

    // Afficher la page mot de passe oublié
    case 'demander_motdepasse':
        // Suppression de la variable de session nommée message
        unset ($_SESSION['message']);

        // Retourner la page motdepasse.php 
        header('Location: ../vue/motdepasse.php');
    break;

    // Clique sur le bouton valider de la page motdepasse.php
    case 'valider_demander_motdepasse':
        header('Location: ../vue/motdepasse.php');
    break;

    // Demande de création d'un compte
    case 'creer_inscription':
        // Enregistrement du message dans le fichier log
        error_log("FrontControleur -> Creer_inscription".PHP_EOL, 3, LOGFILE);

        // Vérifier si les paramètres obligatoires ont été saisis
        if (!checkPOSTParameters(['email','nom','prenom','password','password_conf'])) {
            $_SESSION['message'] = "Champ obligatoire non renseigné.";
            header("Location: ../vue/inscription.php");
            // Fin du script
            die();
        }

        // Il est possible de valider le format des données d’une variable en utilisant 
        // la méthode filter_var() et un filtre correspondant au type de données attendu.
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // Positionner un message en variable de session
                $_SESSION['message'] = "Adresse mail incorrecte."; 
                // Retourner la page login.php
                header("Location: ../vue/inscription.php");
                // Fin du script
                die();
        }

        // Récupérer le 1er mot de passe saisi
        $mdp1=$_POST['password'];
        // Récupérer le 2ème mot de passe saisi
        $mdp2=$_POST['password_conf'];

        // Vérifier si les 2 mots de passe sont identiques
        if ($mdp1 == $mdp2) {
            // Création d'un objet Utilisateur : appel du constructeur de la classe
            $utilisateur = new \modele\metier\Utilisateur();

            // Positionner les attributs de l'objet en utilisant les fonctions setter
            $utilisateur->setPrenom(htmlspecialchars($_POST['prenom']));
            $utilisateur->setNom(htmlspecialchars($_POST['nom']));
            $utilisateur->setMail(htmlspecialchars($_POST['email']));
            $utilisateur->setMotdepasse(htmlspecialchars($_POST['password']));

            try {
                // Création de l'objet UtilisateurService : appel du constructeur de la classe UtilisateurService
                // Si problème retourne une exception
                $hUtilisateurService = new \modele\service\UtilisateurService();
            }
            // Problème : exemple -> Impossible de se connecter à la BD
            catch (\Exception $e) {
                // Positionner un message en variable de session : message utilisé par login.php
                $_SESSION['message'] = "Création du compte impossible."; 
                // Retourner la page inscription.php
                header('Location: ../vue/inscription.php');
                // Fin du script
                die();
            }

            try 
            {
                // Appel de la méthode createUser() de la classe UtilisateurService
                // La fonction prend en paramètre un objet de type Utilisateur
                // La fonction lève une exception si impossible de créer l'utilisateur
                $bRet = $hUtilisateurService->createUser($utilisateur);
                // Positionner un message en variable de session : message utilisé par inscription.php  
                $_SESSION['message'] = "Compte créé."; 
            }
            // Exception levée si impossible de créer le compte utilisateur
            catch (\Exception $e) {  
                // Positionner un message en variable de session : message utilisé par inscription.php   
                $_SESSION['message'] = $e->getMessage(); 
            } 
            // Retourner la page inscription.php
            header('Location: ../vue/inscription.php');
        }
        // SINON les 2 mots de passe sont différents
        else {
            // Positionner un message en variable de session 
            $_SESSION['message'] = "Mots de passe différents !!"; 
            // Retourner la page d'inscription        
            header("Location: ../vue/inscription.php");
        }
    break;

    // clique sur un lien supprimer de la page list_utilisateurs.php
    case 'supprimer_utilisateur':
        try {
            // Création de l'objet UtilisateurService : appel du constructeur de la classe
            // Si problème retourne une exception
            $hUtilisateurService = new \modele\service\UtilisateurService();
        }
        // Problème : exemple -> Impossible de se connecter à la BD
        catch (\Exception $e) {
            // Positionner un message en variable de session : message utilisé par login.php
            $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/login.php');
            // Fin du script
            die();
        }

        try {
            // Appel de la méthode createUser() de la classe UtilisateurService
            // La fonction prend en paramètre un objet de type Utilisateur
            // La fonction lève une exception si impossible de créer l'utilisateur
            $bRet = $hUtilisateurService->deleteUser($_GET['id']);
        }
        // Exception levée si impossible de créer le compte utilisateur
        catch (\Exception $e) {  
            // Positionner un message en variable de session : message utilisé par login.php
             $_SESSION['message'] = "Problème technique."; 
            // Retourner la page login.php
            header('Location: ../vue/login.php');
            // Fin du script
            die();
        }

        // Afficher la page liste_utilisateurs
        afficherUtilisateurs();
    break;

    // Afficher la liste des utilisateurs
    case 'list_utilisateurs':
        // Enregistrement du message dans le fichier log
        error_log("FrontControleur -> Liste des utilisateurs".PHP_EOL, 3, LOGFILE);

        // Afficher la page liste_utilisateurs
        afficherUtilisateurs();
    break;

    // Déconnexion
    case 'deconnexion':
        // logout.php supprime la session et redirige vers la page de login
        header('Location: ../vue/logout.php');
    break;

    // Afficher la page d'authentification
    case 'login':
        // Suppression de la variable de session nommée message
        unset ($_SESSION['message']);

        // header("X-Content-Type-Options", "nosniff");
        // Retourner la page login
        header('Location: ../vue/login.php');
    break;

    // Cas où l'action ne correspond à aucune action répertoriée
    default:
        // Déconnexion de l'utilisateur et retourner la page login
        // logout.php supprime la session et redirige vers la page de login
        header('Location: ../vue/logout.php');
    break;
}

/**
 * Controle si les paramètres obligatoires existent.
 * Si un des paramètres n'existe pas alors la page indiquée en paramètre est retournée
 * Normalement tous les entrées obligatoires ont été saisies (attribut required sur la balise input)
 * @param $parameters : liste des paramètres à controler.
 * @return $bRet : true si tous les paramètres renseignés SINON false
 */
function checkPOSTParameters($parameters) {
    $bRet = true; 
    foreach ($parameters as $parameter) {
        if (empty($_POST[$parameter])) {
            $bRet = false;
            break;
        }
    }
    return $bRet;
}

function afficherUtilisateurs() {
    try {
        // Création de l'objet UtilisateurService : appel du constructeur de la classe
        // Si problème retourne une exception
        $hUtilisateurService = new \modele\service\UtilisateurService();
    }
    // Problème : exemple -> Impossible de se connecter à la BD
    catch (\Exception $e) {
        // Positionner un message en variable de session : message utilisé par login.php
        $_SESSION['message'] = "Problème technique."; 
        // Retourner la page login.php
        header('Location: ../vue/login.php');
    }

    // Appel de la méthode findAll() de la classe UtilisateurService
    // Retourne un tableau contenant les utilisateurs
    $tab_utilisateurs = $hUtilisateurService->findAll();

    //$json_str = json_encode($tab_utilisateurs);

    // Positionner le tableau en variable de session 
    $_SESSION['tableau']=$tab_utilisateurs;

    // Enregistrement du message dans le fichier log
    // error_log("FrontControleur -> list_utilisateurs".print_r($_SESSION['tableau'], TRUE).PHP_EOL, 3, LOGFILE);
    
    // Retourner la page liste_utilisateurs
    header('Location: ../vue/liste_utilisateurs.php');
}

?>