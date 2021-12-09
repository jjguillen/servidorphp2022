<?php

    abstract class Baraja {

        protected $palos;
        protected $numeros;

        protected $cartas;

        public function __construct() {
            $this->cartas = array();
        }

        public function barajar() {
            shuffle($this->cartas);
        }

        public function pintarBaraja() {
            foreach($this->cartas as $carta) {
                echo $carta->getPalo()." - ".$carta->getFigura()."<br>";
            }
        }

        public abstract function crearMazo();


    }




?>