<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recettes avec </title>
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
               
                <a href="details_recette.php?id=<?= $recettes["REC_ID"] ?>">
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
                </a>
            </div>
            <?php
        }

        $db = new LoginModel();
        $db->connect();
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        if (!isset($_GET["recherche"])) {
            echo "Erreur de parametre dans l'URL";
            exit();
        }
        $text = $_GET["recherche"];
        $nbaff = $_GET["page"];
        $nbRec = $db->getNbRecherche($text);
        $nbRec = intval($nbRec / 10);
        if ($nbRec + 1 >= $nbaff) {
            $stmt = $db->getRecetteRecherche($text, ($nbaff - 1) * 10);
            foreach ($stmt as $recette) {
                divRecette($recette, $db);
            }
        } else {
            echo "<H1>Erreur à l'affichage des pages</H1>";
            exit();
        }

        ?>
        <form action="../Controller/RechercheController.php" method="get">
            <input type="hidden" name="filtre" value="rechercher">
            <input type="hidden" name="reason" value="search">
            <input type="text" name="titre">
            <input type="submit" value="Rechercher">
        </form>
        <div id="pagination">
            <?php
            function affNumPage($i)
            {
                ?>
                <form action="../Controller/RechercheController.php" method="GET">
                    <input type='hidden' name="page" value="<?= $i ?>">
                    <input type="hidden" name="reason" value="refresh">
                    <input type="hidden" name="old_search" value="<?= $_GET["recherche"] ?>">
                    <input type="submit" value="<?= $i ?>">
                </form>
                <?php
            }

            for ($i = 1; $i <= $nbRec; $i++) {
                affNumPage($i);
            }
            ?>
        </div>
    </main>
</body>

</html>