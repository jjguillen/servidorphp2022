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

         /**
         * Obtiene todos los cursos de la BD
         */
        public static function getCurso($id) {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM cursos WHERE id = :id");
            $stmt->bindValue(":id",$id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Curso');
            $stmt->execute();
            $resultado = $stmt->fetch();

            //Cerrar conexión
            $dbh = null;

            return $resultado;
        }

        public static function borrarCurso($id) {
            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM cursos WHERE id = :id");
            $stmt->bindValue(':id',$id);
            $stmt->execute();

            //Cerrar conexión
            $dbh = null;
        }

        public static function insertarCurso($curso) {
            $conexion = ConexionBD::conectar("iesjaroso");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO cursos (nombre, etapa, anio) VALUES (?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $curso->getNombre());
                $stmt->bindValue(2, $curso->getEtapa());
                $stmt->bindValue(3, $curso->getAnio());
        
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            //Cerrar conexión
            $dbh = null;
        }

        public static function updateCurso($curso) {
            $conexion = ConexionBD::conectar("iesjaroso");

            try {
                
                $stmt = $conexion->prepare("UPDATE cursos SET nombre=?, etapa=?, anio=? WHERE id = ?");


                // Bind
                $stmt->bindValue(1, $curso->getNombre());
                $stmt->bindValue(2, $curso->getEtapa());
                $stmt->bindValue(3, $curso->getAnio());
               
                $stmt->bindValue(4, $curso->getId());
  
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            //Cerrar conexión
            $dbh = null;
        }
        
    }