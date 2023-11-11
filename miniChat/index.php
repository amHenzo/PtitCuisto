<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['LogErr'])){
            echo '<p>' . $_SESSION['LogErr'] . '</p>';
        }
    ?>
    <form action="./Controleurs/LoginControleur.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <br>
        <input type="text" name="username" id="username" required>
        <br>
        <label for="password">Mot de Passe:</label>
        <br>
        <input type="password" name="password" id="password" required>
        <br>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>