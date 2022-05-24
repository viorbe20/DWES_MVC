<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Virginia Ordoño Bernier'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Wordsearch Template</title>
</head>
    <!--Muestra la información del perfil que está conectado-->
    <div id="auth">
        <section id="s1">
            <span id="img" class="material-symbols-outlined">
                account_circle_full
            </span>
            <div><?php echo strtoupper($_SESSION['user']['profile'])?></div>
        </section>
        
        <section id="s2">
            <a id="icon-logout" href='" . DIRBASEURL . "/wordsearch/logout'><span class="material-symbols-outlined">logout</span><label>Salir</label></a>
        </section>
    </div>
</html>
