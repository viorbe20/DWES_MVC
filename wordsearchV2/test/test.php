<?php

require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Word;

//Patrón Singleton. Instanciamos solo un objeto
$word = Word::getInstancia();

//Creamos registro
?>
<br><br>
<form method="post">
    <p>Introduce una capital</p>
    <input class = "myInput" type="text" name="newWord" placeholder="Introduce una capital">
    <input class = "myButton" type="submit" value="Añadir" name="addNewWord">
    
</form>
<?php


//Eliminamos registro introduciendo el id
echo "<br>3. Eliminación de registro:<br>";
$idDelCap = array(
    "id" => 1
);

$word->delete($idDelCap);

//Editar registro
echo "<br>4. Edición de registro:<br>";
$editCap = array(
    "word" => "Londres",
    "id" => 2
);
$word->edit($editCap);

//Muestra capitales
echo "<h2>Capitales</h2>";
foreach ($data as $value) {
    echo "<p class='name'>" . $value["word"] . " </p><a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/delete/" . $value["id"] ."'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/edit/" . $value["id"] ."/" . $value["word"] ."'>Editar</a>";
    echo ('<br>');
}

