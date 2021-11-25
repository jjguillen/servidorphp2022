<?php

    class ControladorAlumno {       

        public static function mostrarAlumnos() {
            $alumnos = AlumnoBD::getAlumnos();
            $vistaAlum = new VistaAlumno();
            $vistaAlum->render($alumnos);
        }

        public static function borrarAlumno() {
            $id = filtrado($_REQUEST['id']);
            AlumnoBD::borrarAlumno($id);
            ControladorAlumno::mostrarAlumnos();
        }

        public static function insertarAlumno() {
            $vistaAlum = new VistaAlumno();
            $vistaAlum->renderFormInsertar();
        }

        public static function insertarAlumnoBD() {
            $nombre = filtrado($_REQUEST['nombre']);
            $apellidos = filtrado($_REQUEST['nombre']);
            $edad = filtrado($_REQUEST['nombre']);
            $dni = filtrado($_REQUEST['nombre']);
            $email = filtrado($_REQUEST['nombre']);
            $localidad = filtrado($_REQUEST['nombre']);
            $telefono = filtrado($_REQUEST['nombre']);
            $curso = filtrado($_REQUEST['nombre']);
            $avatar = filtrado($_REQUEST['nombre']);

            $alumno = new Alumno($nombre, $apellidos, $edad, $dni, $email, $localidad, $telefono, $curso, $avatar);

            ControladorAlumno::insertarAlumno($alumno);
        }


    }