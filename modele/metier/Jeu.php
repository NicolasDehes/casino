<?php 

namespace modele\metier;

/* Visibilité des propriétés et méthodes
    public : 		n'importe qui a accès à la méthode ou à l'attribut demandé.
	protected : 	seule la classe ainsi que ses sous classes éventuelles 
                    (classes héritées).
	private : 		seule la classe ayant défini l'élément peut y accéder.
*/
class Jeu { 
	
    // Constantes de la classe Utilisateur
    private const CR = "\n";

    // Attributs d'instance de la classe Utilisateur
    // private : pas d'accès à ces attributs en dehors de la classe
    private $id;
    private $nom; 
    private $minimum;
    private $maximum;

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

    // Méthode setter de l'attribut $minimum
    public function setMinimum($minimum) : void {
        $this->minimum = $minimum;
    }

    // Méthode getter de l'attribut $minimum
    public function getMinimum() {
        return $this->minimum;
    }

    public function setMaximum($maximum) : void {
        $this->maximum = $maximum;
    }

    public function getMaximum() {
        return $this->maximum;
    }
	
    /**  
    * Destructeur, appelé quand l'objet est détruit
    */  
    public function __destruct()  
    {  
    	// Libérer les ressources
        // unset() détruit la ou les variables dont le nom a été passé en argument
    	// unset($this->nom);
       	// unset($this->minimum);
       	// unset($this->mail);   	
    }
    
	public function __toString() 
	{    
	    return "id : $this->id 
        nom : $this->nom  
        minimum : $this->minimum   
        maximum : $this->maximum".self::CR;   
	}

    public function toJson(){
        return [
            "id" => $this->id,
            "nom" => $this->nom, 
            "minimum" => $this->minimum,
            "maximum" => $this->maximum
        ];
    }
}
?>