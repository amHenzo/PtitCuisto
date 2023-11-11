<!-- les autres éléments du header -->

<?php

$isUserLoggedIn = isset($_SESSION['utilisateur_connecte']) && $_SESSION['utilisateur_connecte'] === true;

if ($isUserLoggedIn) {
    echo '<a href="Views/user.php">Mon Compte</a>';
} else {
    echo '<a href="Views/login.php">Connexion</a>';
}
?>

<!-- les autres éléments du header -->