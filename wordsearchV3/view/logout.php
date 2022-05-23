<?php
    session_start();
    //Vaciamos todas las posibles variables que puedan tener valor
    unset($_SESSION['user']);
    //Cierre de sesión
    session_destroy();
    //Dirigimos a la página principal
    header('location:' . DIRBASEURL . "/wordsearch");
?>
