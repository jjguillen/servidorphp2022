<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>


    <div class="container-fluid">

    <?php

        //Función para filtrar los campos del formulario
        function filtrado($datos){
            $datos = trim($datos); // Elimina espacios antes y después de los datos
            $datos = stripslashes($datos); // Elimina backslashes \
            $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
            return $datos;
        }


        //Si se ha mandado los datos del formulario, recoge los datos
        //$_REQUEST funciona igual si es GET o POST
        //Si no hay que usar $_GET o $_POST
        if ($_REQUEST) {
            echo "<h2>Datos recibidos</h2>";
            if (isset($_REQUEST['email'])) {
                echo "Email: ".filtrado($_REQUEST['email']) . "<br>";
            }

            if (isset($_REQUEST['password'])) {
                echo "Password: ".filtrado($_REQUEST['password']) . "<br>";
            }     
            
            if (isset($_REQUEST['edad'])) {
                echo "Edad: ".filtrado($_REQUEST['edad']) . "<br>";
            }  

            if (isset($_REQUEST['linux'])) {
                echo "Conocimientos Linux (1 al 10): ".$_REQUEST['linux'] . "<br>";
            }  

            if (isset($_REQUEST['lenguaje'])) {
                echo "Lenguaje: ".$_REQUEST['lenguaje'] . "<br>";
            }  

            if (isset($_REQUEST['opciones'])) {
                foreach($_REQUEST['opciones'] as $opcion)
                    echo "Opción: ".$opcion . "<br>";
            }  

            if (isset($_REQUEST['trabajos'])) {
                foreach($_REQUEST['trabajos'] as $trabajo)
                    echo "Trabajo: ".$trabajo . "<br>";
            }  

            if (isset($_REQUEST['comentarios'])) {
                echo "Comentarios: ".filtrado($_REQUEST['comentarios']) . "<br>";
            }

        } else {  //Pintar el formulario
    ?>


        <h2>Formulario PHP</h2>

        <form action="getPost.php" method="post">

                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name='email' id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlPass1" class="form-label">Password</label>
                    <input type="password" class="form-control" name='password' id="exampleFormControlPass1">
                </div>
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlNumber1" class="form-label">Edad</label>
                    <input type="number" class="form-control" name='edad' id="exampleFormControlNumber1">
                </div>
                <div class="mb-3 col-md-6">                    
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name='lenguaje' value='Java'>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Java
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name='lenguaje' value='Python'>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Python
                        </label>
                    </div>
                </div>
                <div class="mb-3 col-md-6">
                    <select class="form-select" name="opciones[]" multiple aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>     
                </div>           
                <div class="mb-3 col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" name="trabajos[]" type="checkbox" value="Videojuegos" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Videojuegos
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="trabajos[]" type="checkbox" value="Programación Web" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Programación Web
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="trabajos[]" type="checkbox" value="Programación Java" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                            Programación Web
                        </label>
                    </div>
                </div>
                
                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlRange1" class="form-label">Conocimientos Linux</label>
                    <input type="range" class="form-control" name='linux' min="0" max="10" id="exampleFormControlRange1">
                </div>

                <div class="mb-3 col-md-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Comentarios</label>
                    <textarea class="form-control" name='comentarios' id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3 col-md-6">
                    <input type="submit" value="Enviar">
                </div>
        </form>

    <?php
        }
    ?>
    
    </div>

</body>
</html>