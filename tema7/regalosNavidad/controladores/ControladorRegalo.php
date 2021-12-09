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

        public static function buscarRegalo() {
            $texto = filtrado($_REQUEST['texto']);
            $regalos = RegaloBD::getRegalosBusqueda($texto);
            $vistaR = new VistaRegalo();
            $vistaR->renderRegalos($regalos);
        }

        public static function verLinks() {
            $id = filtrado($_REQUEST['id']);
            $links = LinkBD::getLinksRegalo($id);

            $regalo = RegaloBD::getRegalo($id);
            $vistaL = new VistaLinks();
            $vistaL->renderLinks($links,$regalo);
        }

        public static function borrarLink() {
            $idL = filtrado($_REQUEST['idL']);
            $idR = filtrado($_REQUEST['idR']);

            LinkBD::borrarLink($idL);

            $links = LinkBD::getLinksRegalo($idR);
            $regalo = RegaloBD::getRegalo($idR);
            $vistaL = new VistaLinks();
            $vistaL->renderLinks($links,$regalo);
            
        }

        public static function nuevoLinkForm() {
            $idR = filtrado($_REQUEST['idR']);
            $regalo = RegaloBD::getRegalo($idR);
            $vistaL = new VistaLinks();
            $vistaL->renderFormNuevoLink($regalo);
        }

        public static function insertarLink() {
            $idR = filtrado($_REQUEST['idR']);
            $regalo = RegaloBD::getRegalo($idR);

            $link['nombre'] = filtrado($_REQUEST['nombre']);
            $link['link'] = filtrado($_REQUEST['link']);
            $link['precio'] = filtrado($_REQUEST['precio']);
            $link['prioridad'] = filtrado($_REQUEST['prioridad']);
            
            $linkObject = new Link(0,$idR, $link['nombre'],$link['link'],$link['precio'], $link['prioridad']);
            LinkBD::insertarLink($linkObject);

            $links = LinkBD::getLinksRegalo($idR);
            $vistaL = new VistaLinks();
            $vistaL->renderLinks($links,$regalo);
        }
        

    }







?>