<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <title></title>
</head>
<?php
    $css = file_get_contents("../view/css/style_view.css");
    echo "<style>$css</style>";
?>
<body>

    <h2>Introduce una capital</h2>
    <form action="" method="post">
        <input type="text" name="inputNewWord" placeholder="Introduce una capital">
        <input type="submit" name="addNewWord" value="Añadir"><br><br>
        <input type="submit" name="home" value="Volver">
    </form>
</body>

</html>