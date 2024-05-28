<?php

    require_once 'src\php\model\db.php';

    class Reconocimientos {
        private $conexion;

        public function __construct() {
            //Creamos un objeto e inicializamos la conexión a la base de datos
            $db = new Conexiondb();
            $this->conexion = $db->conexion;
        }

        public function listarReconocimientos($idAlumno) {
            $SQL = "SELECT idReconocimiento FROM reconocimiento WHERE idAlumRecibe = ?";
            $consulta = $this->conexion->prepare($SQL);
            $consulta->bind_param("i", $idAlumno);
            $consulta->execute();
            $resultado = $consulta->get_result();
    
            $reconocimientos = [];
            while ($reconocimiento = $resultado->fetch_assoc()) {
                $reconocimientos[] = $reconocimiento['idReconocimiento'];
            }
    
            $consulta->close();
            return $reconocimientos;
        }

        public function mostrarReconocimiento($idReconocimiento) {

        }

        public function hacerReconocimiento($id, $idAlumnoRecibe) {

        }

    }

?>