<?php 

require_once 'C:\xampp\htdocs\proyreconocimientos\src\config\config.php';

    class Conexiondb {
        private $host;
        private $user;
        private $pass;
        private $db;
        public $conexion;

        public function __construct() {		

            $this->host = constant('DB_HOST');
            $this->user = constant('DB_USER');
            $this->pass = constant('DB_PASS');
            $this->db = constant('DB_NAME');

            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db);

        }
    }

?>