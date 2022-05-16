<?php
//Los controladores tienen acciones
//se usa el concepto 'action'

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController
{
    //Página principa de la aplicación
    //Te lleva a otras páginas
    public function indexAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["search"])) {
            $data = $word->getByName($word);
        } else if (isset($_POST["add"])) {
            //Redirecciona a otra página
            header("location:" . DIRBASEURL . "/wordsearch/add");
        } else if (isset($_POST["edit"])) {
            //Redirecciona a otra página
            header("location:" . DIRBASEURL . "/wordsearch/edit/");
        } else if (isset($_POST["delete"])) {
            //Borra la palabra seleccionada
            $data = $word->get();
            $this->renderHTML("../view/index_view.php", $data);
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

        if (isset($_POST["addNewWord"]) || isset($_POST["home"])) {
            $data["word"] = $_POST["inputNewWord"];
            $word->set($data);
            header("location:" . DIRBASEURL . "/wordsearch");
        } else {
            $this->renderHTML("../view/index_add_view.php");
        }
    }

    //Página para editar una palabra de la base de datos
    //Modificada la palabra te redirige a la página inicial
    public function editAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["addEditedWord"]) || isset($_POST["home"])) {
            //$data["word"] = $_POST["inputEditedWord"];
            $data = array (
                "word" => $_POST["inputEditedWord"],
                "id" => $_POST["id"]
            );
            $word->edit($data);
            header("location:" . DIRBASEURL . "/wordsearch");
        } else {
            //Cargo la db en esta página
            $data = $word->get();
            $this->renderHTML("../view/index_edit_view.php", $data);
        }
    }

    //Página para eliminar una palabra de la base de datos
    public function deleteAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["addEditedWord"]) || isset($_POST["home"])) {
            $data["word"] = $_POST["inputEditedWord"];
            $word->edit($data);
            header("location:" . DIRBASEURL . "/wordsearch");
        } else {
            $this->renderHTML("../view/index_edit_view.php");
        }
    }
}
