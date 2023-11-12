<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./login.php");
    exit();
}

include('../Model/LoginModel.php');

$loginModel = new LoginModel();

$username = $_SESSION['username'];
$userData = $loginModel->getUserByUsername($username);
$userId = $userData['UTI_ID'];

$recettes = $loginModel->getRecettesByUserId($userId);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../Css/profil.css">
</head>

<body>
    <header>
        <h1>Profil de l'utilisateur</h1>
    </header>
    
    <main>
        <p>Bienvenue sur votre profil, <?= $_SESSION['username']; ?>!</p>

        <h2>Vos recettes :</h2>
        <ul>
            <?php foreach ($recettes as $recette) : ?>
                <li><?= $recette['REC_TITRE']; ?></li>
            <?php endforeach; ?>
        </ul>
    </main>

    <footer>
        <a href="../Controller/LogoutController.php">Déconnexion</a>
    </footer>
</body>

</html>
