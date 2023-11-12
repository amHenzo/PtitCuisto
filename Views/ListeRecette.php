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
    <?php
    include('./header.php');
    ?>
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
        $nbaff = $_GET["page"];
        $nbRec = $db->getNbRecettes();
        $nbRec = intval($nbRec / 10);
        if ($nbRec +1 >= $nbaff) {
            $stmt = $db->allRecetteRequest(($nbaff - 1) * 10, 10);
            foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $recette) {
                divRecette($recette, $db);
            }
        } else {
            echo "<H1>Erreur à l'affichage des pages</H1>";
            exit();
        }

        ?>
        <div id="pagination">
            <?php
            function affNumPage($i)
            {
                ?>
                <form action="../Controller/ListController.php" method="GET">
                    <input type='hidden' name="page" value="<?= $i ?>">
                    <input type="submit" value="<?= $i ?>">
                </form>
                <?php
            }

            for ($i = 0; $i <= $nbRec; $i++) {
                affNumPage($i +1);
            }
            ?>
        </div>
    </main>
    <?php
    include('./footer.php');
    ?>
</body>

</html>