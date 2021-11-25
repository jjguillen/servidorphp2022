<?php

    class Curso {

        private $id;
        private $nombre;
        private $etapa;
        private $anio;

        public function __construct($id="",$nombre="",$etapa="",$anio="") {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->etapa = $etapa;
            $this->anio = $anio;
        }


        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of etapa
         */ 
        public function getEtapa()
        {
                return $this->etapa;
        }

        /**
         * Set the value of etapa
         *
         * @return  self
         */ 
        public function setEtapa($etapa)
        {
                $this->etapa = $etapa;

                return $this;
        }

        /**
         * Get the value of anio
         */ 
        public function getAnio()
        {
                return $this->anio;
        }

        /**
         * Set the value of anio
         *
         * @return  self
         */ 
        public function setAnio($anio)
        {
                $this->anio = $anio;

                return $this;
        }
    }