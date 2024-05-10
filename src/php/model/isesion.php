<?php
    require_once 'C:\xampp\htdocs\proyreconocimientos\src\service\queries\consultas.php';
    require_once 'C:\xampp\htdocs\proyreconocimientos\src\service\config\conexiondb.php';

    class InicioSesion {

        public function __construct($conexion) {
            $this->conexion = $conexion;
            $this->credencialesISesion = Consultas::CREDENCIALES_I_SESION;
        }

        public function identificacion($correo, $contrasena) {            
            //Preparar la declaración de la consulta
            $consulta = $this->conexion->prepare($this->credencialesISesion);
            
            //Vincular parámetros
            $consulta->bind_param("ss", $correo, $contrasena);
            
            //Ejecutamos la consulta
            $consulta->execute();
            
            //Obtenemos el resultado de la consulta y lo introducimos en una variable para disponer fácilmente de este para su uso
            $resultado = $consulta->get_result();

            //Comprueba si se ha encontrado la fila que corresponde a la información introcucida por el usuario
            if ($resultado->num_rows == 1) {
                //Devuelve la información del usuario debido a que se han dado unas credenciales correctas
                $usuario = $resultado->fetch_assoc();
                return $usuario;
            } else {
                //Devuelve falso en caso de que las credenciales de usuario sean incorrectas
                return false;
            }

            //Cerramos la conexión a la base de datos
            $consulta->close();
        }
    }
?>