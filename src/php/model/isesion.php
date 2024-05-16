<?php

    require_once '../../config/config.php';

    class InicioSesion {
        private $conexion;

        public function __construct() {
            $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        }

        public function identificacion($correo, $contrasena) {
            
            //Consulta SQL para verificar las credenciales del usuario
            $SQL = "SELECT idAlumno, nombre FROM alumno WHERE correo = ? AND contrasenia = ?";
            
            //Preparar la consulta
            $consulta = $this->conexion->prepare($SQL);
            
            //Vinculamos los parámetros a la consulta
            $consulta->bind_param("ss", $correo, $contrasena);
            
            //Ejecutar la consulta
            $consulta->execute();
            
            //Obtener el resultado de la consulta
            $resultado = $consulta->get_result();

            //Comprueba si se encontró una fila correspondiente a las credenciales proporcionadas
            if ($resultado->num_rows == 1) {
                //Obtenemos el id del alumno si las credenciales son correctas
                $alumno = $resultado->fetch_assoc();
                return $alumno;
            } else {
                //Devolvemos false si las credenciales son incorrectas
                return false;
            }

            //Cerramos la consulta
            $consulta->close();
        }
    }

?>