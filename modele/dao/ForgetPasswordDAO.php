<?php 

namespace modele\dao;

class ForgetPasswordDAO { 

    private const TABLE = "T_FORGETPASSWORD";

    private $Connection;

    public function __construct() 
    { 
        try {
            $hconnection = new Connexion();
            $this->Connection = $hconnection->getConnection();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function create($mail){
        $newHash = uniqid();
        $request = $this->Connection->prepare("
            INSERT INTO ".self::TABLE."(hash, mail)
            VALUES (:hash,:mail)
        ");
        $request->bindValue("hash", $newHash);
        $request->bindValue("mail", $mail);
        $success= $request->execute();
        if($success){
            return $newHash;
        } else {
            return false;
        }
    }

    public function check($hash, $mail) {
        $request = $this->Connection->prepare("
            SELECT *
            FROM ".self::TABLE."
            WHERE hash = :hash
            AND mail = :mail
        ");
        $request->bindValue("hash", $hash);
        $request->bindValue("mail", $mail);
        $success= $request->execute();
        if($request->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function delete($hash){
        $request = $this->Connection->prepare("
            DELETE 
            FROM ".self::TABLE."
            WHERE hash = :hash
        ");
        $request->bindValue("hash",$hash);
        $success = $request->execute();
        return $success;
    }

    public function __destruct()  
    {  
    }
}

?>