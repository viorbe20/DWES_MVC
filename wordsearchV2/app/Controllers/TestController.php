<?php

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class TestController extends BaseController
{
    //Test
    public function testAction($request)
    {
        $data = $request;
        $word = Word::getInstancia();

        if (isset($_POST['addNewWord'])) {
            //Establecemos las propiedades del objeto
            $word->setWord($_POST['newWord']);
            $word->setEntity();
            header('location:' . DIRBASEURL . '/test');
        } else if (isset($_POST['add'])) {
            header('location:' . DIRBASEURL . '/wordsearch/add');
        } else {
            //Renderiza página inicio con los datos  
            $data = $word->getAll();
            $this->renderHTML('../test/test.php', $data);
        }
    }
}
?>