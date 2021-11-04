
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Javier Guillén">
    <title>TODOIST</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="theme-color" content="#7952b3">
    
    <!-- Custom styles for this template -->
    <link href="todoist.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TODOIST</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="nuevo.php" data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>
</header>

<main>

  <br>

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-3 mt-3">
        <div class="row">
            <label class="col col-form-label">Selecciona fecha:</label>
        </div>
        <div class="row">
            <form action='controlador.php' method='get'>
                <input type='date' name='fecha'>
                <input type="submit" value="Cambiar">
            </form>
        </div>
      </div>

      <div class="col-lg-8 mt-3">
        <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha límite</th>
            <th scope="col">Prioridad</th>
            <th scope="col">Terminar</th>
            </tr>
        </thead>
        <tbody>

        <?php
              include("lib.php");
              $tareas = leerArchivo();
              
              foreach($tareas as $tarea) {
                echo "<tr>";
                echo "<th scope='row'>{$tarea[0]}</th>";
                echo "<td>{$tarea[1]}</td>";
                echo "<td>{$tarea[2]}</td>";
                echo "<td>{$tarea[3]}</td>";
                echo "<td><a href='#'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='#31873C' class='bi bi-calendar-x' viewBox='0 0 16 16'>
                    <path d='M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z'/>
                    <path d='M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z'/>
                    </svg>";
                echo "</a></td>";
                echo "</tr>";
              }

        ?>
        </tbody>
        </table>
      </div><!-- /.col-lg-8 -->

    </div><!-- /.row -->


  </div><!-- /.container -->


</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva tarea</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      <form action='controlador.php' method='post'>

        <div class="mb-3 row">
          <div class="col-sm-3">
            <label for="desc" class="col-sm-2 col-form-label">Descripción</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="desc">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-3">
            <label for="inputPassword" class="col-sm col-form-label">Fecha final</label>
          </div>
          <div class="col-sm-9">
            <input type="date" class="form-control" name="fecha">
          </div>
        </div>
        <div class="mb-3 row">
          <div class="col-sm-3">
            <label for="prioridad" class="col-sm-2 col-form-label">Prioridad</label>
          </div>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="prioridad">
          </div>
        </div>

      </div>
      <div class="modal-footer" >
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" name='nuevaTarea'>Nueva</button>
      </div>

      </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
