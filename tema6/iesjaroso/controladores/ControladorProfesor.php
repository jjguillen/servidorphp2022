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
                $_SESSION['usuario'] = $email;
                ControladorAlumno::mostrarAlumnos();
            } else {
                $vistaProf = new VistaProfesor();
                $vistaProf->renderLogin("Usuario y/o contraseña no válido, pruebe de nuevo");
            }
        }

         /**
         * Carga el formulario para insertar un nuevo profesor
         */
        public static function insertarProfesor() {
            $vistaProf = new VistaProfesor();
            $vistaProf->renderFormInsertar();
        }


         /**
         * Toma los datos del formulario e inserta el profesor en la BD
         */
        public static function insertarProfesorBD() {
            
            $email = filtrado($_REQUEST['email']);
            $password = filtrado($_REQUEST['password']);
            $nombre = filtrado($_REQUEST['nombre']);
            $ciudad = filtrado($_REQUEST['ciudad']);
            $situacion = filtrado($_REQUEST['situacion']);
            $especialidad = filtrado($_REQUEST['especialidad']);

            $method = 'aes-256-cbc';
            $key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
            $iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
            $password_encrypted = openssl_encrypt ($password, $method, $key, false, $iv);
       
            $profesor = new Profesor(0, $email,$password_encrypted,$nombre,$ciudad,$situacion,$especialidad);

            $_SESSION['usuario'] = $email;
            ProfesorBD::insertarProfesor($profesor);
            ControladorAlumno::mostrarAlumnos();
        }

    }