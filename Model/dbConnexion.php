<?php
class LoginModel
{
    private $db;
    private $host = 'mysql.info.unicaen.fr';
    private $dbname = '21809935_2';
    private $username = '21809935';
    private $password = 'euf3roh4ieteel0O';

    public function __construct()
    {
    }

    public function connect()
    {
        try {
            $this->db = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 1;
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            return 0;
        }
    }

    public function recetteRequest($id)
    {
        $sql = "SELECT * from Recette where REC_ID = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function allRecetteRequest($Lignedeb, $Lignefin)
    {
        $sql = "select * from RECETTE order by REC_DATE_CREATION limit :nbfin offset :nbdeb ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nbfin', $Lignefin, PDO::PARAM_INT);
        $stmt->bindParam(':nbdeb', $Lignedeb, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function getLastReccettes()
    {
        $sql = "Select * from Recette order by REC_DATE_CREATION";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function getCat($id)
    {
        $sql = "select * from CATÉGORIE where CAT_ID = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
    }
    public function closeConnection()
    {
        $this->db = null;
    }
}
?>