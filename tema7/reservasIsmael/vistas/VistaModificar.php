<?php
class VistaModificar extends Vista
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render($reserva)
  {
    $this->html .= '
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Reservas</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
      <div class="container">
        <div class="row">
        <h1>Modificando La Reserva De ' . $reserva[0]->getNombre() . '</h1>
        </div>
        <form action="enrutador.php" method="post">
        <div class="row">
          <div class="col">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="' . $reserva[0]->getNombre() . '">
          </div>
        </div>
        <div class="row">
         <div class="col">
          <label for="apellidos">Apellidos</label>
          <input type="text" name="apellidos" class="form-control" value="' . $reserva[0]->getApellidos() . '">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="' . $reserva[0]->getEmail() . '">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="movil">
            <input type="number" name="movil" class="form-control" value="' . $reserva[0]->getMovil() . '">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="' . $reserva[0]->getFecha() . '">
          </div>
        </div>
        <div class="row">
          <div class="col">
          <label for="comida/cena" class="col-sm-2 col-form-label">Comida/Cena</label>
          <select class="form-select col-sm-8" id="estado" name="comida/cena">
            <option selected value="comida">Comida</option>
            <option value="cena">Cena</option>
          </select>
          </div>
        </div>
        <div class="row">
          <div class="form-group row">
                <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                <select class="form-select col-sm-8" id="hora" name="hora">
                  <option selected value="14:00">14:00</option>
                  <option value="14:10">14:10</option>
                  <option value="14:20">14:20</option>
                  <option value="14:30">14:30</option>
                  <option value="14:40">14:40</option>
                  <option value="14:50">14:50</option>
                  <option value="21:00">21:00</option>
                  <option value="21:10">21:10</option>
                  <option value="21:20">21:20</option>
                  <option value="21:30">21:30</option>
                  <option value="21:40">21:40</option>
                  <option value="21:50">21:50</option>
                </select>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="personas">Nº Personas</label>
            <input type="number" class="form-control" name="n_personas" value="' . $reserva[0]->getN_personas() . '">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="estado" class="col-sm-2 col-form-label">Estado</label>
            <select class="form-select col-sm-8" id="estado" name="estado">
              <option selected value="confirmada">Confirmada</option>
              <option value="cancelada">Cancelada</option>
              <option value="finalizada">Finalizada</option>
            </select>
          </div>
          <input type="hidden" name="id" value="' . $reserva[0]->getId() . '">
          <input type="hidden" name="accion" value="modificacion">
        </div>
        <div class="row">
          <div class="col-2">
            <input type="submit" class="btn btn-dark" value="Enviar">
          </div>
        </div>
        </form>
      </div>
    </body>
  </html>
    ';
    echo $this->html;
  }
}
