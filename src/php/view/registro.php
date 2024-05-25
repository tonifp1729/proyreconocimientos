<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Regístrate</title>
        <link rel="stylesheet" href="src/css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h2>Registro de alumno</h2>
            <form action="index.php?controlador=cregistro&action=registro" method="post">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>

                <label for="confirmarContrasena">Confirmar Contraseña:</label>
                <input type="password" id="confirmarContrasena" name="confirmarContrasena" required>
                
                <label for="web">Web de reconocimiento (opcional):</label>
                <input type="text" id="web" name="web">
                
                <input type="submit" value="Crear">
            </form>

            <?php
                //Comprueba si se han recibido avisos de error y en caso afirmativo muestra el mensaje.
                if(isset($error)) {
                    if($error == 'correo_invalido') {
                        echo "<p class='error'>Correo inválido. Debes introducir un correo con un dominio válido.</p>";
                    } elseif($error == 'faltan_credenciales') {
                        echo "<p class='error'>Faltan credenciales. Por favor, completa todos los campos.</p>";
                    } elseif($error == 'contrasena_incorrecta') {
                        echo "<p class='error'>La contraseña no se ha introducido correctamente. Por favor, asegurate de que ambos campos sean rellenados correctamente.</p>";
                    }
                }
            ?>
            
            <p>¿Ya estás registrado? <a  href="index.php?controlador=cisesion&action=irsesion">Inicia aquí</a>
        </div>
    </body>
</html>