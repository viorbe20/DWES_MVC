<?php

require_once('..\app\Config\constantes.php');
require_once('..\vendor\autoload.php');

use App\Models\Word;

//Patrón Singleton. Instanciamos solo un objeto
$word = Word::getInstancia();
//$rest = explode("/", $data);
//Creamos registro
?>
<br><br>
<form method="post">
    <p>1. Introduce una capital</p>
    <input class="myInput" type="text" name="newWord" placeholder="Introduce una capital">
    <input class="myButton" type="submit" value="Añadir" name="addNewWord">
</form>
<?php

//Muestra capitales
echo "<h2>Capitales</h2>";
foreach ($data as $value) {
    echo "<p class='name'>" . $value["word"] . " </p><a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/delete/" . $value["id"] . "'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/edit/" . $value["id"] . "/" . $value["word"] . "'>Editar</a>";
    echo ('<br>');
}
