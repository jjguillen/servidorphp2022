<?php

    class ControladorProfesor {       

        public static function login() {

            $vistaProf = new VistaProfesor();
            $vistaProf->renderLogin("");
        }

        public static function checkLogin() {
            $email = filtrado($_REQUEST['email']);
            $password = filtrado($_REQUEST['password']);

            //Chequeamos email y contraseña
            $correcto = ProfesorBD::checkLogin($email,$password);

            if ($correcto==1) {
                $alumnos = AlumnoBD::getAlumnos();
                $vistaAlum = new VistaAlumno();
                $vistaAlum->render($alumnos);
            } else {
                $vistaProf = new VistaProfesor();
                $vistaProf->renderLogin("Usuario y/o contraseña no válido, pruebe de nuevo");
            }


        }

    }