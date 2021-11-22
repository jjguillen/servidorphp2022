<?php

    class Carro {
        private $productos; //array ("producto"=>Producto, "cantidad"=>3)

        public function __construct()
        {
            $this->productos = array();
        }
        
        public function meter($producto,$cantidad){ 
            $encontrado=false;
            for($i=0; $i < count($this->productos); $i++) {
                if ( ($this->productos[$i]["producto"])->getId() == $producto->getId() ) {
                    $this->productos[$i]["cantidad"]++;
                    $encontrado=true;
                }
            }
            if (!$encontrado)
                array_push($this->productos,array("producto"=>$producto,"cantidad"=>$cantidad));
        } 

        public function quitar($id) {
            for($i=0; $i < count($this->productos); $i++) {
                if ( ($this->productos[$i]["producto"])->getId() == $id ) {
                    $this->productos[$i]["cantidad"]--;
                    if ($this->productos[$i]["cantidad"] == 0)
                        unset($this->productos[$i]);
                }
            }

            $this->productos = array_values($this->productos);
        }
        
        public function getCarro() {
            return $this->productos;
        }
    }


?>
