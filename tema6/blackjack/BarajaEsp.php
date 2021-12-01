<?php
    include "Baraja.php";

    class BarajaEsp extends Baraja {


        public function __construct() {
            parent::__construct(); //Llamar al constructor de Baraja
            $this->palos = array("Bastos", "Espadas", "Copas", "Oros");
            $this->numeros = array(1,2,3,4,5,6,7,10,11,12);
            $this->crearMazo();
        }

        public function crearMazo() {
            foreach($this->palos as $palo) {
                foreach($this->numeros as $numero) {
                    $carta = array("palo" => $palo, "numero" => $numero); //new Carta($palo, $numero);
                    array_push($this->cartas, $carta);
                }
            }


        }

        //img/ 1Bastos.jpg   "img/".$carta->numero.$carta->palo.".jpg";
    }


    $bEsp = new BarajaEsp();
    $bEsp->pintarBaraja();




?>