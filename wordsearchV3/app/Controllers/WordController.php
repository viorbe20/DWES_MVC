<?php
/**
 * current() inicio en el primer elemento de un array
 */
namespace App\Controllers;

use App\Models\Word;

require_once('..\app\Config\constantes.php');

class WordController extends BaseController
{
    
    //Muestra la página para añadir palabras
    public function addWordAction()
    {
        $data = array();
        $word = Word::getInstancia();
        
        //Para que no guarde si el input está vacío
        if (isset($_POST["addNewWord"])) {
            
            // //Comprueba que el input no esté vacío
            // if ((!empty($_POST['newWord']))) {
            //     $word->setWord($_POST['newWord']);
            //     $data = $word->getByName($_POST["newWord"]); //La buscamos en la bd
                
            //     //Si existe, está repetida
            //     if (!empty($data)) {
            //         echo "<div id='msgExistingWord'> Esa palabra ya existe</div>";
            //         $this->renderHTML("../view/add_view.php");
            //     } else {
            //         //$word->setWord($_POST['newWord']);
            //         $word->setEntity();
            //         //header('location: ' . DIRBASEURL . '/wordsearch');
            //         $this->renderHTML("../view/add_view.php");
            //     }   
            } else {
                $this->renderHTML("../view/.php");
            //$this->renderHTML("../view/index_view.php");
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
