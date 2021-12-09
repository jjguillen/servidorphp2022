<?php

    class ControladorBJ {       


        public static function mostrarInicio() {
            VistaBJ::render();
        }

        public static function repartirCartas() {
            $partida = new Partida();

            $partida->repartirC();
            $partida->repartirC();

            $partida->repartirJ();
            $partida->repartirJ();

            $_SESSION['partida'] = serialize($partida);
            $partida->pintar();
        }

        public static function pedirCarta() {
            $partida = unserialize($_SESSION['partida']);

            $partida->repartirJ();
            $partida->repartirC();

            $_SESSION['partida'] = serialize($partida);
            $partida->pintar();           
        }

    }

?>