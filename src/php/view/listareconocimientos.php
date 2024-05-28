<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reconociendo</title>
        <link rel="stylesheet" href="src\css\estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <div id="recs">
                <?php
                    if(isset($datosVista['data']['reconocimientos']) && !empty($datosVista['data']['reconocimientos'])) {
                        $contador=1;
                        foreach($datosVista['data']['reconocimientos'] as $reconocimiento) {
                            echo '<a href="index.php?controlador=creconocimiento&action=mostrarReconocimiento&idReconocimiento=' . $reconocimiento . '">Reconocimiento #' . $contador++ . '</a><br>';
                        }
                    } else {
                        echo '<p>No tienes reconocimientos.</p>';
                    }
                ?>
            </div>
            <a href="index.php?controlador=cregistro&action=irhacer">Hacer reconocimientos</a>
        </div>
    </body>
</html>