<?php

    class ControladorProductos {       

        public static function mostrarProductos() {

            $productos = ProductoBD::getProductos();
            $vistaP = new VistaProductos();
            $vistaP->render($productos);
        }

        public static function insertarProducto() {
            $nombre = filtrado($_REQUEST['nombre']);
            $precio = filtrado($_REQUEST['precio']);
            $descripcion = filtrado($_REQUEST['descripcion']);

            //Imagen
            $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
            
            $producto = new Producto(0,$nombre,$precio, $imagen, $descripcion);

            ProductoBD::insertarProducto($producto);
            ControladorProductos::mostrarProductos();
        }


        public static function getProducto($id) {
            return ProductoBD::getProducto($id);
        }


    }