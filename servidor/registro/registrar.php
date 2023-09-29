<?php
    //Se incluye el controlador que es el mismo
    //clases para que se pueda ejectuar la
    //funcion de logear
    include "../../clases/Auth.php";
    //valida las variables que esten por el metodo POST y se valida
    //la contraseña con una variable
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $Auth = new Auth();
    //Si se genera el $Auth
    //Mostrara la alerta
    if ($Auth->registrar($usuario, $password)) {
        echo "
        <script>
        alert('Usuario registrado de manera exitosa!!!!');
        window.location.href='../../index.php';
        </script>";
    } else {
        //Si no se mostrara la otra alerta
        echo "
        <script>
        alert('No se pudo registrar el usuario, verifique');
        window.location.href='../../index.php';
        </script>";
    }
    
?>