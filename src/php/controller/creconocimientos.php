<?php

    require_once 'src\php\model\reconocimientos.php';

    class Controladorcreconocimientos {

        public $view;
        private $reconocimientos;

        public function __construct() {
            $this->reconocimientos = new Reconocimientos();
        }

        public function listarReconocimientos() {
            //Inicia la sesión desde el controlador de inicio de sesión y se le da continuidad en el resto de controladores de este modo.
            //Si no hay una sesión presente, la inicia.
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $idAlumno = $_SESSION['id'];
            
            // Obtener los reconocimientos del modelo
            $reconocimientos = $this->reconocimientos->listarReconocimientos($idAlumno);
            
            // Pasar los datos a la vista
            $this->irlista();
            return ['reconocimientos' => $reconocimientos];
        }

        public function mostrarReconocimiento() {
            
        }

        public function hacerReconocimiento() {
            
        }

        public function irindice() {
            $this->view = "indice";
        }

        public function irlista() {
            $this->view = "listareconocimientos";
        }

        public function irhacer() {
            $this->view = "hacerreconocimiento";
        }

        public function irver() {
            $this->view = "verreconocimiento";
        }
    }

?>