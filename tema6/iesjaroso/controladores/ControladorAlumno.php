<?php

    class ControladorAlumno {       

        /**
         * Muestra todos los alumnos en la web principal
         */
        public static function mostrarAlumnos() {
            $alumnos = AlumnoBD::getAlumnos();
            $vistaAlum = new VistaAlumno();
            $vistaAlum->render($alumnos);
        }

        /**
         * Borra un alumno y los vuelve a mostrar todos
         */
        public static function borrarAlumno() {
            $id = filtrado($_REQUEST['id']);
            AlumnoBD::borrarAlumno($id);
            ControladorAlumno::mostrarAlumnos();
        }

        /**
         * Carga el formulario para insertar un nuevo alumno
         */
        public static function insertarAlumno() {
            $vistaAlum = new VistaAlumno();
            $vistaAlum->renderFormInsertar("");
        }

        /**
         * Toma los datos del formulario e inserta el alumno en la BD
         */
        public static function insertarAlumnoBD() {
            $nombre = filtrado($_REQUEST['nombre']);
            $apellidos = filtrado($_REQUEST['apellidos']);
            $edad = filtrado($_REQUEST['edad']);
            $dni = filtrado($_REQUEST['dni']);
            $email = filtrado($_REQUEST['email']);
            $localidad = filtrado($_REQUEST['localidad']);
            $telefono = filtrado($_REQUEST['telefono']);
            $curso = filtrado($_REQUEST['curso']);

            if (!empty($_FILES['avatar']['tmp_name'])) {
                $avatar = file_get_contents($_FILES['avatar']['tmp_name']);
            } else 
                $avatar = "-";

            $alumno = new Alumno(0, $nombre, $apellidos, $edad, $dni, $email, $localidad, $telefono, $curso, $avatar);

            AlumnoBD::insertarAlumno($alumno);
            ControladorAlumno::mostrarAlumnos();
        }

        /**
         * Carga el formulario para editar un nuevo alumno por id
         */
        public static function editarAlumno() {
            $id = filtrado($_REQUEST['id']);
            $alumno = AlumnoBD::getAlumno($id);

            $vistaAlum = new VistaAlumno();
            $vistaAlum->renderFormInsertar($alumno);
        }

        /**
         * Modifica un alumno de la BD con los nuevos valores del alumno
         */
        public static function editarAlumnoBD() {
            $nombre = filtrado($_REQUEST['nombre']);
            $apellidos = filtrado($_REQUEST['apellidos']);
            $edad = filtrado($_REQUEST['edad']);
            $dni = filtrado($_REQUEST['dni']);
            $email = filtrado($_REQUEST['email']);
            $localidad = filtrado($_REQUEST['localidad']);
            $telefono = filtrado($_REQUEST['telefono']);
            $curso = filtrado($_REQUEST['curso']);
            $id = filtrado($_REQUEST['id']);

            if (!empty($_FILES['avatar']['tmp_name'])) {
                $avatar = file_get_contents($_FILES['avatar']['tmp_name']);
            } else 
                $avatar = "-";

            $alumno = new Alumno($id, $nombre, $apellidos, $edad, $dni, $email, $localidad, $telefono, $curso, $avatar);
            AlumnoBD::updateAlumno($alumno);
            ControladorAlumno::mostrarAlumnos();
        }


    }