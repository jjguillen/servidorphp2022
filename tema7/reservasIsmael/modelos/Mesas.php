<?php
class Mesas
{
  private $id;
  private $capacidad;
  private $estado;

  public function __contruct($id = "", $capacidad = "", $estado = "")
  {
    $this->id = $id;
    $this->capacidad = $capacidad;
    $this->estado = $estado;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of capacidad
   */
  public function getCapacidad()
  {
    return $this->capacidad;
  }

  /**
   * Set the value of capacidad
   *
   * @return  self
   */
  public function setCapacidad($capacidad)
  {
    $this->capacidad = $capacidad;

    return $this;
  }

  /**
   * Get the value of estado
   */ 
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Set the value of estado
   *
   * @return  self
   */ 
  public function setEstado($estado)
  {
    $this->estado = $estado;

    return $this;
  }
}
