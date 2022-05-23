<?php
use App\Models\User;

session_start();
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array(
        'username' => '',
        'passwrd' => ''
    );
}

if (isset($_POST['login'])) {
    $user = new User();
    $user_data= $user->getByName($_POST['username']);
    if (!empty($user_data)) {
        foreach ($user_data as $value) {
            $_SESSION['user']["username"] = $value["username"];
            $_SESSION['user']["passwrd"] = $value["passwrd"];
        }
    }
    //header('location:' . DIRBASEURL . '/wordsearch');
}

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
// var_dump("Tamaño=> " . count($data) . "<br>");

//Carga datos del usuario actual
// if (empty($data[0])) {
//     $_SESSION['user']["username"] = "";
//     $_SESSION['user']["passwrd"] = "";
// } else {
//     foreach ($data[0] as $key => $value) {
//         $_SESSION['user']["username"] = $value["username"];
//         $_SESSION['user']["passwrd"] = $value["passwrd"];
//     }
// }

var_dump($_SESSION['user']);
?>

<body>
    <?php
    //Vista sin login. data[0] contiene los datos de usuario
    if ($_SESSION['user']["username"] == "") {
    ?>
        <form id="form-login" action="" method="post">
            <input class="myInput" type="text" name="username" id="inputWord" placeholder="Nombre de usuario" value="admin">
            <input class="myInput" type="text" name="password" id="inputWord" placeholder="Contraseña" value="admin">
            <div id="buttons">
                <input class="myButton" type="submit" name="login" value="Entrar">
            </div>
        </form>
        <hr>
    <?php
    }
    ?>
    <main>
        <br>
        <h3>Cuatro últimas capitales</h3>
        <br>

        <form action="" method="post">
            <input class="myInput" type="text" name="inputWord" id="inputWord" placeholder="Busca una capital">
            <input class="myButton" type="submit" name="search" value="Buscar">
            <?php
            //Muestra botón añadir solo con admin
            if  ($_SESSION['user']["username"] == "admin") {
                    echo "<input class=\"myButton\" type=\"submit\" name=\"add\" value=\"Añadir\"><br><br>";
            }

            ?>
        </form>


        <?php
        //Acceso sin login
        if ($_SESSION['user']["username"] == "") {
            if (!empty($data)) {
                //Muestra los registros de la bd
                echo "<div id='containerNoLogin'>";
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
        } else { //Acceso con login
            if ($_SESSION['user']["username"] != "") {
                //Muestra los registros de la bd
                echo "<div id=\"auth\">
                <span id=\"img\" class=\"material-symbols-outlined\">
                account_circle_full
                </span>
                <div>" . $_SESSION['user']['username'] . "</div>
                <div>
                <a href='logout.php'>Cerrar sesión</a></div>
                </div>";
                echo "<div id='container'>";
                foreach ($data[1] as $value) {
                    echo "<div class='capital'>";
                    echo "<p class='name'>" . $value["word"] . " </p><a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/delete/" . $value["id"] . "/" . $value["word"]  . "'>Eliminar</a> <a href='/repasoJunio/ra3/db/wordsearchV2/public/index.php/wordsearch/edit/" . $value["id"] . "/" . $value["word"] . "'>Editar</a> </br>";
                    echo "</div>";
                    echo ('<br>');
                }
                echo "</div>";
            } else {
                echo "<div id='msg' >No hay ningún registro en la tabla</div>";
            }
        }


        ?>
    </main>
</body>

<?php
include("require/view_footer.html");
?>

</html>