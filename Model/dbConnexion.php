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
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 1;
        } catch (PDOException $e) {
            echo $e;
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
    public function allRecetteRequest($Lignedeb, $nombre)
    {
        $sql = "select * from RECETTE order by REC_DATE_CREATION limit :nombre offset :nbdeb ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nbdeb', $Lignedeb, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_INT);
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
    public function getNbRecettes()
    {
        $sql = "SELECT COUNT(*) AS total_recettes FROM RECETTE";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['total_recettes'];
        } else {
            return 0;
        }
    }
    public function getRecetteRecherche($text, $nb)
    {
        $sql = "SELECT * FROM RECETTE WHERE REC_TITRE LIKE :text ORDER BY REC_DATE_CREATION LIMIT 10 OFFSET :nb";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindValue(':text', '%' . $text . '%', PDO::PARAM_STR);
        $stmt->bindParam(':nb', $nb, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNbRecherche($text)
    {
        $sql = "SELECT COUNT(*) AS total_recettes FROM RECETTE WHERE REC_TITRE LIKE :text";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':text', $text, PDO::PARAM_STR);
        $stmt->bindValue(':text', '%' . $text . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['total_recettes'];
        } else {
            return 0;
        }
    }
    public function getRecetteCat($cat, $nb)
    {
        $sql = "SELECT * FROM RECETTE WHERE CAT_ID = :cat ORDER BY REC_DATE_CREATION LIMIT 10 OFFSET :nb";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cat', $cat, PDO::PARAM_INT);
        $stmt->bindParam(':nb', $nb, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNbCat($cat)
    {
        $sql = "SELECT COUNT(*) AS total_recettes FROM RECETTE WHERE CAT_ID = :cat";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':cat', $cat, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['total_recettes'];
        } else {
            return 0;
        }
    }
    public function getRecetteIngredient($ing, $nb)
    {
        $sql = "SELECT DISTINCT R.*
        FROM RECETTE R
        JOIN COMPOSER C ON R.REC_ID = C.REC_ID
        JOIN INGRÉDIENTS I ON C.ING_ID = I.ING_ID
        WHERE I.ING_NOM IN ( :ing )
        ORDER BY R.REC_DATE_CREATION
        LIMIT 10
        OFFSET :nb";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ing', $ing, PDO::PARAM_STR);
        $stmt->bindParam(':nb', $nb, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getNbRecetteIngredient($ing){
        $sql = "SELECT COUNT(DISTINCT R.REC_ID) as nombre_resultat
        FROM RECETTE R
        JOIN COMPOSER C ON R.REC_ID = C.REC_ID
        JOIN INGRÉDIENTS I ON C.ING_ID = I.ING_ID
        WHERE I.ING_NOM IN ( :ing )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':ing', $ing, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['nombre_resultat'];
        } else {
            return 0;
        }
    }
    public function getIngredientsByRecetteId($recetteId)
    {
        try {
            $sql = "SELECT i.ING_NOM
                    FROM INGRÉDIENTS i
                    JOIN COMPOSER c ON i.ING_ID = c.ING_ID
                    WHERE c.REC_ID = :recetteId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':recetteId', $recetteId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des ingrédients : " . $e->getMessage();
            return false;
        }
    }
    public function getRecetteById($recetteId)
    {
        try {
            $sql = "SELECT r.REC_ID, r.REC_TITRE, r.REC_RESUME, c.CAT_TITRE, r.REC_CONTENU
                    FROM RECETTE r
                    JOIN CATÉGORIE c ON r.CAT_ID = c.CAT_ID
                    WHERE r.REC_ID = :recetteId";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':recetteId', $recetteId, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de la recette : " . $e->getMessage();
            return false;
        }
    }
    public function loginUser($username, $password)
    {
        // Récupérer les données de l'utilisateur
        $sql = "SELECT * FROM UTILISATEUR WHERE UTI_PSEUDO = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérifier le mot de passe haché
            if (password_verify($password, $user['UTI_MDP'])) {
                
                return true;
            } else {
                
                return false;
            }
        } else {
            // Nom d'utilisateur non trouvé
            return false;
        }
    }
    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM UTILISATEUR WHERE UTI_PSEUDO = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRecettesByUserId($userId)
    {
        $sql = "SELECT * FROM RECETTE WHERE UTI_ID = :userId";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>