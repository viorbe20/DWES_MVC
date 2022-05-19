<?php

namespace App\Controllers;
use App\Models\Word;
require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController{

    //Método que carga la página de inicio
    public function indexAction()
    {
        $data = array();
        $word = Word::getInstancia();
        $data = $word->getAll();
            //Renderiza página inicio con los datos  
            $this->renderHTML('..\view\index_view.php', $data);
    
        // if (isset($_POST['buscar'])) {
        //     $data = $word->getByName($_POST['palabra']);
        //     $this->renderHTML('..\view\palabra_view.php', $data);
        // } else if (isset($_POST['añadir'])) {
        //     header('location:' . DIRBASEURL . '/palabra/add');
        // } else {
        //     $data = $word->get();
        //     $this->renderHTML('..\view\index_view.php', $data);
        // }
    }
}

?>

<!-- 
{


    public function annadirPalabraAction()
    {
        $data = array();
        $palabra = Palabra::getInstancia();

        if (isset($_POST["añadir"])) {
            $palabra->set([$_POST["palabra"]]);
            header('location:' . DIRBASEURL . '/palabra');
        } else {
            $this->renderHTML('..\view\palabra_add_view.php', $data);
        }
    }

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
