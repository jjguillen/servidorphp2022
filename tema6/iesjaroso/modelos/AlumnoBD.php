<?php

    class AlumnoBD {

        /**
         * Obtiene todos los productos de la BD
         */
        public static function getAlumnos() {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM alumnos");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Alumno');

            //Cerrar conexión
            $dbh = null;

            return $resultado;
        }

        public static function borrarAlumno($id) {
            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM alumnos WHERE id = :id");
            $stmt->bindValue(':id',$id);
            $stmt->execute();

            //Cerrar conexión
            $dbh = null;
        }


    }

?>    