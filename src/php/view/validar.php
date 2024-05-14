<?php

    require_once '../controller/cisesion.php';

    //Verificamos que se han recibido los datos desde el formulario
    if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
        // Obtener los datos del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        //Instanciamos el controlador
        $controladorInicioSesion = new ControladorInicioSesion($conexion);

        // Llamar al método identificacion del controlador
        $controladorInicioSesion->identificacion($correo, $contrasena);
    }
?>