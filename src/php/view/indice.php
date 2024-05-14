<?php
    //Inicia la sesión desde el modelo y se le da continuidad al comienzo de cada página de este modo.
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienvenido a la Aplicación de Feedback</title>
        <link rel="stylesheet" href="../../css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h1>Bienvenido a la app de feedback positivo</h1>
            <p>Esta aplicación te permite dar y recibir feedback de tus compañeros de clase.</p>
            <p>Podrás ver los reconocimientos que has recibido y hacer reconocimientos a tus compañeros.</p>
            <p>¡Comienza ahora mismo!</p>
            <a href="../../../index.php?a=ver">Ver reconocimientos</a> | <a href="../../../index.php?a=hacer">Hacer reconocimientos</a>
        </div>
    </body>
</html>