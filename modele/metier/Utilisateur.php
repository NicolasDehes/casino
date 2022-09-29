<?php 
namespace modele\metier;

/* Visibilité des propriétés et méthodes
    public : 		n'importe qui a accès à la méthode ou à l'attribut demandé.
	protected : 	seule la classe ainsi que ses sous classes éventuelles 
                    (classes héritées).
	private : 		seule la classe ayant défini l'élément peut y accéder.
*/
class Utilisateur { 
	
    // Constantes de la classe Utilisateur
    private const CR = "\n";

    // Attributs d'instance de la classe Utilisateur
    // private : pas d'accès à ces attributs en dehors de la classe
    private $id;
    private $nom; 
    private $prenom; 
    private $email; 
    private $motdepasse;
    private $solde;

    /** 
    * Cette méthode un peu spéciale est le constructeur
    * Elle est exécutée lorsque vous créez un objet Utilisateur. 
    */ 
    public function __construct() 
    { 
    } 

    // Méthode setter de l'attribut $id
    public function setId($id) : void {
        $this->id = $id;
    }

    // Méthode getter de l'attribut $id
    public function getId() {
        return $this->id;
    }

    // Méthode setter de l'attribut $nom
    public function setNom($nom) : void {
        $this->nom = $nom;
    }

    // Méthode getter de l'attribut $nom
    public function getNom() {
        return $this->nom;
    }

    // Méthode setter de l'attribut $prenom
    public function setPrenom($prenom) : void {
        $this->prenom = $prenom;
    }

    // Méthode getter de l'attribut $prenom
    public function getPrenom() {
        return $this->prenom;
    }

    public function setEmail($email) : void {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setMotdepasse($motdepasse) : void {
        $this->motdepasse = $motdepasse;
    }

    public function getMotdepasse() {
        return $this->motdepasse;
    }
	
    public function setSolde($solde) : void {
        $this->solde = $solde;
    }

    public function getSolde() {
        return $this->solde;
    }

    public function toArray() : array{ 
        return array(
            'id' => $this->id,
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'motdepasse' => $this->motdepasse,
            'solde' => $this->solde
        );
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
       	// unset($this->email);   	
    }
    
	public function __toString() 
	{    
	    return "id : $this->id nom : $this->nom  
        prenom : $this->prenom   
        email : $this->email".self::CR;   
	}

    public function toJson(){
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            "prenom" => $this->prenom, 
            "email" => $this->email,
            "motdepasse" => $this->motdepasse,
            "solde" => $this->solde
        ];
    }
}
?>