<?php
class Controller
{
    public function index()
    {
        $title = 'test';
        $content = 'caca';
        include($_SERVER['DOCUMENT_ROOT'] . "/ptitCuisto/Views/homepage.php");
    }
    public function filtre()
    {

    }
}
?>