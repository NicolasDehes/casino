<?php 
namespace modele\metier;

/* Visibilité des propriétés et méthodes
    public : 		n'importe qui a accès à la méthode ou à l'attribut demandé.
	protected : 	seule la classe ainsi que ses sous classes éventuelles 
                    (classes héritées).
	private : 		seule la classe ayant défini l'élément peut y accéder.
*/
class Historique { 
	
    // Constantes de la classe Utilisateur
    private const CR = "\n";

    // Attributs d'instance de la classe Utilisateur
    // private : pas d'accès à ces attributs en dehors de la classe
    private $idJeu;
    private $idUtilisateur; 
    private $dateJeu; 
    private $mise; 
    private $gain;
    private $user;
    private $jeu;

    /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet Utilisateur. 
    */ 
    public function __construct() 
    { 
    } 

    // Méthode setter de l'attribut $id
    public function setIdJeu($id) : void {
        $this->idJeu = $id;
    }

    // Méthode getter de l'attribut $id
    public function getIdJeu() {
        return $this->idJeu;
    }
    // Méthode setter de l'attribut $id
    public function setIdUtilisateur($id) : void {
        $this->idUtilisateur = $id;
    }

    // Méthode getter de l'attribut $id
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    // Méthode setter de l'attribut $mise
    public function setMise($mise) : void {
        $this->mise = $mise;
    }

    // Méthode getter de l'attribut $mise
    public function getMise() {
        return $this->mise;
    }

    // Méthode setter de l'attribut $gain
    public function setGain($gain) : void {
        $this->gain = $gain;
    }

    // Méthode getter de l'attribut $gain
    public function getGain() {
        return $this->gain;
    }

    public function setDateJeu($dateJeu) : void {
        $this->dateJeu = $dateJeu;
    }

    public function getDateJeu() {
        return $this->dateJeu;
    }

    public function setUser($user) {
        $this->user = $user;
    }
	
    public function getUser() {
        return $this->user;
    }

    public function setJeu($jeu) {
        $this->jeu = $jeu;
    }
	
    public function getJeu() {
        return $this->jeu;
    }

    /**
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
    	// Libérer les ressources
        // unset() détruit la ou les variables dont le nom a été passé en argument
    	// unset($this->nom);
       	// unset($this->prenom);
       	// unset($this->mail);   	
    }
    
	public function __toString() 
	{    
	    return "id : $this->id nom : $this->nom  
        prenom : $this->prenom   
        mail : $this->mail".self::CR;   
	}

    public function toJson(){
        return [
            "idUtilisateur" => $this->idUtilisateur,
            "idJeu" => $this->idJeu,
            "dateJeu" => $this->dateJeu,
            "mise" => $this->mise,
            "gain" => $this->gain
        ];
    }
}
?>