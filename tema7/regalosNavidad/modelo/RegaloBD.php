<?php

    class RegaloBD {


        public static function getRegalos() {
            $conexion = ConexionBD::conectar("regalosNavidad");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM regalos");
            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');

            ConexionBD::cerrar();

            return $regalos;
        }

        public static function getRegalo($id) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM regalos WHERE id = ?");
            $stmt->bindValue(1,$id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');
            $stmt->execute();

            $regalo = $stmt->fetch();

            ConexionBD::cerrar();

            return $regalo;
        }

        public static function borrarRegalo($id) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            $stmt = $conexion->prepare("DELETE FROM regalos WHERE id = :id");
            // Bind
            $stmt->bindValue(":id", $id);
            // Ejecuta la consulta
            $stmt->execute();

            ConexionBD::cerrar();
        }

        public static function insertarRegalo($regalo) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO regalos (nombre, destinatario, precio, estado) VALUES (?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $regalo->getNombre());
                $stmt->bindValue(2, $regalo->getDestinatario());
                $stmt->bindValue(3, $regalo->getPrecio());
                $stmt->bindValue(4, $regalo->getEstado());
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }

        public static function modificarRegalo($regalo) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            try {
                //Insertar
                $stmt = $conexion->prepare("UPDATE regalos SET nombre=?, destinatario=?, precio=?, estado=?  WHERE id = ?");
                // Bind
                $stmt->bindValue(1, $regalo->getNombre());
                $stmt->bindValue(2, $regalo->getDestinatario());
                $stmt->bindValue(3, $regalo->getPrecio());
                $stmt->bindValue(4, $regalo->getEstado());
                $stmt->bindValue(5, $regalo->getId());
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }






    }





?>