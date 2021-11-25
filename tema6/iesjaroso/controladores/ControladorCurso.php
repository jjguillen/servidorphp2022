<?php

    class ControladorCurso {       

        public static function mostrarCursosEnOption($opcion) {
            $cursos = CursoBD::getCursos();
            foreach($cursos as $curso) {
                if ($opcion == $curso->getId())
                    echo "<option value='{$curso->getId()}' selected>{$curso->getNombre()}</option>";
                else
                    echo "<option value='{$curso->getId()}'>{$curso->getNombre()}</option>";
            }
        }

        /**
         * Muestra todos los cursos en la web principal
         */
        public static function mostrarCursos() {
            $cursos = CursoBD::getCursos();
            $vistaC = new VistaCurso();
            $vistaC->render($cursos);
        }

         /**
         * Borra un curso y los vuelve a mostrar todos
         */
        public static function borrarCurso() {
            $id = filtrado($_REQUEST['id']);
            CursoBD::borrarCurso($id);
            ControladorCurso::mostrarCursos();
        }

         /**
         * Carga el formulario para insertar un nuevo curso
         */
        public static function insertarCurso() {
            $vistaC = new VistaCurso();
            $vistaC->renderFormInsertar("");
        }

        /**
         * Toma los datos del formulario e inserta el curso en la BD
         */
        public static function insertarCursoBD() {
            $nombre = filtrado($_REQUEST['nombre']);
            $etapa = filtrado($_REQUEST['etapa']);
            $anio = filtrado($_REQUEST['anio']);
            
            $curso = new Curso(0, $nombre, $etapa, $anio);

            CursoBD::insertarCurso($curso);
            ControladorCurso::mostrarCursos();
        }

        /**
         * Carga el formulario para editar un nuevo curso por id
         */
        public static function editarCurso() {
            $id = filtrado($_REQUEST['id']);
            $curso = CursoBD::getCurso($id);

            $vistaC = new VistaCurso();
            $vistaC->renderFormInsertar($curso);
        }

        /**
         * Modifica un curso de la BD con los nuevos valores del curso
         */
        public static function editarCursoBD() {
            $nombre = filtrado($_REQUEST['nombre']);
            $etapa = filtrado($_REQUEST['etapa']);
            $anio = filtrado($_REQUEST['anio']);
            $id = filtrado($_REQUEST['id']);

            $curso = new Curso($id, $nombre, $etapa, $anio);
            CursoBD::updateCurso($curso);
            ControladorCurso::mostrarCursos();
        }



    }