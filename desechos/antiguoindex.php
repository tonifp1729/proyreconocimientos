<!-- ESTE ES EL ANTERIOR CONTROLADOR DE LA APLICACIÓN QUE PLANTEÉ -->
<?php

    //Comprueba la acción que se desea realizar y la ejecuta
    if (isset($_GET['a'])) {
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
            case 'iris':
                //Redirecciona a inicio de sesión
                header("Location: src/php/view/forminiciosesion.php");
                exit;
                break;
            case 'indice':
                //Redirecciona a la página para hacer nuevos reconocimientos
                header("Location: src/php/view/indice.php");
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