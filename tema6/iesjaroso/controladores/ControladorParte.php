<?php

    class ControladorParte {       

        /**
         * Muestra todos los partes en la web principal
         */
        public static function mostrarPartes() {
            $partes = ParteBD::getPartes();
            $vistaP = new VistaParte();
            $vistaP->render($partes);
        }

        /**
         * Borra un parte y los vuelve a mostrar todos
         */
        public static function borrarParte() {
            $id = filtrado($_REQUEST['id']);
            ParteBD::borrarParte($id);
            ControladorParte::mostrarPartes();
        }

         /**
         * Carga el formulario para insertar un nuevo parte
         */
        public static function insertarParte() {
            $vistaP = new VistaParte();
            $alumnos = AlumnoBD::getAlumnos();
            $profesores = ProfesorBD::getProfesores();
            $vistaP->renderFormInsertar($alumnos, $profesores);
        }

        /**
         * Toma los datos del formulario e inserta el parte en la BD
         */
        public static function insertarParteBD() {
            $usuario_id = filtrado($_REQUEST['usuario_id']);
            $alumno_id = filtrado($_REQUEST['alumno_id']);
            $fecha = filtrado($_REQUEST['fecha']);
            $hora = filtrado($_REQUEST['hora']);
            $asignatura = filtrado($_REQUEST['asignatura']);
            $gravedad = filtrado($_REQUEST['gravedad']);
            $descripcion = filtrado($_REQUEST['descripcion']);
            if (isset($_REQUEST['comunicado']))
                $comunicado = 1;
            else
                $comunicado = 0;

            $parte = new Parte(0, $alumno_id,$usuario_id,$fecha,$hora,$asignatura,$gravedad,$descripcion,$comunicado);

            ParteBD::insertarParte($parte);
            ControladorParte::mostrarPartes();
        }


    }