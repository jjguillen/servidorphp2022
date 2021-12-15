<?php
    class Reserva{
        protected $numeroMesa;
        protected $nombre;
        protected $apellidos;
        protected $email;
        protected $movil;
        protected $fecha;
        protected $comidaCena;
        protected $hora;
        protected $numeroPersonas;
        protected $estado;

        public function __constructor($numeroMesa, $nombre, $apellidos, $email, $movil, $fecha, 
            $comidaCena, $hora, $numeroPersonas, $estado){
            $this->numeroMesa = $numeroMesa;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->email = $email;
            $this->movil = $movil;
            $this->fecha = $fecha;
            $this->comidaCena = $comidaCena;
            $this->hora = $hora;
            $this->numeroPersonas = $numeroPersonas;
            $this->estado = $estado;
        }

        public function getNumeroMesa(){
            return $this->numeroMesa;
        }

        public function setNumeroMesa($numeroMesa){
            $this->numeroMesa = $numeroMesa;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getApellidos(){
            return $this->apellidos;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getMovil(){
            return $this->movil;
        }

        public function setMovil($movil){
            $this->movil = $movil;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }

        public function getComidaCena(){
            return $this->comidaCena;
        }

        public function setComidaCena($comidaCena){
            $this->comidaCena = $comidaCena;
        }

        public function getHora(){
            return $this->hora;
        }

        public function setHora($hora){
            $this->hora = $hora;
        }

        public function getNumeroPersonas(){
            return $this->numeroPersonas;
        }

        public function setNumeroPersonas($numeroPersonas){
            $this->numeroPersonas = $numeroPersonas;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }
?>