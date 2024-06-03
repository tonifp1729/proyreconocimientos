<?php

require_once 'db.php';

class NuevoAlumno {
    private $conexion;

    public function __construct() {
        //Creamos un objeto e inicializamos la conexión a la base de datos
        $db = new Conexiondb();
        $this->conexion = $db->conexion;
    }

    public function insertarAlumno($nombre, $correo, $contrasena, $web) {
        //Cifrar la contraseña antes de almacenarla
        $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

        //Consulta SQL para insertar al nuevo alumno en la bd
        $SQL = "INSERT INTO alumno (nombre, correo, contrasenia, webReconocimiento) VALUES (?, ?, ?, ?);";
        
        //Preparamos la consulta
        $consulta = $this->conexion->prepare($SQL);
        
        //Vinculamos los parámetros a la consulta
        $consulta->bind_param("ssss", $nombre, $correo, $hashed_password, $web);
        
        //Ejecutamos la consulta
        $consulta->execute();
        
        //Cerramos la consulta
        $consulta->close();
    }
}

?>
