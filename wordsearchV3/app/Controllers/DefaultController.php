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
        $user = new User();

        //Login
        if (isset($_POST["login"])) {
            $user_data = $user->getByName($_POST['username']);
            if ((!empty($_POST['username']) || (!empty($_POST['password'])))) {
                // $user->getByLogin($_POST["username"], $_POST["password"]);
                // array_push($data, $user);
                // array_push($data, $word->getAll());
                // $this->renderHTML('../view/index_view.php', $data);
                //comprobar que es correcto
                //$user_data = $user->getByName($_POST['username']);

                if ($user_data[0]["passwrd"] == $_POST['password']) {
                    array_push($data, $user_data, $word->getAll());
                    $this->renderHTML("../view/index_view.php", $data);
                } else {
                    $this->renderHTML("../view/index_view.php", $data);
                }
            } else {
                //Renderiza página inicio con los datos  
                $data = $word->getAll();
                $this->renderHTML('../view/index_view.php', $data);
            }
            //Busca una palabra
        } else if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            array_push($data, "", $word->getAll());
            $this->renderHTML("../view/index_view.php", $data);
        } else if (isset($_POST['add'])) {
            header('location:' . DIRBASEURL . '/wordsearch/add');
        } else {
            //Renderiza página inicio con los datos  
            array_push($data, $user_data);
            array_push($data, $word->getAll());
            $this->renderHTML('../view/index_view.php', $data);
        }
    }
}
