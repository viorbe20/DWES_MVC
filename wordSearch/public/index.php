<?php

require "../vendor/autoload.php";

use App\Controllers\DefaultController;

$route = explode("index.php", $_SERVER['REQUEST_URI']); //$_SERVER['REQUEST_URI']; Si a este le quitamos el dirbase, nos quedamos con la ruta
$controller = new DefaultController(); //Llama al controller, instanciando el objeto

//Procesamiento de la ruta
if ($route[1] == "/wordsearch") {
    $controller->indexAction();
    //ruta: http://localhost/repasoJunio/ra3/db/wordSearch/public/index.php/wordsearch
} else if ($route[1] == "/wordsearch/add") {
    $controller->addAction();
} else {
    echo "No route";
}
