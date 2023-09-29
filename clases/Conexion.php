<?php
    //Se crea una clase con el nombre de la conexion
    //Esta contiene la conexion con mysql
    class Conexion {
        public $servidor = 'localhost';
        public $usuario = 'root';
        public $password = '';
        public $database = 'login';
        public $port = 3306;

        public function conectar() {
            return mysqli_connect(
                $this->servidor,
                $this->usuario,
                $this->password,
                $this->database,
                $this->port
            );
        }
    }

?>