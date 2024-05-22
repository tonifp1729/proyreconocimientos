<?php

    require_once 'C:\xampp\htdocs\proyreconocimientos\src\php\model\isesion.php';

    class Controladorcisesion {

        public $view;
        private $isesion;

        public function __construct() {
            $this->isesion = new InicioSesion();
        }

        public function identificacion() {
            //Verificarmos que se han recibido las credenciales a través de POST
            if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {
                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];
                
                //Comprobamos las credenciales utilizando el método en el modelo
                $alumno = $this->isesion->identificacion($correo, $contrasena);
    
                if (!empty($alumno)) {
                    //Inicia sesión y redirige al índice si las credenciales son correctas
                    session_start();
                    $_SESSION['id'] = $alumno['idAlumno'];
                    $_SESSION['nombre'] = $alumno['nombre'];
                    $this->irindice(); //PASAMOS LA INFORMACION DE LA SIGUIENTE VISTA. Este es el modo de usar un método de la propia clase
                } else {
                    //Redirige al formulario de inicio de sesión con un mensaje de error si las credenciales son incorrectas
                    header("Location: src/php/view/forminiciosesion.php?error=credenciales_invalidas");
                    exit;
                }
            } else {
                // Redirigir al formulario de inicio de sesión con un mensaje de error si faltan credenciales
                header("Location: src/php/view/forminiciosesion.php?error=faltan_credenciales");
                exit;
            }
        }

        public function irindice() {
            $this->view = "indice";
        }

        public function irsesion() {
            $this->view = "forminiciosesion";
        }
    }

?>