<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class UserController extends BaseController
{
    public function logoutAction(){
        //session_start();
        unset($_SESSION['user']);
        session_destroy();
        header('location:' . DIRBASEURL . '/wordsearch');
    }
}
