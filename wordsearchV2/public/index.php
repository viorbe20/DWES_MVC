<?php
require "../vendor/autoload.php";
require "../app/Config/constantes.php";
use App\Controllers\DefaultController;
use App\Controllers\WordController;
use App\Controllers\TestController;
use App\Core\Router;

$router = new Router();

//Enrutamiento test
$router->add(array(
    'name'=>'index',
    'path'=>'/test/',
    'action'=>[TestController::class, 'testAction']
));

//Enrutamiento a la página de inicio
$router->add(array(
    'name'=>'index',
    'path'=>'/wordsearch/',
    'action'=>[DefaultController::class, 'indexAction']
));

//Enrutamiento a página para añadir palabra
$router->add(array(
    'name'=>'addWord',
    'path'=>'/wordsearch\/add/',
    'action'=>[WordController::class, 'addWordAction']
));

//Enrutamiento a página para eliminar palabra
$router->add(array(
    'name'=>'editWord',
    'path'=>'/wordsearch\/edit\/\d{1,3}\/\w{1,}/',
    'action'=>[WordController::class, 'editWordAction']
));

//Enrutamiento a página para eliminar palabra
$router->add(array(
    'name'=>'deleteWord',
    'path'=>'/wordsearch\/delete\/\d{1,3}/',
    'action'=>[WordController::class, 'deleteWordAction']
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
