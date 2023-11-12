<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
//unset($_GET["reason"]);
if (isset($_GET["categorie"])) {
    $search = $_GET["categorie"];
    header("Location: ../Views/Categorie.php?page=$current_page&categorie=$search");
    exit();
}
header("Location: ../Views/ListeRecette.php?page=$current_page");
exit();
?>