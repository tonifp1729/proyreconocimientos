<!-- ESTE ES EL CONTROLADOR PRINCIPAL DE LA APLICACIÓN -->
<?php

    require_once 'src/config/config.php';

    if(!isset($_GET["controlador"])) $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
    if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

    $rutaControlador = 'src/php/controller/'.$_GET["controlador"].'.php';
    echo ' 1 - Ruta del controlador: ' . $rutaControlador;

    //Comprueba que exista un controlador
    if(!file_exists($rutaControlador)) $rutaControlador = 'src/php/controller/'.constant("DEFAULT_CONTROLLER").'.php';
    echo '<br>2 - Ruta del controlador: ' . $rutaControlador;

    //Cargamos el controlador
    require_once $rutaControlador;
    $controladorNombre = 'Controlador'.$_GET["controlador"];
    $controlador = new $controladorNombre();
    echo '<br>3 - Ruta del controlador: ' . $rutaControlador;

    //Comprobamos que se halla definido el método solicitado y lo llama
    $datosVista["data"] = array();
    if(method_exists($controlador,$_GET["action"])) $datosVista["data"] = $controlador->{$_GET["action"]}();

    //Obtenemos el error que puede recibirse desde el controlador para utilizarlo en la vista de ser necesario
    $error = isset($datosVista["data"]["error"]) ? $datosVista["data"]["error"] : null;

    //Cargamos las vistas
    require_once 'src/php/view/'.$controlador->view.'.php';
    echo 'src/php/view/'.$controlador->view.'.php';

?>