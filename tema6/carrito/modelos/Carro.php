<?php

    class Carro {
        private $productos; //array ("producto"=>Producto, "cantidad"=>3)

        public function __construct()
        {
            $this->productos = array();
        }
        
        public function meter($producto,$cantidad){ 
            array_push($this->productos,array("producto"=>$producto,"cantidad"=>$cantidad));
        } 
        
        public function getCarro() {
            return $this->productos;
        }
    }


?>
