<?php

    class ControladorProductos {       

        public static function mostrarProductos() {

            $productos = ProductoBD::getProductos();
            $vistaP = new VistaProductos();
            $vistaP->render($productos);
        }

        public static function insertarProducto($producto) {
            ProductoBD::insertarProducto($producto);
            ControladorProductos::mostrarProductos();
        }


        public static function getProducto($id) {
            return ProductoBD::getProducto($id);
        }


    }