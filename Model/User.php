<?php
class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function verifierConnexion($nom_utilisateur, $mot_de_passe)
    {
        try {
            $query = $this->db->prepare("SELECT * FROM UTILISATEUR WHERE UTI_PSEUDO = :pseudo");
            $query->bindParam(':pseudo', $nom_utilisateur);
            $query->execute();
            $utilisateur = $query->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur) {
                if (password_verify($mot_de_passe, $utilisateur['UTI_MDP'])) {
                    $_SESSION['utilisateur_connecte'] = true;
                    $_SESSION['utilisateur_type'] = $utilisateur['TYPE_ID'];
                    $_SESSION['utilisateur_nom'] = $utilisateur['UTI_NOM'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur de requête : " . $e->getMessage();
            return false;
        }
    }
}
?>
