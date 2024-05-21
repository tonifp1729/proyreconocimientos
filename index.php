<!-- ESTE ES EL CONTROLADOR PRINCIPAL DE LA APLICACIÓN -->
<?php

    require_once 'src/config/config.php';
    require_once 'src/php/model/db.php';

    if(!isset($_GET["controlador"])) $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
    if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

    $rutaControlador = 'src/php/controlador/'.$_GET["controlador"].'.php';

    //Comprueba que exista un controlador
    if(!file_exists($rutaControlador)) $rutaControlador = 'src/php/controller/'.constant("DEFAULT_CONTROLLER").'.php';

    //Cargamos el controlador
    require_once $rutaControlador;
    $controladorNombre = 'Controlador'.$_GET["controlador"];
    $controlador = new $controladorNombre();

    //Comprobamos que se halla definido el método
    $datosVista["data"] = array();
    if(method_exists($controlador,$_GET["action"])) $datosVista["data"] = $controlador->{$_GET["action"]}();

    //Cargamos las vistas
    require_once 'src/php/view/'.$controlador->view.'.php';

?>