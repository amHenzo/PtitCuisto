<?php

include '../Models/LoginModel.php';

$model = new LoginModel();
$model->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $pasword = $_POST['password'];
    $response = $model->userRequest($username, $pasword);

    if ($response->rowCount() >=1) {
        $row = $response->fetch(PDO::FETCH_ASSOC);
        if(isset($_SESSION['LogErr'])){$_SESSION['LogErr'] = "";}
        setcookie("userid", $row["ID"], time()+3600, "/");
        header("Location: ../Pages/Main.php");
        exit;
    } else {
        $_SESSION['LogErr'] = "Login/MDP Incorrect";
        header("Location: ../index.php");
        exit;
    }
} else {
    $message = "";
}

?>