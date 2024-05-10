<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Identifícate</title>
        <link rel="stylesheet" href="src/css/estilosFeedback.css">
    </head>
    <body>
        <div class="container">
            <h2>Web de reconocimientos - Escuela Virgen de Guadalupe</h2>
            <form action="index.php" method="post">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                
                <input type="submit" value="Indentificarse">
            </form>
        </div>
    </body>
</html>