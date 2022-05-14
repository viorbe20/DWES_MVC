<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <title></title>
</head>

<body>
<h1>Ejercicio Sopa de Letras (MVC)</h1>

<form action="" method="post">
<input type="text" nama="input_word" id="input_word" placeholder="Introduce una palabra">
<input type="submit" name="search" value="Buscar">
<input type="submit" name="add" value="Añadir"><br><br>
</form>

<h2>Capitales</h2>

<?php

//Muestra los registros de la bd
foreach ($data as $value) {
    echo($value["word"]);
    ?>
    <a href="" name="edit">Editar</a>
    <a href="" name="delete">Borrar</a>
    <?php
    echo('<br>') ;
}
?>

</body>
</html>