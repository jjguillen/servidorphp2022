<?php

    class CursoBD {

        /**
         * Obtiene todos los productos de la BD
         */
        public static function getCursos() {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM cursos");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Curso');

            //Cerrar conexión
            $dbh = null;

            return $resultado;
        }
        
    }