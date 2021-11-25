<?php

    class ParteBD {

        /**
         * Obtiene todos los partes de la BD
         */
        public static function getPartes() {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM partes");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Parte');

            //Cerrar conexión
            $dbh = null;

            return $resultado;
        }

    }