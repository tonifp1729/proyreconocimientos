<!-- Este es el controlador principal de la aplicación -->
<?php
    // require_once '../src/php/model/isesion.php';

    class Controlador {
        
        //Redirecciona a la página de inicio de sesión para ver los reconocimientos recibidos
        public function verReconocimientos() {
            header("Location: ../php/view/isesionver.php");
            exit; //IMPORTANTE Hay que asegurarse de salir del script de PHP después de redireccionar
        }

        //Redirecciona a la página de inicio de sesión de reconocimientos
        public function hacerReconocimientos() {
            header("Location: ../php/view/isesionhacer.php");
            exit;
        }
    }

    //Instanciamos el controlador
    $controlador = new Controlador();

    // Verifica la acción y llama al método correspondiente
    if (isset($_GET['a'])) {
        $accion = $_GET['a'];
        switch ($accion) {
            case 'ver':
                $controlador->verReconocimientos();
                break;
            case 'hacer':
                $controlador->hacerReconocimientos();
                break;
            default:
                // Acción desconocida, mostrar un mensaje de error o redireccionar a una página de error
                echo "Acción desconocida";
                break;
        }
    }
?>