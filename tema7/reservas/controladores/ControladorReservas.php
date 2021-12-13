<?php

    class ControladorReservas {       


        public static function mostrarInicio() {
            $vistaR = new VistaReservas();
            $vistaR->render(""); //Carga la página
        }

        public static function mostrarReservas() {
            $fecha =  date('y-m-d');
            $reservas = ReservaBD::getReservas($fecha);
            
            $vistaR = new VistaReservas();
            $vistaR->renderReservas($reservas); //Carga la página
        }

        public static function mostrarReservasDia() {
            $fecha = filtrado($_REQUEST['fecha']);
            $reservas = ReservaBD::getReservas($fecha);
            
            $vistaR = new VistaReservas();
            $vistaR->renderReservas($reservas); //Carga la página
        }

        public static function mostrarReservasFiltro() {
            $texto = filtrado($_REQUEST['texto']);
            $fecha = filtrado($_REQUEST['fecha']);
            $reservas = ReservaBD::getReservasFiltro($fecha,$texto);
            
            $vistaR = new VistaReservas();
            $vistaR->renderReservas($reservas); //Carga la página
        }

        public static function cancelarReserva() {
            $idReserva = filtrado($_REQUEST['id']);
            $fecha = filtrado($_REQUEST['fecha']);

            ReservaBD::cancelarReserva($idReserva);

            $reservas = ReservaBD::getReservas($fecha);
            $vistaR = new VistaReservas();
            $vistaR->renderReservas($reservas); //Carga la página
        }

        public static function nuevaReserva() {
            $reserva['nombre'] = filtrado($_REQUEST['nombre']);
            $reserva['email'] = filtrado($_REQUEST['email']);
            $reserva['movil'] = filtrado($_REQUEST['movil']);
            $reserva['fecha'] = filtrado($_REQUEST['fecha']);
            $reserva['turno'] = filtrado($_REQUEST['turno']);
            $reserva['hora'] = filtrado($_REQUEST['hora']);
            $reserva['npersonas'] = filtrado($_REQUEST['npersonas']);

            //Comrpobar que se puede hacer la reserva
            $reserva['idMesa'] = ReservaBD::checkReserva($reserva);
            if ($reserva['idMesa'] < 10)
                $sePuede = true;
            else
                $sePuede = false;

            //Si se puede, hay disponibilidad, hacemos la reserva
            if ($sePuede) {
                //Le sumo 1 al número de reservas que hay para dar la mesa siguiente
                $reserva['idMesa'] = $reserva['idMesa'] + 1;
                ReservaBD::insertarReserva($reserva);

                $reservas = ReservaBD::getReservas($reserva['fecha']);
                $vistaR = new VistaReservas();
                $vistaR->renderReservas($reservas); //Carga la página
            } else {
                echo "No se pudo hacer la reserva, todo ocupado en ese turno de comidas para ese día";
                $reservas = ReservaBD::getReservas($reserva['fecha']);
                $vistaR = new VistaReservas();
                $vistaR->renderReservas($reservas); //Carga la página
            }
        }

      

       

    }







?>