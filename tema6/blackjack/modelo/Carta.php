<?php

    class Carta {

        protected $palo;
        protected $numero;

        public function __construct($palo="",$numero="")        
        {
            $this->palo = $palo;
            $this->numero = $numero;
            
        }

        


        /**
         * Get the value of palo
         */ 
        public function getPalo()
        {
                return $this->palo;
        }

        /**
         * Set the value of palo
         *
         * @return  self
         */ 
        public function setPalo($palo)
        {
                $this->palo = $palo;

                return $this;
        }

        /**
         * Get the value of numero
         */ 
        public function getnumero()
        {
                return $this->numero;
        }

        /**
         * Set the value of numero
         *
         * @return  self
         */ 
        public function setnumero($numero)
        {
                $this->numero = $numero;

                return $this;
        }

        public function __toString()
        {
                return  "Palo: ".$this->palo." numero: ".$this->numero;
                //return "<img src='vistas/imgs/".$this->numero.$this->palo.".png'>" ;
        }
    }