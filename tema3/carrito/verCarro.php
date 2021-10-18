<?php
session_start();
//session_destroy();

include ('lib/lib.php');
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


  <div class="album py-5 bg-light">
    <div class="container">

        <table class="table">
            <thead class="table-dark">
                <tr>
                    <td>Nombre</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Subtotal</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>

<?php
    if (isset($_SESSION['carrito'])) {
        foreach($_SESSION['carrito'] as $key => $producto) {
            //Sacar datos de el producto con ese id
            $datos = buscar($producto['id'],$productos);

            echo "<tr>";
            echo "  <td>{$datos[0]}</td>";
            echo "  <td>{$producto['cant']}</td>";
            echo "  <td>{$datos[1]}€</td>";
            echo "  <td>".$producto['cant'] * $datos[1]."€</td>";
            echo "  <td><a href='controlador.php?accion=borrar&id=".$producto['id']."'>";
            echo "
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
            <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
            </svg>        
            ";
            echo "      </a></td>";
            echo "</tr>";
?>
       

<?php
        }
    }
?>            
            </tbody>
        </table>

      
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


