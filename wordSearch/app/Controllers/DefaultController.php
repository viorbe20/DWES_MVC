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

        if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            $data = $word->getByName($_POST["inputWord"]);
            $this->renderHTML("../view/index_view.php", $data);
        } else if (isset($_POST["add"])) {
            //Redirecciona a otra página
            header("location:" . DIRBASEURL . "/wordsearch/add");
        } else if (isset($_POST["edit"])) {
            //Redirecciona a otra página
            header("location:" . DIRBASEURL . "/wordsearch/edit/");
        } else if (isset($_POST["delete"])) {
            header("location:" . DIRBASEURL . "/wordsearch/delete/");
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
        //Para que no guarde si el input está vacío
        if (isset($_POST["addNewWord"]) && (!empty($_POST['inputNewWord']))) {
            if (!empty($_POST["inputNewWord"])) {
                $data["word"] = $_POST["inputNewWord"];
                $word->set($data);
            }
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

        if (isset($_POST["deleteWord"])) {
            $data = array (
                "id" => $_POST["id"]
            );
            $word->delete($data);
            header("location:" .   DIRBASEURL . "/wordsearch");
        } else if (isset($_POST["home"])) {
            header("location:" . DIRBASEURL . "/wordsearch");
        }else {
            //Cargo la db en esta página
            $data = $word->get();
            $this->renderHTML("../view/index_delete_view.php", $data);
        }
    }
}
