<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Page Accueil - Edito
        Page Accueil - Edito
    </title>
    <link rel="stylesheet" href="../Css/edito.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
    
        <?php
        include($_SERVER['DOCUMENT_ROOT'] . '/ptitCuisto/Views/header.php');
        ?>
    
    <main>
        <img src="../Assets/img_edito.png" alt="" srcset="" id="imgpres">
        <div class="wrapper">
            <div id="recette_list">
                <h3>Les dernières recettes</h3>

                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/ptitCuisto/Model/dbConnexion.php');
                $bdd = new LoginModel();
                $bdd->connect();
                $stmt = $bdd->allRecetteRequest(0, 3);
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $recettes) {
                    ?>
                    <div class="recettes">
                        <img src="../Assets/imgrecette.jpg" alt="" class="rec_img">
                        <div class="spec">
                            <h5 class="rec_titre">
                                <?= $recettes["REC_TITRE"]; ?>
                            </h5>

                            <p class="rec_desc">
                                <?= $recettes["REC_RESUME"] ?>
                            </p>
                        </div>
                    </div>
                    <?php

                }
                ?>


            </div>
            <div id="presentation">
                <img src="../Assets/Pticuisto.png" alt="" srcset="">
                <h5>Edito</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis reiciendis vero nemo sapiente eum
                    molestiae veniam eligendi quidem, culpa, doloribus inventore, et praesentium fugiat magnam maiores.
                    Iusto, inventore! Repudiandae, sapiente?</p>
            </div>

        </div>
    </main>
    
        <?php
        include($_SERVER['DOCUMENT_ROOT'] .'/ptitCuisto/Views/footer.php');
        ?>
    
</body>

</html>