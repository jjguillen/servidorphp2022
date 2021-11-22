<?php

    class ProductoBD {

        /**
         * Obtiene todos los productos de la BD
         */
        public static function getProductos() {

            $conexion = ConexionBD::conectar("tienda");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM productos");

            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $productos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Producto');

            ConexionBD::cerrar();

            return $productos;
        }

        public static function getProducto($id) {
            $conexion = ConexionBD::conectar("tienda");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM productos WHERE id=?");
            $stmt->bindValue(1,$id);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Producto');
            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $producto = $stmt->fetch();

            ConexionBD::cerrar();

            return $producto;
        }

        public static function insertarProducto($producto) {
            $conexion = ConexionBD::conectar("tienda");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO productos (nombre,precio,imagen,descripcion) VALUES (?, ?, ?, ?)");
                // Bind
                $stmt->bindValue(1, $producto->getNombre());
                $stmt->bindValue(2, $producto->getPrecio());
                $stmt->bindValue(3, $producto->getImagen());
                $stmt->bindValue(4, $producto->getDescripcion());
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }


    }