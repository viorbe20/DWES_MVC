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
    <h2>Elimina la capital</h2>
    <form action="" method="post">
        <?php
        echo('<br>'. $_POST["value"]) ;
        ?>
        <input type="submit" name="home" value="Volver"><br><br>
        <input type="text" name="inputEditedWord" placeholder="Introduce una capital">
        <input type="submit" name="addEditedWord" value="Modificar">
    </form>
</body>

</html>