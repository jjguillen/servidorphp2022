<?php
    include ("ConexionBD.php");
    include ("Noticia.php");

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








    }





?>