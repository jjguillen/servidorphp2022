<?php
    class Link {
        protected $id;
        protected $id_regalo;
        protected $nombre;
        protected $link;
        protected $precio;
        protected $prioridad;

        public function __construct($id="",$id_regalo="",$nombre="",$link="",$precio="",$prioridad="")
        {
            $this->id = $id;
            $this->id_regalo = $id_regalo;
            $this->nombre = $nombre;
            $this->link = $link;
            $this->precio = $precio;
            $this->prioridad = $prioridad;
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
         * Get the value of id_regalo
         */ 
        public function getId_regalo()
        {
                return $this->id_regalo;
        }

        /**
         * Set the value of id_regalo
         *
         * @return  self
         */ 
        public function setId_regalo($id_regalo)
        {
                $this->id_regalo = $id_regalo;

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
         * Get the value of link
         */ 
        public function getLink()
        {
                return $this->link;
        }

        /**
         * Set the value of link
         *
         * @return  self
         */ 
        public function setLink($link)
        {
                $this->link = $link;

                return $this;
        }

        /**
         * Get the value of precio
         */ 
        public function getPrecio()
        {
                return $this->precio;
        }

        /**
         * Set the value of precio
         *
         * @return  self
         */ 
        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        /**
         * Get the value of prioridad
         */ 
        public function getPrioridad()
        {
                return $this->prioridad;
        }

        /**
         * Set the value of prioridad
         *
         * @return  self
         */ 
        public function setPrioridad($prioridad)
        {
                $this->prioridad = $prioridad;

                return $this;
        }
    }

?>