<?php
class Controller
{
    public function index()
    {
        $title = 'test';
        $content = 'caca';
        include($_SERVER['DOCUMENT_ROOT'] . "/Views/homepage.php");
        //echo $_SERVER['PHP_SELF'];
    }
    public function filtre()
    {

    }
}
?>