<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la recette</title>
    <link rel="stylesheet" href="../Css/recette.css">
</head>

<body>
    <main>

        <?php
        include('../Model/dbConnexion.php');

        // Vérifiez si l'ID de la recette est présent dans l'URL
        if (!isset($_GET["id"])) {
            echo "Erreur : ID de recette manquant dans l'URL.";
            exit();
        }

        // Récupérez l'ID de la recette depuis l'URL
        $recetteId = $_GET["id"];

        // Créez une instance du modèle et connectez-vous à la base de données
        $db = new LoginModel();
        $db->connect();

        // Obtenez les informations de la recette en fonction de l'ID
        $stmtRecette = $db->getRecetteById($recetteId);

        // Vérifiez si la recette existe
        if ($stmtRecette->rowCount() > 0) {
            $recette = $stmtRecette->fetch(PDO::FETCH_ASSOC);

            // Affichez les informations de la recette
            ?>
            <div class="details-recette">
                <h1><?= $recette["REC_TITRE"]; ?></h1>
                <p>Catégorie: <?= $recette["CAT_TITRE"]; ?></p>
                <p>Résumé: <?= $recette["REC_RESUME"]; ?></p>
                <p>Contenu: <?= $recette["REC_CONTENU"];?></p>

                <!-- Affichez les ingrédients de la recette -->
                <h2>Ingrédients:</h2>
                <ul>
                    <?php
                    // Obtenez les ingrédients de la recette
                    $stmtIngredients = $db->getIngredientsByRecetteId($recetteId);

                    // Affichez chaque ingrédient
                    while ($ingredient = $stmtIngredients->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li>" . $ingredient["ING_NOM"] . "</li>";
                    }
                    ?>
                </ul>

                <!-- Ajoutez d'autres informations de la recette ici -->

                <!-- Ajoutez des styles ou d'autres éléments HTML au besoin -->
            </div>
            <?php
        } else {
            echo "Aucune recette trouvée avec cet ID.";
        }
        ?>

    </main>
</body>

</html>