<?php

    class ParteBD {

        /**
         * Obtiene todos los partes de la BD
         */
        public static function getPartes() {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT partes.id, CONCAT(alumnos.nombre, ' ' , alumnos.apellidos)  as alumno_id, usuarios.nombre as usuario_id, partes.fecha, partes.hora,
                                            partes.asignatura, partes.gravedad, partes.descripcion, partes.comunicado
                                        FROM partes,alumnos,usuarios WHERE partes.alumno_id=alumnos.id AND
                                            partes.usuario_id=usuarios.id");
            $stmt->execute();
            $resultado = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Parte');

            //Cerrar conexión
            $dbh = null;

            return $resultado;
        }

        public static function borrarParte($id) {
            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("DELETE FROM partes WHERE id = :id");
            $stmt->bindValue(':id',$id);
            $stmt->execute();

            //Cerrar conexión
            $dbh = null;
        }

        public static function insertarParte($parte) {
            $conexion = ConexionBD::conectar("iesjaroso");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO partes (alumno_id,usuario_id,fecha,hora,asignatura,gravedad,descripcion,comunicado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $parte->getAlumno_id());
                $stmt->bindValue(2, $parte->getUsuario_id());
                $stmt->bindValue(3, $parte->getFecha());
                $stmt->bindValue(4, $parte->getHora());
                $stmt->bindValue(5, $parte->getAsignatura());
                $stmt->bindValue(6, $parte->getGravedad());
                $stmt->bindValue(7, $parte->getDescripcion());
                $stmt->bindValue(8, $parte->getComunicado());
        
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            //Cerrar conexión
            $dbh = null;
        }
 


    }