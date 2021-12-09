<?php
    include "Baraja.php";

    class BarajaIng extends Baraja {


        public function __construct() {
            parent::__construct(); //Llamar al constructor de Baraja
            $this->palos = array("P", "R", "C", "T");
            $this->numeros = array(1,2,3,4,5,6,7,10,11,12);
            $this->crearMazo();
        }

        public function crearMazo() {
            foreach($this->palos as $palo) {
                foreach($this->numeros as $numero) {
                    $carta = new Carta($palo, $numero);
                    array_push($this->cartas, $carta);
                }
            }
            $this->barajar();

        }

        public function sacarCarta() {
            return array_pop($this->cartas);
        }

        //img/ 1Bastos.jpg   "img/".$carta->numero.$carta->palo.".jpg";
    }




?>