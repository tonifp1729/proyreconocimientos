<?php
    require_once '../../config/config.php';

    //Conexión con la base de datos. Ahora solo debo utilizar esta variable $conexion cada vez que requiera de la misma.
    $conexion = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>