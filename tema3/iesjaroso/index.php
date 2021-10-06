<?php
    session_start();
    session_destroy();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Javier">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Login - IES Jaroso Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">


    <meta name="theme-color" content="#7952b3">


    <style>
      .container {
          width: 400px;
      }

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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
    <div class="container">


        <main class="form-signin m-3">
        <form action="controlador.php" method="post">
            <img class="mb-4" src="img/iesjaroso.jpeg" alt="" width="72" height="85">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>

            <!-- Esto va a ser para decidir si estamos tratando el login o el registro 
                 desde el controlador 
            -->
            <input type="hidden" name="accion" value="login">


            <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Recuerdame
            </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary mb-1" type="submit">Login</button>
            <a href="registro.php"><button class="w-100 btn btn-lg btn-primary" type="button">Regístrate</button></a>
           
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
        </main>

    </div>
    
  </body>
</html>
