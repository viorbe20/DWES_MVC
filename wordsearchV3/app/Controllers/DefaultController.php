<?php

namespace App\Controllers;

use App\Models\Word;
use App\Models\User;

require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController
{
    //Método que carga la página de inicio
    public function indexAction()
    {
        $data = array();
        $user_data = array();
        $word = Word::getInstancia();
        $user = User::getInstancia();

        //Login
        if (isset($_POST["login"])) {
            if ((!empty($_POST['username']) || (!empty($_POST['passwrd'])))) {
                //Extraemos usuario de la bbdd
                $user_data = $user->getByName($_POST['username']);
                //Si exite, cargamos sesión con username y password
                if (!empty($user_data)) {
                    foreach ($user_data as $value) {
                        $_SESSION['user']["username"] = $value["username"];
                        $_SESSION['user']["passwrd"] = $value["passwrd"];
                    }
                }
                //Si la contraseña coincide con la introducida por el usuario cargamos $data con SESSION['user] y palabras
                if ($user_data[0]["passwrd"] == $_POST['passwrd']) {
                    array_push($data, $user_data, $word->getAll());
                    $this->renderHTML("../view/index_view.php", $data);
                } else {
                    //Si los datos no coinciden, iniciamos sesión con datos vacíos
                    array_push($data, $user_data, $word->getAll());
                    $this->renderHTML('../view/index_view.php', $data);
                }
            } else {
                //Renderiza página inicio con los datos  
                array_push($data, $user_data, $word->getAll());
                $this->renderHTML('../view/index_view.php', $data);
            }
        //Busca una palabra
        } else if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            array_push($data, $user_data, $word->getByName($_POST["inputWord"]));
            $this->renderHTML('../view/index_view.php', $data);
        //Añade una palabra
        } else if (isset($_POST['add'])) {
            header('location:' . DIRBASEURL . '/wordsearch/add');
        //Elimina una palabra
        } else if (isset($_POST['delete'])) {
            header('location:' . DIRBASEURL . '/wordsearch/delete');
        //Renderizado por defecto
        } else {
            //Renderiza página inicio con los datos  
            array_push($data, $user_data, $word->getAll());
            $this->renderHTML('../view/index_view.php', $data);
        }
    }
}
