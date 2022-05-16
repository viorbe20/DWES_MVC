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
} else if (explode("/", $route[1])[1] == "wordsearch" && explode("/", $route[1])[2] == "edit" && preg_match("/\d{1,}/", explode("/", $route[1])[3]) == 1) {
    $controller->editAction(explode("/", $route[1])[3]);
} else if (explode("/", $route[1])[1] == "wordsearch" && explode("/", $route[1])[2] == "delete" && preg_match("/\d{1,}/", explode("/", $route[1])[3]) == 1) {
    $controller->deleteAction(explode("/", $route[1])[3]);
} else {
    echo "No route";
}
