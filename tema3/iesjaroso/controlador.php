<?php
    session_start();

    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    //Has recibido un formulario o bien el login o el registro
    if ($_POST) {

        //Vemos qué acción tenemos que tratar
        if (isset($_POST['accion'])) {
            //Login
            if ($_POST['accion'] == "login") {
                //Leer valor del email
                if (isset($_POST['email'])) {
                    $email = filtrado($_POST['email']);                    
                }
                //Leer valor de la contraseña
                if (isset($_POST['password'])) {
                    $password = filtrado($_POST['password']);                    
                }

                //echo "El email es: ".$email."<br>";
                //echo "La contraseña es: ".$password."<br>";

                //Metemos en la sesión el usuario registrado
                $_SESSION['usuario'] = $email;

                //Metemos todos los alumnos en la sesión
                $_SESSION['alumnos'] = array(

                    array("nombre" => "Ismael", "apellidos" => "García Flores", "edad" => "30", 
                          "dni" => "48419851L", "email" => "ismagf@gmail.com", "localidad" => "vera",
                          "telefono" => "686548774", "curso" => "1DAW", "avatar" => ""),
                    array("nombre" => "Luis", "apellidos" => "Flores Martín", "edad" => "32", 
                          "dni" => "48418851A", "email" => "luisito@gmail.com", "localidad" => "vera",
                          "telefono" => "686548775", "curso" => "1DAW", "avatar" => ""),
                    array("nombre" => "Sonia", "apellidos" => "Martín", "edad" => "20", 
                          "dni" => "48492155G", "email" => "soniam@gmail.com", "localidad" => "garrucha",
                          "telefono" => "666555111", "curso" => "1DAW", "avatar" => ""),
                    array("nombre" => "Ana", "apellidos" => "García", "edad" => "19", 
                          "dni" => "41456780A", "email" => "anag@gmail.com", "localidad" => "mojacar",
                          "telefono" => "677999555", "curso" => "1DAW", "avatar" => ""),
                );


                //En el tema BBDD comprobaremos que es correcta la información

                //Por ahora redirigimos a home.php
                header("Location: home.php"); 
                exit;
            } 

            //Registro
            if ($_POST['accion'] == "registro") {
                //Leer valor del email
                if (isset($_POST['email'])) {
                    $email = filtrado($_POST['email']);                    
                }
                //Leer valor de la contraseña
                if (isset($_POST['password'])) {
                    $password = filtrado($_POST['password']);                    
                }
                //Leer valor del nombre
                if (isset($_POST['nombre'])) {
                    $nombre = filtrado($_POST['nombre']);                    
                }
                //Leer valor de la ciudad
                if (isset($_POST['ciudad'])) {
                    $ciudad = filtrado($_POST['ciudad']);                    
                }
                 //Leer valor del estado
                 if (isset($_POST['estado'])) {
                    $estado = filtrado($_POST['estado']);                    
                }
                //Leer valor de la especialidad
                if (isset($_POST['especialidad'])) {
                    $especialidad = filtrado($_POST['especialidad']);                    
                }

                //echo "El email es: ".$email."<br>";
                //echo "El password es: ".$password."<br>";
                //echo "El nombre es: ".$nombre."<br>";
                //echo "El ciudad es: ".$ciudad."<br>";
                //echo "El estado es: ".$estado."<br>";
                //echo "El especialidad es: ".$especialidad."<br>";

                //Si no existe ya ese email en BBDD, lo insertaríamos


                //Por ahora redirigimos a home.php (para que funcione quitar echos de antes)
                header("Location: home.php"); 
                exit;

            } 


        }

    }


    //Acciones de alumnos y cursos
    if ($_GET) {
        //Ver qué acción se ha elegido
        if (isset($_GET['accion'])) {
            //Acción borrar alumno
            if ($_GET['accion'] == "borrarAlumno") {
                $email = filtrado($_GET['email']);

                //Borramos alumno de la sesión
                //Lo buscamos en el array
                $alumnosAux = $_SESSION['alumnos'];
                foreach($alumnosAux as $alumno) {
                    if (strcmp($email,$alumno['email']) == 0) {
                        //Borrar
                        unset($alumno['email']);
                    }
                }
                $_SESSION['alumnos'] = array_values($alumnosAux);


                //Ir a BBDD y borrar ese alumno

                //Por ahora redirigimos a alumnos.php después de borrar un alumno
                header("Location: alumnos.php"); 
                exit;
            }

        }




    }


?>