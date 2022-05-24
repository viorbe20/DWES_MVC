<?php

namespace App\Controllers;

use App\Models\User;

require_once('..\app\Config\constantes.php');

class UserController extends BaseController
{
    public function logoutAction()
    {
        unset($_SESSION);
        session_destroy();
        header('Location:' . DIRBASEURL . '/wordsearch');
    }
}
