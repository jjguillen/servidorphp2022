<?php

    class Reserva {
        
        protected $id;
        protected $nombre;
        protected $email;
        protected $movil;
        protected $fecha;
        protected $turno;
        protected $hora;
        protected $npersonas;
        protected $estado;
        protected $id_mesa;

        /**
         * CONSTRUCTOR --------------------------------------------------------------------------------------
         */
        public function __construct($id="",$nombre="",$email="",$movil="",$fecha="",$turno="",$hora="",$npersonas="",$estado="",$id_mesa="") {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->movil = $movil;
            $this->fecha = $fecha;
            $this->turno = $turno;
            $this->hora = $hora;
            $this->npersonas = $npersonas;
            $this->estado = $estado;
            $this->id_mesa = $id_mesa;
        }

        /**
         * GETTERS Y SETTERS -------------------------------------------------------------------------------
         */
       

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
         * Get the value of movil
         */ 
        public function getMovil()
        {
                return $this->movil;
        }

        /**
         * Set the value of movil
         *
         * @return  self
         */ 
        public function setMovil($movil)
        {
                $this->movil = $movil;

                return $this;
        }

         /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of turno
         */ 
        public function getTurno()
        {
                return $this->turno;
        }

        /**
         * Set the value of turno
         *
         * @return  self
         */ 
        public function setTurno($turno)
        {
                $this->turno = $turno;

                return $this;
        }

        /**
         * Get the value of hora
         */ 
        public function getHora()
        {
                return $this->hora;
        }

        /**
         * Set the value of hora
         *
         * @return  self
         */ 
        public function setHora($hora)
        {
                $this->hora = $hora;

                return $this;
        }

        /**
         * Get the value of npersonas
         */ 
        public function getNpersonas()
        {
                return $this->npersonas;
        }

        /**
         * Set the value of npersonas
         *
         * @return  self
         */ 
        public function setNpersonas($npersonas)
        {
                $this->npersonas = $npersonas;

                return $this;
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
         * Get the value of estado
         */ 
        public function getEstado()
        {
                return $this->estado;
        }

        /**
         * Set the value of estado
         *
         * @return  self
         */ 
        public function setEstado($estado)
        {
                $this->estado = $estado;

                return $this;
        }

        /**
         * Get the value of id_mesa
         */ 
        public function getId_mesa()
        {
                return $this->id_mesa;
        }

        /**
         * Set the value of id_mesa
         *
         * @return  self
         */ 
        public function setId_mesa($id_mesa)
        {
                $this->id_mesa = $id_mesa;

                return $this;
        }
    }









?>