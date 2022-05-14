<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <script src='js/main.js'></script>
    <title></title>
</head>

<body>
<h1>Ejercicio Sopa de Letras (MVC)</h1>
<input type="text" nama="input_word" id="input_word" placeholder="Introduce una palabra">
<button type="submit" name="search">Buscar</button>
<button type="submit" name="add">Añadir</button><br><br>
<h2>Capitales</h2>
<?php
//Muestra los registros de la bd

foreach ($data as $value) {
    echo($value["word"]);
    echo('<br>') ;
}
?>

</body>

</html>