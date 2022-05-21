<?php

namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class WordController extends BaseController
{

    //Muestra la página para añadir palabras
    public function addWordAction()
    {
        $word = Word::getInstancia();
        //Para que no guarde si el input está vacío
        if (isset($_POST["addNewWord"]) && (!empty($_POST['newWord']))) {

            if (!empty($_POST["newWord"])) {

                //Comprueba que no esté repetida
                $data = $word->getByName($_POST["newWord"]);
                if (!current($data)) {
                    echo "no repetido";
                    $word->setWord($_POST['newWord']);
                    $word->setEntity();
                    header('location: ' . DIRBASEURL . '/wordsearch');
                } else {
                    echo "<div id='msgExistingWord'> Esa palabra ya existe</div>";
                    $this->renderHTML("../view/add_view.php");
                }
            }
        } else {
            $this->renderHTML("../view/add_view.php");
        }
    }

    //Muestra la página para editar palabras
    //$request = str_replace(DIRBASEURL,'',$_SERVER['REQUEST_URI']); 
    //devuelve detrás de index.php: /edit/id/word
    public function editWordAction($request)
    {
        $rest = explode("/", $request);
        $selectedWord = end($rest);
        //prev() - moves the internal pointer to, and outputs, the previous element in the array
        $id = prev($rest);
        $data = array($selectedWord);
        $word = Word::getInstancia();

        if (isset($_POST['editWord'])) {
            $word->setWord($_POST['editedWord']);
            $word->setId($id);
            $word->editEntity();
            header('location: ' . DIRBASEURL . '/wordsearch');
        } else {
            //Carga $data para mostrar la ciudad seleccionada
            $this->renderHTML('..\view\edit_view.php', $data);
        }
    }

    //Muestra la página para eliminar palabras
    public function deleteWordAction($request)
    {
        $rest = explode("/", $request);
        $selectedWord = end($rest);
        //prev() - moves the internal pointer to, and outputs, the previous element in the array
        $id = prev($rest);
        $data = array($selectedWord);
        $word = Word::getInstancia();

        if (isset($_POST['delete'])) {
            $word->deleteEntity($id);
            header('location: ' . DIRBASEURL . '/wordsearch');
        } else {
            $this->renderHTML('..\view\delete_view.php', $data);
        }
    }
}
