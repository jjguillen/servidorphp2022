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
            <h1 class="h3 mb-3 fw-normal">Registro</h1>

            <div class="form-floating">
            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
            <input type="text" name="nombre" class="form-control" id="floatingNombre" placeholder="Nombre">
            <label for="floatingNombre">Nombre</label>
            </div>
            <div class="form-floating">
            <input type="text" name="ciudad" class="form-control" id="floatingCiudad" placeholder="Ciudad">
            <label for="floatingCiudad">Ciudad</label>
            </div>
            <div class="form-floating">
            <input type="text" name="estado" class="form-control" id="floatingEstado" placeholder="Estado">
            <label for="floatingEstado">Interino o Funcionario</label>
            </div>
            <div class="form-floating">
              <select class="form-select" name="especialidad" aria-label="Default select example">
                  <option value="lengua">Lengua</option>
                  <option value="matematicas">Matemáticas</option>
                  <option value="fisica">Física</option>
                  <option value="ingles">Inglés</option>
                  <option value="informatica">Informática</option>

              </select>
            </div>

            <!-- Esto va a ser para decidir si estamos tratando el login o el registro 
                 desde el controlador 
            -->
            <input type="hidden" name="accion" value="registro">

            <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Registrar</button>
            <a href="registro.php"><button class="w-100 btn btn-lg btn-primary" type="reset">Limpiar</button></a>
           
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
        </main>

    </div>
    
  </body>
</html>
