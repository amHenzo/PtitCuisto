<?php
include('./Controller/Controller.php');
$request = $_SERVER['REQUEST_URI'];
$controller = new Controller();
$path = parse_url($request, PHP_URL_PATH);
switch ($path) {
    case ('/ptitCuisto/'):
        $controller->index();
        break;
    case ('/ptitCuisto/Filtre'):
        $controller->filtre();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo 'Page non trouvé' . $path;
        break;
}
?>