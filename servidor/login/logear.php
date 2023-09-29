<?php 
    //esta variable es para luego validarla
    //como la sesion del usario
    session_start();
    //Se incluye el controlador que es el mismo
    //clases para que se pueda ejectuar la 
    //funcion de logear
    include "../../clases/Auth.php";
    //se validan los dos parametros
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Se instancia la clase
    $Auth = new Auth();
    //Si la valiidacion es exitosa se redirigira
    //al panel de incio
    if ($Auth->logear($usuario, $password)) {
        header("location:../../inicio.php");
    } else {
        //Se ejecutara la alerta
        echo "
        <script>
        alert('No se puedo logear, verifique');
        window.location.href='../../index.php';
        </script>";
    }

?>