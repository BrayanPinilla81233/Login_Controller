<?php 
    //se incluye la conexion
    include "Conexion.php";
    //Crea la clase Auth y extiende la conexion de mysql
    class Auth extends Conexion {
        //Crea la funcion de registrar que recibe los paramatros del
        // usuario y la contraseña para registrarlos en la base de datos
        public function registrar($usuario, $password) {
            //Llama a la conexion
            $conexion = parent::conectar();
            //Ejecuta el sql para registrar los datos en la tabla
            $sql = "INSERT INTO t_usuarios (usuario, password) 
                    VALUES (?,?)";
            $query = $conexion->prepare($sql);
            //Utiliza una funcion bind_param que le recibe dos parametros
            //de tipo String
            $query->bind_param('ss', $usuario, $password);
            //Returna la query
            return $query->execute();
        }
        //Crea la funcion de logear que es donde valida si los parametros
        //existen en la base de datos
        public function logear($usuario, $password) {
            //Llama a la conexion
            $conexion = parent::conectar();
            $passwordExistente = "";
            //Ejecuta el sql para consultar entre los registros de la base
            //de datos si existe un usuario con en nombre de usuario que se
            // esta registrando en el login
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario'";
            $respuesta = mysqli_query($conexion, $sql);
            //
            if (mysqli_num_rows($respuesta) > 0) {
                $passwordExistente = mysqli_fetch_array($respuesta);
                $passwordExistente = $passwordExistente['password'];
                //la funcion password_verify recibe dos parametros el
                //primero es la variable del password y el otro es la
                //passwordExistente, por eso es que se creo una variable
                //vacia para luego utilizarla
                if (password_verify($password, $passwordExistente)) {
                    //si el usuario existe se returna como verdadero
                    $_SESSION['usuario'] = $usuario;
                    return true;
                } else {
                    //si el usuario no existe se returna como falso
                    return false;
                }
            } else {
                return false;
            }
        }   
    }

?>