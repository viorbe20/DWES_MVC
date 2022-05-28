<?php
$ejercicios = array (
    array ('id'=>1, 'titulo'=>'Sopa de Letras MVC', 'descripcion'=>'Muestra 5 capitales almacenadas en una sopa de letras.', 'enlace'=>'wordSearch/public/index.php/wordsearch', 'github'=>'https://github.com/viorbe20/DWES_MVC/blob/main/wordSearch/public/index.php/wordsearch'),
array ('id'=>2, 'titulo'=>'Sopa de Letras MVC', 'descripcion'=>'Sopa de letras con sesiones.', 'enlace'=>'wordSearchV3/public/index.php/wordsearch', 'github'=>'https://github.com/viorbe20/DWES_MVC/blob/main/wordSearchV3/public/index.php/wordsearch'),
)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virginia Ordoño Bernier</title>
</head>
<body>
<h1>Actividades de Repaso (DWES)</h1>
    <h3>Proyectos MVC</h3>
    <a href="../index.php">Volver al índice de ejercicios</a><br><br>
    <?php 
    foreach ($ejercicios as $key => $value) {
        echo '<a target="_blank" href="' . $value['enlace'] . '">' . $value['id'] . '.' . $value['titulo'] .'</a>' . '<br>' . $value['descripcion'] . '<br>';
        echo '<a target="_blank" href="' . $value['github'] . '">Enlace Github</a><br><br>';
    }
        ?>
</body>
</html>