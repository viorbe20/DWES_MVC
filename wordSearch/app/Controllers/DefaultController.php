<?php
//Los controladores tienen acciones
//se usa el concepto 'action'

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');
//require_once('..\vendor\autoload.php');

class DefaultController extends BaseController
{
    //Página principa de la aplicación
    public function indexAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["search"])) {
            $data = $word->getByName($word);
        } else if (isset($_POST["add"])) {
            //Redirecciona a otra página
            header("location:" . DIRBASEURL . "/wordsearch/add");
        } else {
            //Por defecto. Muestra todas las palabras de la base de datos
            $data = $word->get();
            $this->renderHTML("../view/index_view.php", $data);
        }
    }

    //Página para añadir una palabra a la base de datos
    //Introducida la palabra te redirige a la página inicial
    public function addAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["addNewWord"]) || isset($_POST["home"]) ) {
            $data["word"] = $_POST["inputNewWord"];
            $word->set($data);
            header("location:" . DIRBASEURL . "/wordsearch");
        } else {
            $this->renderHTML("../view/index_add_view.php"); 
        }
    }
}
