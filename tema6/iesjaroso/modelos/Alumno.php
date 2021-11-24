<?php

    class Alumno {

        private $id;
        private $nombre;
        private $apellidos;
        private $edad;
        private $dni;
        private $email;
        private $localidad;
        private $telefono;
        private $curso;
        private $avatar;

        public function __construct($id, $nombre, $apellidos, $edad, $dni, $email, $localidad, $telefono, $curso, $avatar) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->edad = $edad;
            $this->dni = $dni;
            $this->email = $email;
            $this->localidad = $localidad;
            $this->telefono = $telefono;
            $this->curso = $curso;
            $this->avatar = $avatar;
        }

        
        /**
         * Get the value of edad
         */ 
        public function getEdad()
        {
                return $this->edad;
        }

        /**
         * Set the value of edad
         *
         * @return  self
         */ 
        public function setEdad($edad)
        {
                $this->edad = $edad;

                return $this;
        }
    }


?>