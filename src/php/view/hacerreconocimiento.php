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
            <form action="../../../index.php" method="post">
                <label for="momento">Momento:</label>
                <input type="text" id="momento" name="momento" required>

                <label for="descripcion">Descripción:</label>
                <textarea type="text" id="descripcion" name="descripcion" rows="4" required></textarea>
                
                <!-- Esto se genera a partir de la bd, también hay que tomar la id del que envia el reconocimiento a la hora de hacer el envío -->
                <select id="alumnorecibe" name="alumnorecive">
                    <option>--Marca un compañero</option>
                    <option value="1">Antonio</option>
                    <option value="2">Manuel</option>
                    <option value="3">Francisco</option>
                    <option value="4">Ramón</option>
                    <option value="5">Leandro</option>
                </select>
                
                <input type="submit" value="Enviar reconocimiento">
            </form>
        </div>

        <div>
            <form action="../../../index.php" method="get">
                <input type="hidden" name="a" value="ver">
                <input type="submit" value="Ver mis reconocimientos">
            </form>
        </div>
    </body>
</html>