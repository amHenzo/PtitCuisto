<?php
$action = isset($_GET['action']) ? $_GET['action'] : 'afficherFormulaire';

require_once 'Controller/LoginController.php';

$loginController = new LoginController();

if($action == 'afficherFormulaire'){

    $loginController->afficherFormulaire();

}else if($action == 'traiterConnexion'){

    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $loginController->traiterConnexion($nom_utilisateur, $mot_de_passe);

}
?>
