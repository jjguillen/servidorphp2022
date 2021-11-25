<?php

    class Parte {
        protected $alumno_id;
        protected $curso_id;
        protected $fecha;
        protected $hora;
        protected $asignatura;
        protected $gravedad;
        protected $descripcion;
        protected $comunicado;

        public function __construct($alumno_id="",$curso_id="",$fecha="",$hora="",$asignatura="",$gravedad="",$descripcion="",$comunicado="") {
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
    }