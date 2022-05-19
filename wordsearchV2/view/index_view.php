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
include("require/view_header.html");
$css = file_get_contents("../view/css/style_view.css");
echo "<style>$css</style>";
?>

<body>

    <main>

        <h2>Introduce una nueva palabra</h2>

        <form action="" method="post">
            <input class = "myInput" type="text" name="inputWord" id="inputWord" placeholder="Busca una capital">
            <input class = "myButton" type="submit" name="search" value="Buscar">
            <input class = "myButton" type="submit" name="add" value="Añadir"><br><br>
        </form>

        <h3>Cuatro primeras capitales</h3>

        <?php
        //Muestra los registros de la bd
        echo "<div id='container'>";
        foreach ($data as $value) {
            echo "<div class='capital'>";
            echo "<p class='name'>" . $value["word"] . " </p><a href='/repasoJunio/ra3/db/wordSearch/public/index.php/wordsearch/delete/" . $value["id"] . "'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordSearch/public/index.php/wordsearch/edit/" . $value["id"] . "'>Editar</a> </br>";
            echo "</div>";
            echo ('<br>');
        }
        echo "</div>";
        ?>
    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>