<?php

namespace App\Controllers;

use App\Models\User;

require_once('../app/Config/constantes.php');

class UserController extends BaseController
{


    //Da acceso a la aplicación
    public function loginAction()
    {
        $user = User::getInstancia();
        //Para que no guarde si el input está vacío
        if (isset($_POST["login"])) {
            echo ('ssss');
            //Validamos que no estén los campos vacíos
            if ((!empty($_POST['user']) || (!empty($_POST['password'])))) {
                # code...
            } else {
                # code...
            }

            // if (!empty($_POST["newWord"])) {

            //     //Comprueba que no esté repetida
            //     $data = $word->getByName($_POST["newWord"]);
            //     if (!current($data)) {
            //         echo "no repetido";
            //         $word->setWord($_POST['newWord']);
            //         $word->setEntity();
            //         header('location: ' . DIRBASEURL . '/wordsearch');
            //     } else {
            //         echo "<div id='msgExistingWord'> Esa palabra ya existe</div>";
            //         $this->renderHTML("../view/add_view.php");
            //     }
            // }
        } else {
            $this->renderHTML("../view/add_view.php");
        }
    }
}
