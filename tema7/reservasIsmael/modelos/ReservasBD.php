<?php
class ReservasBD
{
  public static function getReservas()
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("SELECT * FROM reservas");
    $stmt->execute();

    //Se formatean a objetos reservas
    $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reservas");

    $conexion = ConexionBD::cerrar();

    return $reservas;
  }

  //Saca las reservas que coincidan con la fecha
  public static function getReservasFecha($fecha)
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("SELECT * FROM reservas WHERE fecha=?");
    $stmt->bindValue(1, $fecha);
    $stmt->execute();

    //Se formatean a objetos mesa
    $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reservas");

    $conexion = ConexionBD::cerrar();

    return $reservas;
  }

  //Saca las reservas que coincidan con la id 
  public static function getReservaId($id)
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("SELECT * FROM reservas WHERE id=?");
    $stmt->bindValue(1, $id);
    $stmt->execute();

    //Se formatean a objetos mesa
    $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Reservas");

    $conexion = ConexionBD::cerrar();

    return $reservas;
  }

  /**
   * Al actualizarse si se cambian las personas que van a ir deben ocuparse mas mesas o liberarse dependiendo del cambio producido
   */
  public static function modificarReserva($id, $nombre, $apellidos, $email, $movil, $fecha, $comida_cena, $hora, $n_personas, $estado)
  {
    $conexion = ConexionBD::conectar("reservasIsmael");

    $stmt = $conexion->prepare("UPDATE reservas SET nombre=?, apellidos=?, email=?, movil=?, fecha=?, comida_cena=?, hora=?, n_personas=?, estado=? WHERE id=?");
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $apellidos);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $movil);
    $stmt->bindValue(5, $fecha);
    $stmt->bindValue(6, $comida_cena);
    $stmt->bindValue(7, $hora);
    $stmt->bindValue(8, $n_personas);
    $stmt->bindValue(9, $estado);
    $stmt->bindValue(10, $id);
    $stmt->execute();

    $conexion = ConexionBD::cerrar();
  }

  //ocupa las mesas que necesite
  public static function insertarReserva($nombre, $apellidos, $email, $movil, $fecha, $comida_cena, $hora, $n_personas, $estado, $idMesa)
  {
    $conexion = ConexionBD::conectar("reservasIsmael");

    $stmt = $conexion->prepare("INSERT INTO reservas (nombre, apellidos, email, movil, fecha, comida_cena, hora, n_personas, estado, idMesa) VALUES (?,?,?,?,?,?,?,?,?, ?)");
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $apellidos);
    $stmt->bindValue(3, $email);
    $stmt->bindValue(4, $movil);
    $stmt->bindValue(5, $fecha);
    $stmt->bindValue(6, $comida_cena);
    $stmt->bindValue(7, $hora);
    $stmt->bindValue(8, $n_personas);
    $stmt->bindValue(9, $estado);
    $stmt->bindValue(10, implode($idMesa));
    $stmt->execute();

    $conexion = ConexionBD::cerrar();
  }

  //Deberia de liberar las mesas ocupadas
  public static function cancelarReserva($id)
  {
    $conexion = ConexionBD::conectar("reservasIsmael");

    $stmt = $conexion->prepare("UPDATE reservas SET estado=? WHERE id=?");
    $stmt->bindValue(1, "cancelado");
    $stmt->bindValue(2, $id);
    $stmt->execute();

    $conexion = ConexionBD::cerrar();
  }
}
