<?php
session_start();
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

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">TIENDACOIN</h1>
        <p class="lead text-muted">Venta de tarjetas gráficas para minar</p>
      </div>
    </div>
  </section>

<?php
    include ('lib/lib.php');
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
                        <div class="form-group row">
                            <div class="col-3">
                                <button type="submit" name='comprar' class="btn btn-outline-secondary">Comprar</button>
                            </div>
                            <div class="col-3">
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
