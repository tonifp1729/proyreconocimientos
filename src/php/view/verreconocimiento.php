<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
        <link rel="stylesheet" href="src/css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <?php
                if (isset($datosVista['data']['reconocimiento'])) {
                    $reconocimiento = $datosVista['data']['reconocimiento'];
                    echo '<h1>Reconocimiento #' . $datosVista['data']['num'] . '</h1>';
                }
            ?>
            <label for="momento">Momento:</label>
            <input type="text" id="momento" name="momento" value="<?php echo htmlspecialchars($reconocimiento['momento']); ?>" readonly>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" readonly><?php echo htmlspecialchars($reconocimiento['descripcion']); ?></textarea>
            <a href="index.php?controlador=creconocimientos&action=listarReconocimientos">Ver reconocimientos</a>
        </div>
    </body>
</html>