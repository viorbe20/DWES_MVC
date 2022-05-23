<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class UserController extends BaseController
{
    //Método que carga la página de inicio
    public function loginAction()
    {
        $data = array();
        $user = User::getInstancia();

        if (isset($_POST["login"])) {
            //Validamos que no estén los campos vacíos
            if ((!empty($_POST['user']) || (!empty($_POST['password'])))) {
                $name = $user->getByName($_POST['user']);
                if (count($name) == 0) {
                    //Nombre usuario no existe
                    echo "<div id='msgLogin'> No existe ese nombre de usuario.</div>";
                    $this->renderHTML('../view/login_view.php', $data);
                } else {
                    //Si existe el nombre comprobamos con la contraseña
                    $psw = $user->getPassword();
                    if ($psw != $_POST['password']) {
                        echo "<div id='msgLogin'> Usuario y contraseña no coinciden.</div>";
                        $this->renderHTML('../view/login_view.php', $data);
                    } else {
                        //Da acceso a la app
                        header('location: ' . DIRBASEURL . '/wordsearch');
                    }
                }
            } else {
                //Campos no rellenos
                echo "<div id='msgLogin'> Los dos campos deben estar rellenos.</div>";
                $this->renderHTML('../view/login_view.php', $data);
            }
        } else {
            $this->renderHTML('../view/login_view.php', $data);
        }
    }
}
