<?php

    require_once 'conexiondb.php';

    class NuevoAlumno {
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function buscarAlumno($correo, $contrasena) {
            
            //Consulta SQL para verificar las credenciales del usuario
            $SQL = "SELECT idAlumno FROM alumno WHERE correo = ?";
            
            //Preparar la consulta
            $consulta = $this->conexion->prepare($SQL);
            
            //Vinculamos los parámetros a la consulta
            $consulta->bind_param("ss", $correo, $contrasena);
            
            //Ejecutamos la consulta
            $consulta->execute();
            
            //Obtener el resultado de la consulta
            $resultado = $consulta->get_result();

            //Comprueba si se encontró una fila correspondiente a las credenciales proporcionadas
            if ($resultado->num_rows == 1) {
                //Obtenemos el id del alumno si las credenciales ya estaban presentes en la bd
                $existe = true;
            } else {
                //Devolvemos false si las credenciales son incorrectas
                $existe = false;
            }
            //Cerramos la consulta
            $consulta->close();

            if ($existe === true) {
                
            }
        }
    }

?>