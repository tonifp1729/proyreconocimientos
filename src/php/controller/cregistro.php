<?php

    require_once 'C:\xampp\htdocs\proyreconocimientos\src\php\model\nuevoalumno.php';

    class Controladorcregistro {
        public $view;
        private $registrar;

        public function __construct() {
            $this->registrar = new NuevoAlumno();
        }

        public function registro() {

            //Verificamos que se hayan recibido las credenciales
            if (!empty($_POST['correo']) && !empty($_POST['contrasena'])) {

                $correo = $_POST['correo'];
                $contrasena = $_POST['contrasena'];

                //Comprueba que el correo introducido sea correcto (el de el alumnado de la fundacion)
                if (strpos($correo, '@alumnado.fundacionloyola.net') === false) {
                    // Redirigir al formulario de registro con un mensaje de error si el correo no tiene el dominio correcto
                    header("Location: ../view/registro.php?error=dominio_invalido");
                    exit;
                }

                //Comprueba que el '@' aparezca solo una vez en el correo
                if (substr_count($correo, '@') !== 1) {
                    // Redirigir al formulario de registro con un mensaje de error si el correo tiene más de un '@'
                    header("Location: ../view/registro.php?error=correo_invalido");
                    exit;
                }

                //Crea una instancia del modelo de registro de usuario
                $registro = new NuevoAlumno($this->conexion);

                //Verificar las credenciales utilizando el método del modelo
                $nAlumno = $registro->buscarAlumno($correo, $contrasena);

            } else {
                //Redirigir al formulario de registro con un mensaje de error si faltan credenciales
                header("Location: ../view/registro.php?error=faltan_credenciales");
                exit;
            }
        }

            
        public function irregistro() {
            $this->view = "registro";
        }
    }
?>