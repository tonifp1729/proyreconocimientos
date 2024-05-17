<?php

    require_once '../model/isesion.php';

    class ControladorInicioSesion {

        //CONSTRUCTOR CON OBJ MODELO

        public function identificacion($correo, $contrasena) {

            //Verificar que se han recibido las credenciales
            if (!empty($correo) && !empty($contrasena)) {
                //Crear una instancia del modelo de inicio de sesión
                $isesion = new InicioSesion();

                //Verificar las credenciales utilizando el método del modelo
                $alumno = $isesion->identificacion($correo, $contrasena); //ESTE $alumno ES UN ARRAY
                
                if ($alumno) {
                    //Iniciar sesión y redirigir al índice si las credenciales son correctas
                    session_start();
                    $_SESSION['id'] = $alumno['idAlumno'];
                    $_SESSION['nombre'] = $alumno['nombre'];
                    header("Location: ../../../index.php?a=indice");
                    exit;
                } else {
                    //Redirigir al formulario de inicio de sesión con un mensaje de error si las credenciales son incorrectas
                    header("Location: ../view/forminiciosesion.php?error=credenciales_invalidas");
                    exit;
                }
            } else {
                //Redirigir al formulario de inicio de sesión con un mensaje de error si faltan credenciales
                header("Location: ../view/forminiciosesion.php?error=faltan_credenciales");
                exit;
            }
        }
    }

?>