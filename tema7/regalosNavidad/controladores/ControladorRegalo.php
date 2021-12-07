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
            $vistaFN->render(null);
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

        public static function editarRegaloForm() {
            $id = filtrado($_REQUEST['id']);
            $regalo = RegaloBD::getRegalo($id);
            $vistaFN = new VistaRegaloForm();
            $vistaFN->render($regalo);
        }

        public static function modificarRegalo() {
            $id = filtrado($_REQUEST['id']);
            $regalo['nombre'] = filtrado($_REQUEST['nombre']);
            $regalo['destinatario'] = filtrado($_REQUEST['destinatario']);
            $regalo['precio'] = filtrado($_REQUEST['precio']);
            $regalo['estado'] = filtrado($_REQUEST['estado']);

            $regaloObject = new Regalo($id,$regalo['nombre'],$regalo['destinatario'],$regalo['precio'], $regalo['estado']);
            RegaloBD::modificarRegalo($regaloObject);
            ControladorRegalo::mostrarRegalos();
        }

        

    }







?>