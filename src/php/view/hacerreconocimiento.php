<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reconociendo</title>
        <link rel="stylesheet" href="src/css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h2>Nuevo reconocimiento a un compañero</h2>
            <form action="index.php?controlador=creconocimientos&action=hacerReconocimiento" method="post">
                <label for="momento">Momento:</label>
                <input type="text" id="momento" name="momento" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
                
                <label for="alumnorecibe">Alumno que recibe:</label>
                <select id="alumnorecibe" name="alumnorecibe" required>
                    <option value="">--Marca un compañero--</option>
                    <?php
                        foreach ($datosVista['data']['alumnos'] as $alumno) {
                            echo '<option value="'.$alumno['idAlumno'].'">'.$alumno['nombre'].'</option>';
                        }
                    ?>
                </select>
                <?php
                    if (isset($datosVista['error'])) {
                        if ($datosVista['error'] == 'faltan_credenciales') {
                            echo "<p class='error'>Faltan credenciales. Por favor, completa todos los campos.</p>";
                        }
                    }
                ?>
                <input type="submit" value="Enviar reconocimiento">
            </form>
            <a href="index.php?controlador=cisesion&action=irindice">Volver</a>
        </div>
    </body>
</html>
