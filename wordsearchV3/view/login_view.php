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

        <form action="" method="post">
            <div id="login">
            <input class = "myInput" type="text" name="user" id="inputWord" placeholder="Nombre de usuario">
            <input class = "myInput" type="text" name="password" id="inputWord" placeholder="Contraseña">
            <div id="buttons">
            <input class = "myButton" type="submit" name="login" value="Entrar">
            </div>
            </div>
        </form>

        

    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>