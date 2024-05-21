<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
        <link rel="stylesheet" href="src/css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h2>Registro de alumno</h2>
            <form action="validar.php" method="post">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                
                <input type="submit" value="Crear">
            </form>
        </div>

        <?php
            //Comprueba si se han recibido avisos de error y en caso afirmativo muestra el mensaje.
            if(isset($_GET['error'])) {
                $error = $_GET['error'];
                if($error == 'ya_existe') {
                    echo "<p class='error'>El alumno con este correo electrónico ya existe.</p>";
                } elseif($error == 'faltan_credenciales') {
                    echo "<p class='error'>Faltan credenciales. Por favor, completa todos los campos.</p>";
                }
            }
        ?>
        
        <div>
            <form action="../../../index.php" method="get">
                <input type="hidden" name="a" value="iris">
                <input type="submit" value="¿Ya tienes usuario?">
            </form>
        </div>
    </body>
</html>