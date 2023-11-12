<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$search = isset($_GET['old_search']) ? $_GET['old_search'] : "";
if (isset($_GET["reason"])) {
    if ($_GET["reason"] == 'refresh') {
        //unset($_GET["reason"]);
        header("Location: ../Views/Recherche.php?page=$current_page&recherche=$search");
        exit();
    } else {
        if (isset($_GET["titre"])) {
            $search = $_GET["titre"];
            header("Location: ../Views/Recherche.php?page=$current_page&recherche=$search");
            exit();
        }
    }
}
header("Location: ../Views/ListeRecette.php?page=$current_page");
exit();
?>