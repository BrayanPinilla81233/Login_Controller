<?php
    //Se trata de la validacion cuando
    // el usuario desee cerrar la sesion
    //destruya y lo redireccione a la vista
    //de login
    session_start(); 
    session_destroy();
    header("location:../../index.php");
?>