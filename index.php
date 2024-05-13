<!-- Este es el controlador principal de la aplicación -->
<?php

    //Comprueba la acción que se desea realizar y la ejecuta
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
                    $isesion = new InicioSesion($correo, $contrasena);

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
            case 'reg':
                //Redirecciona a la página para hacer el registro de usuario
                //AQUÍ VAMOS A PONER LO CORRESPONDIENTE AL MODELO DE REGISTRO
                exit;
                break;
            default:
                //Mensaje en caso de error al lanzar una acción que e ha recibido con el método POST
                echo "Acción especial desconocida";
                break;
        }
    } else if (isset($_GET['a'])) {
        $accion = $_GET['a'];
        switch ($accion) {
            case 'ver':
                //Redirecciona a la página para ver los reconocimientos recibidos
                header("Location: src/php/view/listareconocimientos.php");
                exit; //IMPORTANTE Hay que asegurarse de salir del script de PHP después de redireccionar
                break;
            case 'hacer':
                //Redirecciona a la página para hacer nuevos reconocimientos
                header("Location: src/php/view/hacerreconocimiento.php");
                exit;
                break;
            case 'irreg':
                //Redirecciona a la página para hacer nuevos reconocimientos
                header("Location: src/php/view/registro.php");
                exit;
                break;
            default:
                //Mensaje en caso de error al lanzar una acción (que llegue un valor nulo o no coincidente)
                echo "Acción desconocida";
                break;
        }
    } else {
        //Si no existe acción (el parámetro "a"), redirigirá a la primera vista de la aplicación (ventana de inicio de sesión)
        header("Location: src/php/view/forminiciosesion.php");
        exit;
    }

?>