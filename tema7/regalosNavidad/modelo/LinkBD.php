<?php

    class LinkBD {


        public static function getLinksRegalo($id) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT links.id, links.id_regalo, links.nombre, links.link,
                                         links.precio, links.prioridad FROM links JOIN regalos
                                         WHERE links.id_regalo = regalos.id AND regalos.id = ?");
            $stmt->bindValue(1,$id);
            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $links = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Link');

            ConexionBD::cerrar();

            return $links;
        }

        public static function borrarLink($id) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            $stmt = $conexion->prepare("DELETE FROM links WHERE id = :id");
            // Bind
            $stmt->bindValue(":id", $id);
            // Ejecuta la consulta
            $stmt->execute();

            ConexionBD::cerrar();
        }

        public static function insertarLink($link) {
            $conexion = ConexionBD::conectar("regalosNavidad");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO links (id_regalo, nombre, link, precio, prioridad) VALUES (?, ?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $link->getId_regalo());
                $stmt->bindValue(2, $link->getNombre());
                $stmt->bindValue(3, $link->getLink());
                $stmt->bindValue(4, $link->getPrecio());
                $stmt->bindValue(5, $link->getPrioridad());
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }

    }

?>