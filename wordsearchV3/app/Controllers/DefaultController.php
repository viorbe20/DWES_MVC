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

        //Login
        if (isset($_POST["login"])) {
            if ((!empty($_POST['username']) || (!empty($_POST['password'])))) {
                //comprobar que es correcto
                $user = new User();
                $_SESSION["user"]["username"] =  $_POST["username"];
                $_SESSION["user"]["password"] =  $_POST["password"];
                array_push($user_data, "user1", "user1");
                array_push($data, $user_data);
                array_push($data, $word->getAll());
                $this->renderHTML('../view/index_view.php', $data);
            } else {
                //Renderiza página inicio con los datos  
                $data = $word->getAll();
                $this->renderHTML('../view/index_view.php', $data);
            }
        } else if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            $data = $word->getByName($_POST["inputWord"]);
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
