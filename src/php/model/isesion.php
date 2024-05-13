<?php
    require_once 'consultas.php';
    require_once 'conexiondb.php';

    class InicioSesion {
        private $conexion;

        public function __construct($conexion,$correo, $contrasena) {
            $this->conexion = $conexion;
        }

        public function identificacion($correo, $contrasena) {

            //Traemos la consulta SQL necesaria para el proceso de inicio de sesión
            $SQL = Consultas::consultaCredencialesISesion();
            
            //Preparar la declaración de la consulta
            $consulta = $this->conexion->prepare($SQL);
            
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
                session_start();
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
                //Devuelve falso en caso de que las credenciales de usuario sean incorrectas
                return false;
            }

            //Cerramos la conexión a la base de datos
            $consulta->close();
        }
    }
?>