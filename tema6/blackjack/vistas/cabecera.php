<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>BlackJack</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

    
    <!-- Custom styles for this template -->
    <link href="heroes.css" rel="stylesheet">
  </head>
  <body>
    
<main>
  <h1 class="visually-hidden">BlackJack</h1>

 

  <div class="b-example-divider"></div>

  <div class="px-4 pt-5 my-5 text-center border-bottom">
    <h1 class="display-4 fw-bold">BLACKJACK</h1>
    <div class="col-lg-6 mx-auto">      
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
        <button type="button" id="nueva" class="btn btn-primary btn-lg px-4 me-sm-3">Nueva partida</button>
        <button type="button" id="pedir" class="btn btn-outline-secondary btn-lg px-4">Pedir Carta</button>
      </div>
    </div>
  </div>

 
  <div class="b-example-divider mb-0"></div>

  <div class="container">

    <div id="contenedor"></div>


  </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
  //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
      window.addEventListener("load" ,inicio);

      //Función que escucha los eventos
      async function inicio() {

        //Botón de fuera - Nueva partida
        document.getElementById("nueva").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion","repartirCartas"); 
          
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   

          document.getElementById("contenedor").innerHTML = await response.text(); //Lo que devuelve la Vista
        });

        //Botón de fuera - Pedir carta
        document.getElementById("pedir").addEventListener("click", async function(e) {
          const datos = new FormData(); 
          datos.append("accion","pedirCarta"); 
          
          const response = await fetch("enrutador.php", { method: 'POST', body: datos });   

          document.getElementById("contenedor").innerHTML = await response.text(); //Lo que devuelve la Vista
        });

        //Todo evento click en 'contenedor'
        document.getElementById("contenedor").addEventListener("click", async function(e) {
          let botonPlantarse = e.target.closest("button[id=plantarse]");
          if (botonPlantarse) {
            alert("Te has plantado");
          }

          let botonTerminar = e.target.closest("button[id=terminar]");
          if (botonPlantarse) {
            alert("Has terminado");
          }

          
        });

      }

  </script>
  </body>
</html>
