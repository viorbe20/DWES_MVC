<?php

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class WordController extends BaseController
{

    //Muestra la página para añadir palabras
    public function addWordAction()
    {
        $word = Word::getInstancia();

        if (isset($_POST['addNewWord'])) {
            //Establecemos las propiedades del objeto
            $word->setWord($_POST['newWord']);
            $word->setEntity();
            header('location:' . DIRBASEURL . '/wordsearch');
        }  else {
            $this->renderHTML('..\view\add_view.php');
        }
    }

    //Muestra la página para editar palabras
    //$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']); 
    //devuelve detrás de index.php: /edit/id/word
    public function editWordAction($request)
    {
        $rest = explode("/", $request);
        $selectedWord = end($rest);
        //prev() - moves the internal pointer to, and outputs, the previous element in the array
        $id = prev($rest);
        $data = array($selectedWord);

        if (isset($_POST['editWord'])) {
            $word = Word::getInstancia();
            $word->setWord($_POST['editedWord']);
            $word->setId($id);
            $word->editEntity();
            header('location: ' . DIRBASEURL . '/wordsearch');
        } else {
            //Carga $data para mostrar la ciudad seleccionada
            $this->renderHTML('..\view\edit_view.php', $data);
        }
    }

    //Muestra la página para eliminar palabras
    public function deleteWordAction()
    {
        // $elemento = explode("/", $request);
        // $id = end($elemento);
        // $sh = new Superheroe();
        // $sh->deleteEntity($id);
        // header('location: ' . DIRBASEURL. '/');
        $data = array();

        if (isset($_POST['submit'])) {
            $word = Word::getInstancia();
            $word->setName($_POST['newWord']);
            $word->setEntity();
            //$sh->setId($sh->lastInsert());
            header('location: ' . DIRBASEURL . '/wordsearch');
        } else {
            $this->renderHTML('..\view\delete_view.php', $data);
        }
    }
}

?>

<!-- 
{




    public function borrarPalabraAction($request)
    {
        $id = explode('/', $request)[3];
        print_r($id);
        session_start();

        if ($_SESSION['usuario']['usuario'] != "admin" && $_SESSION['usuario']['perfil'] != "admin") {
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $palabra = Palabra::getInstancia();

            $palabra->delete([$id]);
            header('location:' . DIRBASEURL . '/palabra');
        }
    }

    public function editarPalabraAction($request)
    {
        $id = explode('/', $request)[3];
        $palabraAntigua = explode('/', $request)[4];
        $data = array($palabraAntigua);
        $palabra = Palabra::getInstancia();

        if (isset($_POST["editar"])) {
            $palabra->edit([$_POST["palabra"], $id]);
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_edit_view.php', $data);
        }
    }

    public function loginPalabraAction()
    {
        $this->renderHTML('..\view\palabra_login_view.php');
    }

    public function cerrarSesionPalabraAction()
    {
        $this->renderHTML('..\view\palabra_cerrarSesion_view.php');
    }
} -->