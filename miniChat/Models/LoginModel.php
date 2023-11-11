<?php
class LoginModel{
    private $db;
    private $host = 'mysql.info.unicaen.fr';
    private $dbname = '21809935_1';
    private $username = '21809935';
    private $password = 'euf3roh4ieteel0O';

    public function __construct(){
    }

    public function connect(){
        try{
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 1;
        } catch(PDOException $e){
            return 0;
        }
        
    }
    public function userRequest($user, $pass){
        $sql = "SELECT * FROM Utilisateur WHERE NomUtilisateur = :nom_utilisateur AND MotDePasse = :mdp";
        //echo("$this->db , $sql");
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nom_utilisateur', $user, PDO::PARAM_STR);
        $stmt->bindParam(':mdp', $pass, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return $stmt;
        }else{
            return 0;
        }
    }
    public function conversationRequest(){
        $id = $_COOKIE["userid"];
        $sql = "SELECT * FROM Conversation where CreateurID = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        if($stmt->rowCount() == 1){
            return $stmt;
        }
        return 0;
    }
    public function chatRequest(){
        
    }
}
?>