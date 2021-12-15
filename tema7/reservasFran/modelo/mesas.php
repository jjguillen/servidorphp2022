<?php
    class Mesa{
        protected $numeroMesa;
        protected $personasQueCaben;

        public function __constructor($numeroMesa, $personasQueCaben){
            $this->numeroMesa = $numeroMesa;
            $this->personasQueCaben = $personasQueCaben;
        }

        public function getNumeroMesa(){
            return $this->numeroMesa;
        }

        public function setNumeroMesa($numeroMesa){
            $this->numeroMesa = $numeroMesa;
        }

        public function getPersonasQueCaben(){
            return $this->personasQueCaben;
        }

        public function setPersonasQueCaben($personasQueCaben){
            $this->personasQueCaben = $personasQueCaben;
        }
    }

?>