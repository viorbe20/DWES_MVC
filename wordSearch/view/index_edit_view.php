<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel='stylesheet' type='text/css' href='css/style.css' />
    <title>Edita la capital</title>
</head>

<body>
    <h2>Edita la capital</h2>
    <?php
    $url = explode("/", $_SERVER["REQUEST_URI"]);
    $id = end($url);

    foreach ($data as $value) {
        if ($value["id"] == $id) {
            $selectedWord = $value["word"];
        }
    }

    ?>
    <form action="" method="post">
        <input type="submit" name="home" value="Volver"><br><br>
        <input type="text" name="inputEditedWord" value=<?php echo $selectedWord?>>
        <input type="submit" name="addEditedWord" value="Modificar">
    </form>
</body>

</html>