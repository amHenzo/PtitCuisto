<?php
require('./Controller/Controller.php');
$request = $_SERVER['REQUEST_URI'];
$controller = new Controller();
$path = parse_url($request, PHP_URL_PATH);
switch ($path) {
    case ('/'):
        $controller->index();
        break;
    case ('/Filtre'):
        $controller->filtre();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Page non trouvé';
        break;
}
?>