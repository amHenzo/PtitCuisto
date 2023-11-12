<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
//unset($_GET["reason"]);
if (isset($_GET["ingredient"])) {
    $search = $_GET["ingredient"];
    header("Location: ../Views/Ingredient.php?page=$current_page&ingredient=$search");
    exit();
}
header("Location: ../Views/ListeRecette.php?page=$current_page");
exit();
?>