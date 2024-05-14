<!-- Aquí definimos las constantes que guardarán todas las consultas que 
emplearemos como consultas preparadas en toda la aplicación -->

<?php
    class Consultas {
        //Consulta para verificar las credenciales de usuario para el inicio de sesión
        public static function consultaCredencialesISesion() {
            return "SELECT idAlumno, nombre FROM alumno WHERE correo = ? AND contrasenia = ?";
        }
        
        //Añade más métodos para obtener consultas por aquí. Especifica para qué se utilizarán
    }
?>