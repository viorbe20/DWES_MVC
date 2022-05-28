<?php

?>
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
include("require/view_header.html");
$css = file_get_contents("../view/css/style_view.css");
echo "<style>$css</style>";
//var_dump($_SESSION['user']['profile']);
$DateAndTime = date('d-m-Y, h:i', time());
?>

<body>
    <!--Muestra la información del perfil que está conectado-->
    <div id="auth">
        <div id="auth1">
            <section id="s1">
                <span id="img" class="material-symbols-outlined">
                    account_circle_full
                </span>
                <div><?php echo strtoupper($_SESSION['user']['profile']) ?></div>
            </section>

            <section id="s2">
            <a id="icon-logout" href="<?php echo DIRBASEURL . '/wordsearch/logout'?>"><span class="material-symbols-outlined">logout</span><label>Salir</label></a>
            </section>
        </div>
        <div>
            <p>Hoy es <?php echo $DateAndTime?></p>
        </div>
    </div>

    <?php
    //Fomulario login se muestra mientras se está de invitado
    if ($_SESSION['user']['profile'] == "guest") {
    ?>
        <form id="form-login" action="" method="post">
            <input class="myInput" type="text" name="username" id="inputWord" placeholder="Nombre de usuario" value="admin">
            <input class="myInput" type="text" name="passwrd" id="inputWord" placeholder="Contraseña" value="admin">
            <div id="buttons">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
        </form>
        <hr>
    <?php
    }
    ?>
    <main>
        <?php
        ?>
        <br><br>
        <!--Formulario de búsqueda se muestra siempre-->
        <form action="" method="post">
            <input class="myInput" type="text" name="inputWord" id="inputWord" placeholder="Busca una capital">
            <input class="myButton" type="submit" name="search" value="Buscar">
            <?php
            //Muestra botón añadir solo con admin
            if ($_SESSION['user']["profile"] == "admin") {
                ?>
                <a class="myButton" href="<?php echo DIRBASEURL . '/wordsearch/add'?>"><label>Añadir</label></a>
                <?php
                
                //echo "<input class=\"myButton\" type=\"submit\" name=\"add\" value=\"Añadir\"><br><br>";
            //"<a id="icon-logout" href="<?php echo DIRBASEURL . '/wordsearch/logout'/><label>Salir</label></a>

            }

            ?>
        </form>

        <?php

        ?>


        <?php
        //Vista capitales con perfil invitado
        if (($_SESSION['user']["username"] == "guest")) {
            if (!empty($data[1])) {
                //Muestra los registros de la bd
                echo "<br>
                <h3>Cuatro últimas capitales</h3>
                <br>
                <div id='containerNoLogin'>";
                foreach ($data[1] as $value) {
                    echo "<div class='capital'>";
                    echo "<p class='name'>" . $value["word"] . "</br>";
                    echo "</div>";
                    echo ('<br>');
                }
                echo "</div>";
            } else {
                echo "<div id='msg'>No hay ningún registro en la tabla</div>";
            }
        } else { //Vista capitales con perfil admin
            if (!empty($data[1])) {
                echo "<br>
                <h3>Cuatro últimas capitales</h3>
                <br>
                <div id='container'>";
                foreach ($data[1] as $value) {
                    echo "<div class='capital'>";
                    //echo "<p class='name'>" . $value["word"] . " </p><a href='/repasoJunio/ra3/db/wordsearchV3/public/index.php/wordsearch/delete/" . $value["id"] . "/" . $value["word"]  . "'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordsearchV3/public/index.php/wordsearch/edit/" . $value["id"] . "/" . $value["word"] . "'>Editar</a> </br>";
                    echo "<p class='name'>" . $value["word"] . " </p><a href='" . DIRBASEURL . "/wordsearch/delete/" . $value["id"] . "/" . $value["word"] . "'>Eliminar</a>  <a href='" . DIRBASEURL . "/wordsearch/edit/" . $value["id"] . "/" . $value["word"] . "'>Editar</a> </br>";
                    echo "</div>";
                    echo ('<br>');
                }
                echo "</div>";
            } else {
                echo "<div id='msg'>No hay ningún registro en la tabla</div>";
            }
        }


        ?>
    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>