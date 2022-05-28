<h1>Test Sopa de Letras</h1>
<?php

require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Word;
use App\Models\User;

//http://localhost/repasoJunio/ra3/db/wordsearch/test/test.php

//Patrón Singleton. Instanciamos solo un objeto
$word = Word::getInstancia();
$user = User::getInstancia();
$user_login = array(
    "admin",
    "admin"
);
$user->getByLogin("admin");
var_dump($user);

//Creamos registro
// echo "1. Creamos registo.<br>";
// $capitalName = array(
//     "word" => "París"
// );
// $word->set($capitalName);

// //Seleccionamos registro mediante el id
// echo "<br>2. Selección registro:<br>";
// $idGetCap = array(
//     "id" => 1
// );

// $word->get($idGetCap);

// //Eliminamos registro introduciendo el id
// echo "<br>3. Eliminación de registro:<br>";
// $idDelCap = array(
//     "id" => 1
// );

// $word->delete($idDelCap);

// //Editar registro
// echo "<br>4. Edición de registro:<br>";
// $editCap = array(
//     "word" => "Londres",
//     "id" => 2
// );
// $word->edit($editCap);

