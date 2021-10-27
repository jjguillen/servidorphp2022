<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>MI TIENDA</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Favicons -->
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    


<main>
<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>        

        <div class="text-end">
            
            <form action="verCarro.php" method="get">
                <button type="submit" class="btn btn-outline-light me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>
                </button>
                <label for="">
                    <?php
                        if (isset($_SESSION['carrito'])) {
                            echo count($_SESSION['carrito']);
                        }
                    ?>
                </label>
            </form>
        </div>
      </div>
    </div>
  </header>


  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">TIENDACOIN</h1>
        <p class="lead text-muted">Venta de tarjetas gráficas para minar</p>
      </div>
    </div>
  </section>

<?php
    include("./lib/lib.php");
?>



  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?php
    foreach($productos as $key => $producto) {

    
?>
        <div class="col">
          <div class="card shadow-sm">
            <img src="<?=$producto['img']?>"  width="100%" height="225">

            <div class="card-body">
              <p class="card-text"><?=$producto['nombre']?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <form action="controlador.php" method="post">
                    <input type="hidden" name='id' value="<?=$producto['id']?>">
                        <div class='form-row row'>
                            <div class="col-sm-5">
                                <button type="submit" name='comprar' class="btn btn-outline-secondary">Comprar</button>
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control input-sm" type="number" name="cantidad" value="1" min="1" max="20">
                            </div>
                        </div>
                  </form>
                </div>
                <small class="text-muted"><?=$producto['precio']?>€</small>
              </div>
            </div>
          </div>
        </div>

<?php
    }
?>            
    
        

      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Tienda de gráficas para minar. Ejercicio DWESE 2021 - IES Jaroso</p>    
  </div>
</footer>
     
  </body>
</html>
