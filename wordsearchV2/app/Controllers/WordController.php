<?php

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class WordController extends BaseController
{

    //Muestra la página para añadir palabras
    public function addWordAction()
    {
        $data = array();

        if (isset($_POST['submit'])) {
            $word = Word::getInstancia();
            $word->setName($_POST['newWord']);
            $word->setEntity();
            //$sh->setId($sh->lastInsert());
            header('location: ' . DIRBASEURL . '/wordsearch');
        } else {
            $this->renderHTML('..\view\add_view.php', $data);
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