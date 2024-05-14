<!-- ESTA ES LA ANTERIOR LÓGICA DEL CONTROLADOR DE INICIO DE SESIÓN -->
<?php

    if (isset($_POST['a'])) {
        $accion = $_POST['a'];
        switch ($accion) {
            case 'inse':
                //Verificamos que las credenciales hayan sido recibidas
                if(isset($_POST['correo']) && isset($_POST['contrasena'])) {
                    //Tomamos las credenciales enviadas desde el formulario de inicio de sesión
                    $correo = $_POST['correo'];
                    $contrasena = $_POST['contrasena'];

                    //AQUÍ SE ENCUENTRA MI DUDA <--------------------------------------------------------------------------------
                    //No sabría hacerlo de otro modo teniendo que pasar por el controlador, quiero saber si esta forma es la apropiada
                    require_once 'src/php/model/isesion.php';
                    $isesion = new InicioSesion($conexion ,$correo, $contrasena);

                    if($isesion->identificacion($correo, $contrasena)) {
                        //Si las credenciales introducidas son correctas, nos dirigimos al índice
                        header("Location: src/php/view/indice.php");
                        exit;
                    } else {
                        //Si las credenciales introducidas han sido incorrectas, le devolvemos un mensaje con el error
                        header("Location: src/php/view/forminiciosesion.php?error=credenciales_invalidas");
                        exit;
                    }
                } else {
                    //Si no se encuentran todas las credenciales se envía un parámetro con el error
                    header("Location: src/php/view/forminiciosesion.php?error=faltan_credenciales");
                    exit;
                }
                break;
            default:
                //Mensaje en caso de error al lanzar una acción que e ha recibido con el método POST
                echo "Acción especial desconocida";
                break;
        }
    } 

?>