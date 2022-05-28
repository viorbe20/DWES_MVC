<?php

namespace App\Controllers;

require_once('..\app\Config\constantes.php');

class UserController extends BaseController
{
    public function logoutAction()
    {
        //Cierra sesión y envía a la página de inicio
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/wordsearch');
    }
}
