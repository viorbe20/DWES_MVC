<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";
use App\Controllers\DefaultController;
use App\Core\Router;

$router = new Router();

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'index',
    'path'=>'/wordsearch/',
    'action'=>[DefaultController::class, 'indexAction']
));

//Petición y respuesta
$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']);
$route = $router->matchs($request);

if($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);

} else {
    echo "No route matched";
}
?>