<?php

    class Parte {
        protected $id;
        protected $alumno_id;
        protected $curso_id;
        protected $fecha;
        protected $hora;
        protected $asignatura;
        protected $gravedad;
        protected $descripcion;
        protected $comunicado;

        public function __construct($id="",$alumno_id="",$curso_id="",$fecha="",$hora="",$asignatura="",$gravedad="",$descripcion="",$comunicado="") {
            $this->id = $id;
            $this->alumno_id = $alumno_id;
            $this->curso_id = $curso_id;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->asignatura = $asignatura;
            $this->gravedad = $gravedad;
            $this->descripcion = $descripcion;
            $this->comunicado = $comunicado; 

        }


        /**
         * Get the value of gravedad
         */ 
        public function getGravedad()
        {
                return $this->gravedad;
        }

        /**
         * Set the value of gravedad
         *
         * @return  self
         */ 
        public function setGravedad($gravedad)
        {
                $this->gravedad = $gravedad;

                return $this;
        }

        /**
         * Get the value of alumno_id
         */ 
        public function getAlumno_id()
        {
                return $this->alumno_id;
        }

        /**
         * Set the value of alumno_id
         *
         * @return  self
         */ 
        public function setAlumno_id($alumno_id)
        {
                $this->alumno_id = $alumno_id;

                return $this;
        }

        /**
         * Get the value of curso_id
         */ 
        public function getCurso_id()
        {
                return $this->curso_id;
        }

        /**
         * Set the value of curso_id
         *
         * @return  self
         */ 
        public function setCurso_id($curso_id)
        {
                $this->curso_id = $curso_id;

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
         * Get the value of asignatura
         */ 
        public function getAsignatura()
        {
                return $this->asignatura;
        }

        /**
         * Set the value of asignatura
         *
         * @return  self
         */ 
        public function setAsignatura($asignatura)
        {
                $this->asignatura = $asignatura;

                return $this;
        }

       

       

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

        /**
         * Get the value of comunicado
         */ 
        public function getComunicado()
        {
                return $this->comunicado;
        }

        /**
         * Set the value of comunicado
         *
         * @return  self
         */ 
        public function setComunicado($comunicado)
        {
                $this->comunicado = $comunicado;

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
    }