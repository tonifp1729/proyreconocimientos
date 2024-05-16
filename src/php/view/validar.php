<?php

    require_once '../controller/cisesion.php';

    //Verificamos que se han recibido los datos desde el formulario
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Obtener los datos del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        //Instanciamos el controlador
        $controladorInicioSesion = new ControladorInicioSesion();

        // Llamar al método identificacion del controlador
        $controladorInicioSesion->identificacion($correo, $contrasena);
    }

    //Si recibe las credenciales de uasuario y el parámetro de registro de usuario realizará las siguiente acciones
    if (isset($_POST['correo']) && isset($_POST['contrasena'])  && isset($_POST['a'])) {
        
        // Obtener los datos del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        //AQUÍ INSTANCIAREMOS EL CONTROLADOR DEL MODELO DE REGISTRO DE ALUMNO EN LA APLICACIÓN
    }
?>