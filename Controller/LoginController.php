<?php
require_once 'Model/User.php';
require_once 'Model/dbConnexion.php';

class LoginController
{
    private $db;

    public function __construct()
    {
        $this->db = new LoginModel();
    }

    public function afficherFormulaire()
    {
        include 'views/login_form.php';
    }

    public function traiterConnexion($nom_utilisateur, $mot_de_passe)
    {
        $userModel = new User($this->db);
        $connexionReussie = $userModel->verifierConnexion($nom_utilisateur, $mot_de_passe);

        if ($connexionReussie) {
            header('Location: Views/homepage.php');
            exit;
        } else {
            echo '<script>alert("Nom d\'utilisateur ou mot de passe incorrect.");</script>';
        }
    }
}
?>
