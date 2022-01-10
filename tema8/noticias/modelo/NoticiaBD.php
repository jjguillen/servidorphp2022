<?php

require 'vendor/autoload.php';

    class NoticiaBD {

        public static function getNoticias() {

            $conexion = ConexionBD::conectar("ejemplo"); //Base de datos 'ejemplo'

            $cursor = $conexion->noticias->find();

            //Crear los objetos para devolverlos (MVC)
            $noticias = array();
            foreach($cursor as $noticia) {
               $noticia_OBJ = new Noticia($noticia['id'],$noticia['encabezado'],$noticia['texto'],$noticia['fecha']);
               array_push($noticias, $noticia_OBJ);
            }
            
            ConexionBD::cerrar();

            //Me devuelve un array de objetos
            return $noticias;
        }

        public static function borrarNoticia($id) {
            $conexion = ConexionBD::conectar("ejemplo");

            $deleteResult = $conexion->noticias->deleteOne(['id' => intVal($id)]);   

            ConexionBD::cerrar();
        }

        public static function insertNoticia($noticia) {
            $conexion = ConexionBD::conectar("ejemplo");

            //Hacer el autoincrement
            //Ordeno por id, y me quedo con el mayor
            $noticiaMayor = $conexion->noticias->findOne(
                [],
                [
                    'sort' => ['id' => -1],
                ]);
            if (isset($noticiaMayor))
                $idValue = $noticiaMayor['id'];
            else
                $idValue = 0;


            //Collección 'usuarios'
            $insertOneResult = $conexion->noticias->insertOne([
                'id' => intVal($idValue + 1),
                'encabezado' => $noticia->getEncabezado(),
                'texto' => $noticia->getTexto(),
                'fecha' => $noticia->getFecha()
            ]);

            ConexionBD::cerrar();
        }

        public static function modificarNoticia($noticia) {
            $conexion = ConexionBD::conectar("ejemplo");

            $updateOneResult = $conexion->noticias->updateOne(
                ['id' => intVal($noticia->getId())],
                [ '$set' => [
                'encabezado' => $noticia->getEncabezado(),
                'texto' => $noticia->getTexto(),
                'fecha' => $noticia->getFecha()
                ]  ]);

            ConexionBD::cerrar();
        }








    }





?>