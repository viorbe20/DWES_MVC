<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class LoginController extends BaseController
{
    //Método que carga la página de inicio
    public function loginAction()
    {
        $data = array();
        $user = User::getInstancia();

        if (isset($_POST["login"])) {
            //Validamos que no estén los campos vacíos
            if ((!empty($_POST['user']) || (!empty($_POST['password'])))) {
                echo "<p> correcto.</p>";
            } else {
            echo "<div id='msgLogin'> Los dos campos deben estar rellenos.</div>";
            $this->renderHTML('../view/login_view.php', $data);
            }
            
        } else {
            $this->renderHTML('../view/login_view.php', $data);
        }
    }
}
