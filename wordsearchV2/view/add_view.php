<?php
$msg = "";
?>
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

        <h2>Añade una nueva palabra.</h2>
        <form method="post">

            <input class = "myInput" type="text" name="newWord" placeholder="Introduce una capital">
            <input class = "myButton" type="submit" value="Añadir" name="addNewWord">
            <label name="repeatedWord" value=<?php $msg?>></label>

        </form>

    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>