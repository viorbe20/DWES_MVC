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
                $user = User::getInstancia();
                $user->setUsername($_POST['username']);
                $user->setPasswrd($_POST['passwrd']);
                $result = $user->getByLogin();

                //Si hay coincidencia la devuelve
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $_SESSION['user']['profile'] = $value['prfile'];
                        $_SESSION['user']['username'] = $value['username'];
                        array_push($user_data, $_SESSION['user']);
                        array_push($data, $user_data, $word->getAll());
                        $this->renderHTML('../view/index_view.php', $data);
                    }
                } else {
                    //Si los datos no coinciden, iniciamos sesión con datos vacíos
                    array_push($data, $user_data, $word->getAll());
                    $this->renderHTML('../view/index_view.php', $data);
                }
            }

        //Busca una palabra
        } else if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            array_push($data, $user_data, $word->getByName($_POST["inputWord"]));
            $this->renderHTML('../view/index_view.php', $data);

            //Añade una palabra
        } else if (isset($_POST['add'])) {
            //header('location:' . DIRBASEURL . '/wordsearch/add');
            //array_push($data, $user_data, $word->getAll());
            //$this->renderHTML('../view/add_view.php');
            header('location:' . DIRBASEURL . '/wordsearch/add');

            //Renderizado por defecto
        } else {
            //Renderiza página inicio con los datos  
            array_push($data, $user_data, $word->getAll());
            $this->renderHTML('../view/index_view.php', $data);
        }
    }
}
