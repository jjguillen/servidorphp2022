<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Galería (subir archivos)</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Sobre</h4>
              <p class="text-muted">Ejemplo clase Subir archivos al servidor</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contacto</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Email</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Album</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">GALERÍA PORTADA DISCOS</h1>
          <p class="lead text-muted">Galería con portadas de discos</p>
          <p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Subir nueva portada
            </button>            
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">

<?php
  $directorio = './portadas';
  $portadas  = scandir($directorio);
  foreach($portadas as $portada) {
    //Quitamos el . y el ..
    if ((strcmp($portada,".")!=0) && (strcmp($portada,"..")!=0)) {
      
?>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="./portadas/<?=$portada?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Portada</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="./portadas/<?=$portada?>"><button type="button" class="btn btn-sm btn-outline-secondary">Ver</button></a>
                    </div>
                    <small class="text-muted">Rock</small>
                  </div>
                </div>
              </div>
            </div>
           
<?php
    //Cierro if
    }
  
  //Cierro foreach
  }            
?>

          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Subir portada</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="controlador.php" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="titulo" class="form-label">Título del disco</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
              </div>
              <div class="mb-3">
                <label for="year" class="form-label">Año del disco</label>
                <input type="number" class="form-control" id="year" name="year">
              </div>
              <div class="mb-3">
                <label for="imagen" class="form-label">Portada del disco</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
              </div>
              
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

            </form>      
      

    </div>
  </div>
</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
  </body>
</html>
