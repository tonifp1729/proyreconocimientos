<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Identifícate</title>
        <link rel="stylesheet" href="../../css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h2>Web de reconocimientos - Escuela Virgen de Guadalupe</h2>
            <form action="../controller/cisesion.php" method="post">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                
                <input type="hidden" name="a" value="inse">
                <input type="submit" value="Iniciar sesión">
            </form>
            
            <?php
                //Comprueba si se han recibido avisos de error y en caso afirmativo muestra el mensaje.
                if(isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if($error == 'credenciales_invalidas') {
                        echo "<p class='error'>Las credenciales introducidas son inválidas.</p>";
                    } elseif($error == 'faltan_credenciales') {
                        echo "<p class='error'>Faltan credenciales. Por favor, completa todos los campos.</p>";
                    }
                }
            ?>
            
            <form action="../../../index.php" method="get">
                <input type="hidden" name="a" value="irreg">
                <p>¿No tienes una cuenta? <input type="submit" value="Regístrate aquí"></p>
            </form>
        </div>
    </body>
</html>