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
            <h2>Inicio de sesión para hacer reconocimientos</h2>
            <form action="../../service/index.php" method="post">
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>

                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                
                <input type="submit" value="Iniciar">
            </form>
        </div>
    </body>
</html>