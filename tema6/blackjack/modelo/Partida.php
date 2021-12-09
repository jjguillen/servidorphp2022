<?php

    class Partida {
        protected $barajaEsp;
        protected $jugador;
        protected $crupier;

        public function __construct()
        {
            $this->barajaEsp = new BarajaIng();
            $this->jugador = new Jugador();
            $this->crupier = new Jugador();
        }

        public function repartirJ() {
            $carta = $this->barajaEsp->sacarCarta();
            $this->jugador->addCarta($carta);
        }

        public function repartirC() {
            $carta = $this->barajaEsp->sacarCarta();
            $this->crupier->addCarta($carta);
        }

        public function pintar() {
            echo "Jugador<br>";
            echo $this->jugador;

            echo "<br>Crupier<br>";
            echo $this->crupier;    

        }

    }

?>