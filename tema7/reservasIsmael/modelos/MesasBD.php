<?php
class MesasBD
{
  /**
   * Obtiene las mesas de la BD
   */
  public static function getMesas()
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("SELECT * FROM mesas");
    $stmt->execute();

    //Se formatean a objetos mesa
    $mesas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Mesas");

    $conexion = ConexionBD::cerrar();

    return $mesas;
  }

  public static function getMesasLibre()
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("SELECT * FROM mesas WHERE estado=?");
    $stmt->bindValue(1, "disponible");
    $stmt->execute();

    //Se formatean a objetos mesa
    $mesas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Mesas");

    $conexion = ConexionBD::cerrar();

    return $mesas;
  }

  public static function ocuparMesa($id)
  {
    //Abrir conexion
    $conexion = ConexionBD::conectar("reservasIsmael");

    //Consulta
    $stmt = $conexion->prepare("UPDATE mesas SET estado=? WHERE id=?");
    $stmt->bindValue(1, "ocupado");
    $stmt->bindValue(2, $id);
    $stmt->execute();

    $conexion = ConexionBD::cerrar();
  }
}
