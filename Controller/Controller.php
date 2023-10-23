<?php
class Controller
{
    public function index()
    {
        $title = 'test';
        $content = 'deez nuts';
        include($_SERVER['DOCUMENT_ROOT'] . "/ptitCuisto/Views/homepage.php");
        //echo $_SERVER['PHP_SELF'];
    }
    public function filtre()
    {

    }
}
?>