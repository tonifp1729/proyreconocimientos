<!-- Este es el modelo de inicio de sesión -->
<?php
    
    require_once 'conexiondb.php';
    
    class InicioSesion {
        private $conexion;
    
        public function __construct($conexion, $correo, $contrasena) {
            $this->conexion = $conexion;
        }
    
        public function identificacion($correo, $contrasena) {
    
            //Consulta SQL para obtener al alumno que trata de realizar el inicio de sesión
            $sql = "SELECT idAlumno FROM alumno WHERE correo = ? AND contrasenia = ?";
            $consulta = $this->conexion->prepare($sql);
    
            //Vinculamos los parámetros con la consulta previamente preparada
            $consulta->bind_param("ss", $correo, $contrasena);
    
            //Ejecutamos la consulta
            $consulta->execute();
    
            //Obtenemos el resultado de la misma y lo guardamos en una variable para su utilización
            $resultado = $consulta->get_result();
    
            //Verificamos que se haya encontrado el alumno con las credenciales proporcionadas
            if ($resultado->num_rows == 1) {
                $alumno = $resultado->fetch_assoc();
                return $alumno['idAlumno'];
            } else {
                return false; //Devuelve falso en caso de que las credenciales de usuario sean incorrectas
            }
    
            // Cerrar la consulta
            $consulta->close();
        }
    }
?>