<?php
    require_once '../model/isesion.php';

    class Cisesion {

        public function identificacion($correo, $contrasena) {
            //Instanciamos el modelo de inicio de sesion
            $inicioSesion = new InicioSesion($conexion, $correo, $contrasena); // Pasamos la conexión como parámetro

            //Llamamos al método del modelo que realiza las comprobaciones 
            $id = $inicioSesion->identificacion($correo, $contrasena);

            //Creamos la sesión en caso de qu0 el id del alumno sea válido
            if ($id !== false) {
                session_start();
                $_SESSION['idAlumno'] = $id;
                header("Location: ../view/indice.php"); //Si las credenciales introducidas son correctas, nos dirigimos al índice
                exit;
            }
            else {
                //Si las credenciales introducidas han sido incorrectas, le devolvemos un mensaje con el error
                header("Location: ../view/forminiciosesion.php?error=credenciales_invalidas");
                exit;
            }
        }
    }

?>