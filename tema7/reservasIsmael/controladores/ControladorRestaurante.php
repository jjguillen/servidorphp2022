<?php
class ControladorRestaurante
{
  public static function inicio()
  {
    $fechaHoy = date('Y-n-j');
    $reservas = ReservasBD::getReservasFecha($fechaHoy);
    $vista = new VistaInicio();
    $vista->render($reservas);
  }

  public static function insertarReserva()
  {
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $email = $_REQUEST['email'];
    $movil = $_REQUEST['movil'];
    $fecha = $_REQUEST['fecha'];
    $comida_cena = $_REQUEST['comida/cena'];
    $hora = $_REQUEST['hora'];
    $n_personas = $_REQUEST['n_personas'];
    $estado = $_REQUEST['estado'];
    $idMesa = ControladorRestaurante::mesas();
    if ($idMesa == "x") {
      //Si no hay mesas te devuelve al inicio
      header("Location: enrutador.php?accion=inicio&error");
      exit;
    }
    ReservasBD::insertarReserva($nombre, $apellidos, $email, $movil, $fecha, $comida_cena, $hora, $n_personas, $estado, $idMesa);
  }

  public static function mesas()
  {
    $array = array();
    $posicion = 0;
    $mesasLibres = MesasBD::getMesasLibre();
    $n_personas = $_REQUEST['n_personas'];
    if ($n_personas <= 4) {
      $posicion = array_shift($mesasLibres)->getId();
      array_push($array, $posicion);
      MesasBD::ocuparMesa($posicion);
    } else if ($n_personas > 4 && $n_personas <= 8 && count($mesasLibres) >= 2) {
      $posicion = array_shift($mesasLibres)->getId();
      array_push($array, $posicion);
      MesasBD::ocuparMesa($posicion);
      $posicion = array_shift($mesasLibres)->getId();
      array_push($array, $posicion);
      MesasBD::ocuparMesa($posicion);
    } else {
      return "x";
    }
    return $array;
  }

  public static function cancelarReserva()
  {
    $id = $_REQUEST['id'];
    ReservasBD::cancelarReserva($id);
  }

  //te deberia mandar a una pagina con todos los datos de la reserva para modificarlos y enviarlos a la BD
  public static function modificarReserva()
  {
    $id = $_REQUEST['id'];
    $reserva = ReservasBD::getReservaId($id);
    $vistaM = new VistaModificar();
    $vistaM->render($reserva);
  }

  //Esta funcion es la que recoge y aplica los cambios de modificarReserva
  public static function modificacion()
  {
    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre'];
    $apellidos = $_REQUEST['apellidos'];
    $email = $_REQUEST['email'];
    $movil = $_REQUEST['movil'];
    $fecha = $_REQUEST['fecha'];
    $comida_cena = $_REQUEST['comida/cena'];
    $hora = $_REQUEST['hora'];
    $n_personas = $_REQUEST['n_personas'];
    $estado = $_REQUEST['estado'];
    ReservasBD::modificarReserva($id, $nombre, $apellidos, $email, $movil, $fecha, $comida_cena, $hora, $n_personas, $estado);
  }

  public static function buscarFecha()
  {
    $fecha = $_REQUEST['fecha'];
    $reservas = ReservasBD::getReservasFecha($fecha);
    $vista = new VistaFecha();
    $vista->render($reservas);
  }
}
