<?php

    require_once '../../config/configdb.php';

    class NuevoAlumno {
        private $conexion;

        public function __construct() {
            $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
            
            //Obtener el resultado de la consulta
            $resultado = $consulta->get_result();

            //Comprueba si se encontró una fila correspondiente a las credenciales proporcionadas
            if ($resultado->num_rows == 1) {
                //Obtenemos el id del alumno si las credenciales ya estaban presentes en la bd
                
            } else {
                //Devolvemos false si las credenciales son incorrectas
                
            }
            
            //Cerramos la consulta
            $consulta->close();

        }

    }

?>