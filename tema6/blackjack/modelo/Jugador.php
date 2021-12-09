<?php

    class Jugador {
        protected $mano;

        public function __construct() {
            $this->mano = array();
        }

        public function addCarta($carta) {
            array_push($this->mano, $carta);
        }

        /**
         * Get the value of mano
         */ 
        public function getMano()
        {
                return $this->mano;
        }

        /**
         * Set the value of mano
         *
         * @return  self
         */ 
        public function setMano($mano)
        {
                $this->mano = $mano;

                return $this;
        }

        public function __toString()
        {
            $cadena = "";
            foreach($this->mano as $carta) {
                $cadena .= $carta;
                $cadena .= "<br>";
            }

            $cadena .= "<button type='button' class='btn btn-danger' id='plantarse'>Plantarse</button>";

            return $cadena;
        }


    }

?>