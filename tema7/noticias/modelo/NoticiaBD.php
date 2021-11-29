<?php

    class NoticiaBD {


        public static function getNoticias() {

            $conexion = ConexionBD::conectar("noticias");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM noticias");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $noticias = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Noticia');

            ConexionBD::cerrar();

            return $noticias;
        }

        public static function borrarNoticia($id) {
            $conexion = ConexionBD::conectar("noticias");

            $stmt = $conexion->prepare("DELETE FROM noticias WHERE id = :id");
            // Bind
            $stmt->bindValue(":id", $id);
            // Ejecuta la consulta
            $stmt->execute();

            ConexionBD::cerrar();
        }

        public static function insertNoticia($noticia) {
            $conexion = ConexionBD::conectar("noticias");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO noticias (encabezado, texto, fecha) VALUES (?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $noticia->getEncabezado());
                $stmt->bindValue(2, $noticia->getTexto());
                $stmt->bindValue(3, $noticia->getFecha());
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }








    }





?>