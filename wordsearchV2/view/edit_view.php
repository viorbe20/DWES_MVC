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

        <h2>Edita una palabra</h2>
        <form method="post">
            <!--urldecode():Decodes any %## encoding in the given string. Plus symbols ('+') are decoded to a space character.-->
            <!--current() - returns the value of the current element in an array. $data[0] in this case-->
            <input class = "myInput" type="text" name="editedWord" value="<?php echo urldecode(current($data)); ?>">
            <input class = "myButton" type="submit" value="Editar" name="editWord">

        </form>

    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>