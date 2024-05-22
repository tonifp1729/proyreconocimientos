<?php

    require_once 'C:\xampp\htdocs\proyreconocimientos\src\php\model\db.php';

    class NuevoAlumno {
        private $conexion;

        public function __construct() {
            //Creamos un objeto e inicializamos la conexión a la base de datos
            $db = new Conexiondb();
            $this->conexion = $db->conexion;
        }

        public function insertarAlumno($nombre ,$correo, $contrasena, $web) {
            
            //Consulta SQL para ine
            $SQL = "INSERT INTO alumno (nombre, correo, contrasenia, webReconocimiento) VALUES (?, ?, ?, ?);";
            
            //Preparar la consulta
            $consulta = $this->conexion->prepare($SQL);
            
            //Vinculamos los parámetros a la consulta
            $consulta->bind_param("ssss", $nombre, $correo, $contrasena, $web);
            
            //Ejecutamos la consulta
            $consulta->execute();
            
            //Cerramos la consulta
            $consulta->close();

        }

    }

?>