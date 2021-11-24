<?php

    class ControladorCarro {       

        public static function mostrarCarro() {

            $carro="";
            //Si no existe en la sesión lo creamos
            if (!isset($_SESSION['carrito'])) {
                $carro = new Carro();
                $_SESSION['carrito'] = serialize($carro);
            } else {
                //Si existe, lo obtenemos, deserializamos y lo pintamos
                $carro = unserialize($_SESSION['carrito']);
            }

            $vistaC = new VistaCarro();
            $vistaC->render($carro);


        }

        public static function meter() {
            $id = filtrado($_REQUEST['id']);
            $cant = filtrado($_REQUEST['cantidad']);

            $producto = ControladorProductos::getProducto($id);

            $carro="";
            //Si no existe en la sesión lo creamos
            if (!isset($_SESSION['carrito'])) {
                $carro = new Carro();
                $carro->meter($producto,$cant);
                $_SESSION['carrito'] = serialize($carro);
            } else {
                //Si existe, lo obtenemos, deserializamos y lo pintamos                
                $carro = unserialize($_SESSION['carrito']);
                $carro->meter($producto,$cant);
                $_SESSION['carrito'] = serialize($carro);
            }

            //$vistaC = new VistaCarro();
            //$vistaC->render($carro);
            ControladorProductos::mostrarProductos();
        
        }

        public static function quitar() {
            $id = filtrado($_REQUEST['id']);

            $carro = unserialize($_SESSION['carrito']);
            $carro->quitar($id);
            $_SESSION['carrito'] = serialize($carro);
            

            $vistaC = new VistaCarro();
            $vistaC->render($carro);
        }


        public static function comprar() {
            $nombre = filtrado($_REQUEST['nombre']);
            $direccion = filtrado($_REQUEST['direccion']);
            $pais = filtrado($_REQUEST['pais']);
            $ciudad = filtrado($_REQUEST['ciudad']);
            $email = filtrado($_REQUEST['email']);
            $carro = unserialize($_SESSION['carrito']);
            

            $vistaC = new VistaCarro();
            $nombre = $vistaC->generarPDF($nombre, $direccion, $pais, $ciudad, $email, $carro);
            $vistaC->renderFactura($nombre);
        }

        


    }

    
  
