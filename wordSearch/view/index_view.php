<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <title>Ejercicio Sopa de Letras</title>
</head>
<?php
    $css = file_get_contents("../view/css/style_index_view.css");
    echo "<style>$css</style>";
?>
<body>

    <h1>Ejercicio Sopa de Letras (MVC)</h1>

    <form action="" method="post">
        <input type="text" name="inputWord" id="inputWord" placeholder="Introduce una palabra">
        <input type="submit" name="search" value="Buscar">
        <input type="submit" name="add" value="Añadir"><br><br>
    </form>

    <h2>Capitales</h2>

    <?php
    //Muestra los registros de la bd
    echo "<div id='container'>";
    foreach ($data as $value) {
        echo "<div class='capital'>";
        echo $value["word"] . " <a href='/repasoJunio/ra3/db/wordSearch/public/index.php/wordsearch/delete/" . $value["id"] . "'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordSearch/public/index.php/wordsearch/edit/" . $value["id"] . "'>Editar</a> </br>";
        echo "</div>";
        echo ('<br>');
    }
    echo "</div>";
    ?>

</body>

</html>