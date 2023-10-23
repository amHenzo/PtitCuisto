<?php
function dbConnect()
{
    try {
        $db = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root", "");
        return $db;
    } catch (PDOException $e) {
        die("Erreur connexion bdd " . $e->getMessage());
    }
}
?>