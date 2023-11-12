<?php
include('../Model/dbConnexion.php');

$db = new LoginModel();
$db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $db->getUserByUsername($username);

    if ($user) {
        if (password_verify($password, $user['UTI_MDP'])) {
            header("Location: ../Views/profil.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Nom d'utilisateur non trouvé.";
    }
}
?>
