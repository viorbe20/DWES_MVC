<?php

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class DefaultController extends BaseController
{
    //Método que carga la página de inicio
    public function indexAction()
    {
        $data = array();
        $word = Word::getInstancia();

        if (isset($_POST["search"]) && (!empty($_POST["inputWord"]))) {
            $data = $word->getByName($_POST["inputWord"]);
            $this->renderHTML("../view/index_view.php", $data);
        } else if (isset($_POST['add'])) {
            header('location:' . DIRBASEURL . '/wordsearch/add');
        } else {
            //Renderiza página inicio con los datos  
            $data = $word->getAll();
            $this->renderHTML('../view/index_view.php', $data);
        }
    }
}
?>