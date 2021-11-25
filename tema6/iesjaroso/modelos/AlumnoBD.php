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

        /**
         * Obtiene todos los productos de la BD
         */
        public static function getAlumno($id) {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM alumnos WHERE id = :id");
            $stmt->bindValue(":id",$id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Alumno');
            $stmt->execute();
            $resultado = $stmt->fetch();

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

        public static function insertarAlumno($alumno) {
            $conexion = ConexionBD::conectar("iesjaroso");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO alumnos (nombre, apellidos, edad, email, dni, localidad, telefono, curso, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $alumno->getNombre());
                $stmt->bindValue(2, $alumno->getApellidos());
                $stmt->bindValue(3, $alumno->getEdad());
                $stmt->bindValue(4, $alumno->getEmail());
                $stmt->bindValue(5, $alumno->getDni());
                $stmt->bindValue(6, $alumno->getLocalidad());
                $stmt->bindValue(7, $alumno->getTelefono());
                $stmt->bindValue(8, $alumno->getCurso());
                $stmt->bindValue(9, $alumno->getAvatar());
        
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            //Cerrar conexión
            $dbh = null;
        }

        public static function updateAlumno($alumno) {
            $conexion = ConexionBD::conectar("iesjaroso");

            try {
                //Insertar. Si no lleva avatar dejo el que estaba, no lo modifico
                if ($alumno->getAvatar() != "-") {
                    $stmt = $conexion->prepare("UPDATE alumnos SET nombre=?, apellidos=?, edad=?, email=?, dni=?, localidad=?, telefono=?, curso=?, avatar=? WHERE id = ?");
                } else {
                    $stmt = $conexion->prepare("UPDATE alumnos SET nombre=?, apellidos=?, edad=?, email=?, dni=?, localidad=?, telefono=?, curso=? WHERE id = ?");
                }

                // Bind
                $stmt->bindValue(1, $alumno->getNombre());
                $stmt->bindValue(2, $alumno->getApellidos());
                $stmt->bindValue(3, $alumno->getEdad());
                $stmt->bindValue(4, $alumno->getEmail());
                $stmt->bindValue(5, $alumno->getDni());
                $stmt->bindValue(6, $alumno->getLocalidad());
                $stmt->bindValue(7, $alumno->getTelefono());
                $stmt->bindValue(8, $alumno->getCurso());

                if ($alumno->getAvatar() != "-") {
                    $stmt->bindValue(9, $alumno->getAvatar());
                    $stmt->bindValue(10, $alumno->getId());
                } else {
                    $stmt->bindValue(9, $alumno->getId());
                }
        
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            //Cerrar conexión
            $dbh = null;
        }


    }

?>    