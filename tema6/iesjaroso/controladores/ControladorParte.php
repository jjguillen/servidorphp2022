<?php

    class ControladorParte {       

        /**
         * Muestra todos los partes en la web principal
         */
        public static function mostrarPartes() {
            $partes = ParteBD::getPartes();
            $vistaP = new VistaParte();
            $vistaP->render($partes);
        }



    }