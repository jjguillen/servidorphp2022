<?php

    class ControladorRegalo {       


        public static function mostrarInicio() {
            $vistaR = new VistaRegalo();
            $vistaR->render("");
        }


        public static function mostrarRegalos() {

            $regalos = RegaloBD::getRegalos();
            $vistaR = new VistaRegalo();
            $vistaR->renderRegalos($regalos);
        }


        public static function borrarRegalo() {
            $id = filtrado($_REQUEST['id']);
            RegaloBD::borrarRegalo($id);

            ControladorRegalo::mostrarRegalos();
        }


        public static function nuevoRegaloForm() {
            $vistaFN = new VistaRegaloForm();
            $vistaFN->render("");
        }

        public static function insertarRegalo() {
            $regalo['nombre'] = filtrado($_REQUEST['nombre']);
            $regalo['destinatario'] = filtrado($_REQUEST['destinatario']);
            $regalo['precio'] = filtrado($_REQUEST['precio']);
            $regalo['estado'] = filtrado($_REQUEST['estado']);
            
            $regaloObject = new Regalo(0,$regalo['nombre'],$regalo['destinatario'],$regalo['precio'], $regalo['estado']);
            RegaloBD::insertarRegalo($regaloObject);
            ControladorRegalo::mostrarRegalos();
        }

        

    }







?>