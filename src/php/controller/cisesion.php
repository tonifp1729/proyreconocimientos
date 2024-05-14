<?php

    require_once '../model/isesion.php';

    class ControladorInicioSesion {
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function identificacion($correo, $contrasena) {

            //Verificar que se han recibido las credenciales
            if (!empty($correo) && !empty($contrasena)) {
                //Crear una instancia del modelo de inicio de sesión
                $modeloInicioSesion = new InicioSesion($this->conexion);

                //Verificar las credenciales utilizando el método del modelo
                $idAlumno = $modeloInicioSesion->identificacion($correo, $contrasena);

                if ($idAlumno) {
                    //Iniciar sesión y redirigir al índice si las credenciales son correctas
                    session_start();
                    $_SESSION['idAlumno'] = $idAlumno;
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