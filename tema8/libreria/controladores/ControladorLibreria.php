<?php

    class ControladorLibreria {       

        public static function mostrarInicio() {

            $vistaN = new VistaLibreria();
            $vistaN->render(null);
        }

        /*
        public static function mostrarNoticiasAjax() {

            $noticias = NoticiaBD::getNoticias();
            $vistaN = new VistaNoticias();
            $vistaN->renderAjax($noticias);
        }
    */
        

    }







?>