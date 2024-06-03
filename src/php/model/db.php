<?php 

    require_once '/home/proyectosevg/public_html/2daw00/reconocimientos/src/config/config.php';

    class Conexiondb {
        private $host;
        private $user;
        private $pass;
        private $db;
        public $conexion;

        public function __construct() {		
            echo "ESTOY DENTRO DEL CONSTRUCTOR DE DB";
            $this->host = constant('DB_HOST');
            $this->user = constant('DB_USER');
            $this->pass = constant('DB_PASSWORD');
            $this->db = constant('DB_NAME');

            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);

        }
    }


    $obj = new Conexiondb();
?>