<?php

    class ControladorCurso {       

        public static function mostrarCursosEnOption() {
            $cursos = CursoBD::getCursos();
            foreach($cursos as $curso) {
                echo "<option value='{$curso->getId()}'>{$curso->getNombre()}</option>";
            }
        }

    }