<?php

    class RegaloBD {


        public static function getRegalos() {

            $conexion = ConexionBD::conectar("regalosNavidad");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM regalos");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $noticias = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalo');

            ConexionBD::cerrar();

            return $noticias;
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








    }





?>