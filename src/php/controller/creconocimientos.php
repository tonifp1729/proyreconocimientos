<?php

    require_once '/home/proyectosevg/public_html/2daw00/reconocimientos/src/php/model/reconocimientos.php';

    class Controladorcreconocimientos {

        public $view;
        private $reconocimientos;

        public function __construct() {
            $this->reconocimientos = new Reconocimientos();
            $this->verificarSesion();
        }

        public function listarReconocimientos() {
            //Inicia la sesión desde el controlador de inicio de sesión y se le da continuidad en el resto de controladores de este modo.
            //Si no hay una sesión presente, la inicia.
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $idAlumno = $_SESSION['id'];
            
            //Obtenemos los reconocimientos del modelo
            $reconocimientos = $this->reconocimientos->listarReconocimientos($idAlumno);
            
            //Pasamos los datos a la vista
            $this->irlista();
            return ['reconocimientos' => $reconocimientos];
        }

        public function mostrarReconocimiento() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        
            $idReconocimiento = $_GET['idReconocimiento'];
            $reconocimiento = $this->reconocimientos->mostrarReconocimiento($idReconocimiento);
            
            //Pasamos los datos a la vista
            $this->irver();
            return ['reconocimiento' => $reconocimiento, 'num' => $_GET['num']];
            
        }

        /*
          * El método del controlador que se ejecuta cuando enviamos los datos del formulario de reconocimiento.
          * Comprueba que se haya recibido el POST, introduce la información en variables para su manejo y realiza las validaciones necesarias para tratar los reconocimientos.
         **/
        public function hacerReconocimiento() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    
            $error = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $idAlumnoEnvia = $_SESSION['id'];
                $momento = $_POST['momento'];
                $descripcion = $_POST['descripcion'];
                $idAlumnoRecibe = $_POST['alumnorecibe'];
    
                if (!empty($momento) && !empty($descripcion) && !empty($idAlumnoRecibe) && !empty($idAlumnoEnvia)) {
                    $this->reconocimientos->hacerReconocimiento($momento, $descripcion, $idAlumnoRecibe, $idAlumnoEnvia);
                    $this->view = "recexitoso";
                    $this->ultimoReconocimiento($idAlumnoRecibe);
                } else {
                    $error = 'faltan_credenciales';
                    $this->irhacer();
                }
            } else {
                $this->irhacer();
            }
    
            return ['error' => $error];
        }

        /*
          * Este método se ejecuta en cuanto se ha validado un reconocimiento.
          * Crea o modifica la cookie en la que guardamos el nombre del último compañero sobre el que se ha realizado un reconocimiento.
         **/
        public function ultimoReconocimiento($idAlumnoRecibe) {
            $compi = $this->reconocimientos->nombreCompi($idAlumnoRecibe);
            setcookie("compi", $compi,time() + 3600);
        }

        public function irindice() {
            $this->view = "indice";
        }

        public function irlista() {
            $this->view = "listareconocimientos";
        }

        public function irhacer() {
            //No solo se encarga del direccionamiento sino que carga el listado de alumnos al cargar la vista
            $alumnos = $this->reconocimientos->listarAlumnos();
            $this->view = "hacerreconocimiento";

            return ['alumnos' => $alumnos];
        }

        public function irver() {
            $this->view = "verreconocimiento";
        }

        /*
          * Este método se ejecuta en cuanto se utiliza este controlador para comprobar la existencia de la variable de sesión.
          * Si la variable de sesión no existe te redirige a la vista de inicio de sesión.
         **/
        private function verificarSesion() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            //Verificamos que el usuario está iniciado
            if (!isset($_SESSION['id'])) {
                //Redirigimos a la página de inicio de sesión en caso de que no exista la sesión
                header('Location: index.php');
                exit(); //Detenemos la ejecución para evitar posibles fallos.
            }
        }

    }

?>