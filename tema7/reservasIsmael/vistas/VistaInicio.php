<?php
class VistaInicio
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render($reservas)
  {
    $fechaHoy = date('Y-n-j');
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
      <div class="container-fluid">
        <div class="row mt-3 ms-4">
          <div class="col-4" id="fecha">
            <h3>Selecciona la fecha</h3>
            <form action="enrutador.php" method="post">
            <input type="date" id="fecha" name="fecha" value="' . $fechaHoy . '">
            <input type="hidden" name="accion" value="buscar">
            <button type="submit" class="btn btn-dark">Buscar</button>
          </form>
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#añadirReserva">Nueva Reserva</button>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col" id="muestrario">
            <table class="table table-hover">
              <thead>
                <tr>
                  <td>Nombre</td>
                  <td>Apellidos</td>
                  <td>Email</td>
                  <td>Movil</td>
                  <td>Fecha</td>
                  <td>Comida/Cena</td>
                  <td>Hora</td>
                  <td>Personas</td>
                  <td>Estado</td>
                  <td>Acciones</td>
                </tr>
              </thead>
            <tbody>
';
    foreach ($reservas as $reserva) {
      $this->html .= '
              <tr>
                <td>' . $reserva->getNombre() . '</td>
                <td>' . $reserva->getApellidos() . '</td>
                <td>' . $reserva->getEmail() . '</td>
                <td>' . $reserva->getMovil() . '</td>
                <td>' . $reserva->getFecha() . '</td>
                <td>' . $reserva->getComida_cena() . '</td>
                <td>' . $reserva->getHora() . '</td>
                <td>' . $reserva->getN_personas() . '</td>
                <td>' . $reserva->getEstado() . '</td>
                <td>
                  <a href="enrutador.php?accion=modificarReserva&id=' . $reserva->getId() . '"><button type="button" class="btn btn-secondary">Modificar</button></a>
                  <a href="enrutador.php?accion=cancelarReserva&id=' . $reserva->getId() . '"><button type="button" class="btn btn-secondary">Cancelar</button></a>
                </td>
              </tr>
      ';
    }
    $this->html .= '
            </tbody>
          </table>
          </div>
        <div>
      </div>


      <!-- Modal AÑADIR RESERVA-->
      <div class="modal fade" id="añadirReserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLabel">Insertar Regalo</h3>
            </div>
            <div class="modal-body">
            <form action="enrutador.php" method="post">
                <div class="form-group row">
                  <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="apellidos" class="col-sm-2 col-form-label">Apellidos</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                  </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="email" name="email">
                </div>
              </div>
              <div class="form-group row">
                <label for="movil" class="col-sm-2 col-form-label">Movil</label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="movil" name="movil">
                </div>
              </div>
              <div class="form-group row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-8">
                  <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
              </div>
              <div class="form-group row">
                <label for="comida/cena" class="col-sm-2 col-form-label">Comida/Cena</label>
                <select class="form-select col-sm-8" id="estado" name="comida/cena">
                  <option selected value="comida">Comida</option>
                  <option value="cena">Cena</option>
                </select>
              </div>
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
              <div class="form-group row">
                <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                <select class="form-select col-sm-8" id="estado" name="estado">
                  <option selected value="confirmada">Confirmada</option>
                  <option value="cancelada">Cancelada</option>
                  <option value="finalizada">Finalizada</option>
                </select>
              </div>
              <div class="form-group row">
                <label for="personas">Nº Personas</label>
                <input type="number" name="n_personas" class="form-control">
              </div>
            </div>

            <input type="hidden" name="accion" value="nuevaReserva">

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="accion" value="nuevaReserva" class="btn btn-dark">Guardar</button>
            </div>
            </form>
            <!--Cerrar form -->
          </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
    </html>
    ';
    echo $this->html;
  }
}
