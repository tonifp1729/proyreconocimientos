<!-- Aquí definimos las constantes que guardarán todas las consultas que 
emplearemos como consultas preparadas en toda la aplicación -->

<?php
    class Consultas {
        //Consulta para verificar las credenciales de usuario para el inicio de sesión
        public static const CREDENCIALES_I_SESION = "SELECT idAlumno, nombre FROM alumno WHERE correo = ? AND contrasena = ?";
        
        //Añade más consultas por aquí. Especifica para qué se utilizarán
    }
?>
