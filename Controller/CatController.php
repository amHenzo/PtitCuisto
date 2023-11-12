<?php
if (isset($_POST["filtre"])) {
    switch ($_POST["filtre"]) {
        case "categorie":
            if (isset($_POST["categorie"])) {
                $cat = $_POST['categorie'];
                header("Location: ../Views/Categorie.php?categorie=$cat");
            }
            exit();
        case "rechercher":
            if (isset($_POST["titre"])) {
                $recherche = $_POST["titre"];
                header("Location: ../Views/Recherche.php?recherche=$recherche");
            }
            exit();
        case "ingredient":
            if (isset($_POST['ingredient'])) {
                $ingredient = $_POST['ingredient'];
                header("Location: ../Views/Ingredient.php?ingredient=$ingredient");
            }
            exit;
        default:
            header("Location: ../Views/homepage.php");
    }
} else {
    header("Location: ../Views/homepage.php");
}
?>