<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos dernières recettes</title>
    <link rel="stylesheet" href="../Css/list.css">
</head>

<body>
    <main>

        <?php
        include('../Model/dbConnexion.php');

        function divRecette($recettes, $db)
        {
            ?>
            <div class="recettes">
                <img src="../Assets/imgrecette.jpg" alt="" class="rec_img">
                <div class="spec">
                    <h5 class="rec_titre">
                        <?= $recettes["REC_TITRE"]; ?>
                    </h5>
                    <h5 class="rec_titre rec_cat">
                        <?php
                        $stmt = $db->getCat($recettes["CAT_ID"]);
                        $category = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (!empty($category)) {
                            echo $category[0]["CAT_TITRE"];
                        } else {
                            echo "Catégorie non trouvée";
                        }
                        ?>
                    </h5>

                    <p class="rec_desc">
                        <?= $recettes["REC_RESUME"] ?>
                    </p>
                </div>
            </div>
            <?php
        }

        $db = new LoginModel();
        $db->connect();
        if (!isset($nbaff)) {
            $nbaff = 0;
        }
        $stmt = $db->allRecetteRequest($nbaff, $nbaff + 10);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $recette) {
            divRecette($recette, $db);
        }
        ?>
    </main>
</body>

</html>