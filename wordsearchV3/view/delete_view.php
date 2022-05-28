<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Ejercicio Sopa de Letras</title>
</head>
<?php
include("require/view_go_home.php");
include("require/view_header.php");
$css = file_get_contents("../view/css/style_view.css");
echo "<style>$css</style>";
include("require/view_auth.php");
?>

<body>

    <main>

        <h2>Elimina una palabra.</h2>
        <form method="post">
            <!--urldecode():Decodes any %## encoding in the given string. Plus symbols ('+') are decoded to a space character.-->
            <!--prev() - moves the internal pointer to, and outputs, the previous element in the array-->
            <input readonly class="myInput" type="text" name="selectedWord" value="¿Deseas eliminar <?php echo urldecode(current($data)); ?> ?">
            <input class="myButton" type="submit" name="delete" value="Eliminar" >

        </form>

    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>