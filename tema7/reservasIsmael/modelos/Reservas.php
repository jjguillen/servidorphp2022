<?php
class Reservas
{
  private $id;
  private $nombre;
  private $apellidos;
  private $email;
  private $movil;
  private $fecha;
  private $comida_cena;
  private $hora;
  private $n_personas;
  private $estado;
  private $idMesa;

  public function __construct($id = "", $nombre = "", $apellidos = "", $email = "", $movil = "", $fecha = "", $comida_cena = "", $hora = "", $n_personas = "", $estado = "")
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->email = $email;
    $this->movil = $movil;
    $this->fecha = $fecha;
    $this->comida_cena = $comida_cena;
    $this->hora = $hora;
    $this->n_personas = $n_personas;
    $this->estado = $estado;
    $this->idMesa = array();
    $this->ocuparMesa();
  }

  /**
   * Tiene que hacer una llamada a la MesaBD, y quedarse con los disponibles
   * Luego coger la/s mesas que necesite y poner las que coga en ocupada
   */
  public function ocuparMesa()
  {
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of nombre
   */ 
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */ 
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of apellidos
   */ 
  public function getApellidos()
  {
    return $this->apellidos;
  }

  /**
   * Set the value of apellidos
   *
   * @return  self
   */ 
  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of movil
   */ 
  public function getMovil()
  {
    return $this->movil;
  }

  /**
   * Set the value of movil
   *
   * @return  self
   */ 
  public function setMovil($movil)
  {
    $this->movil = $movil;

    return $this;
  }

  /**
   * Get the value of fecha
   */ 
  public function getFecha()
  {
    return $this->fecha;
  }

  /**
   * Set the value of fecha
   *
   * @return  self
   */ 
  public function setFecha($fecha)
  {
    $this->fecha = $fecha;

    return $this;
  }

  /**
   * Get the value of comida_cena
   */ 
  public function getComida_cena()
  {
    return $this->comida_cena;
  }

  /**
   * Set the value of comida_cena
   *
   * @return  self
   */ 
  public function setComida_cena($comida_cena)
  {
    $this->comida_cena = $comida_cena;

    return $this;
  }

  /**
   * Get the value of hora
   */ 
  public function getHora()
  {
    return $this->hora;
  }

  /**
   * Set the value of hora
   *
   * @return  self
   */ 
  public function setHora($hora)
  {
    $this->hora = $hora;

    return $this;
  }

  /**
   * Get the value of n_personas
   */ 
  public function getN_personas()
  {
    return $this->n_personas;
  }

  /**
   * Set the value of n_personas
   *
   * @return  self
   */ 
  public function setN_personas($n_personas)
  {
    $this->n_personas = $n_personas;

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

  /**
   * Get the value of idMesa
   */ 
  public function getIdMesa()
  {
    return $this->idMesa;
  }
}
