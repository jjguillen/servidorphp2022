<?php

    class Profesor {

        private $id;
        private $email;
        private $password;
        private $nombre;
        private $ciudad;
        private $situacion;
        private $especialidad;

        public function __construct($id="",$email="",$password="",$nombre="",$ciudad="",$situacion="",$especialidad="") {
            $this->id = $id;
            $this->email = $email;
            $this->password = $password;
            $this->nombre = $nombre;
            $this->ciudad = $ciudad;
            $this->situacion = $situacion;
            $this->especialidad = $especialidad;
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
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

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
         * Get the value of ciudad
         */ 
        public function getCiudad()
        {
                return $this->ciudad;
        }

        /**
         * Set the value of ciudad
         *
         * @return  self
         */ 
        public function setCiudad($ciudad)
        {
                $this->ciudad = $ciudad;

                return $this;
        }

        /**
         * Get the value of situacion
         */ 
        public function getSituacion()
        {
                return $this->situacion;
        }

        /**
         * Set the value of situacion
         *
         * @return  self
         */ 
        public function setSituacion($situacion)
        {
                $this->situacion = $situacion;

                return $this;
        }

        /**
         * Get the value of especialidad
         */ 
        public function getEspecialidad()
        {
                return $this->especialidad;
        }

        /**
         * Set the value of especialidad
         *
         * @return  self
         */ 
        public function setEspecialidad($especialidad)
        {
                $this->especialidad = $especialidad;

                return $this;
        }
    }

?>