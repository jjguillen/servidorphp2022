<?php

 //Función para filtrar los campos del formulario
 function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}


    if ($_GET) {
        if (isset($_GET['insertar'])) {
            $nombre = filtrado($_GET['nombre']);
            $apellidos = filtrado($_GET['apellidos']);
            $email = filtrado($_GET['email']);
            $movil = filtrado($_GET['movil']);

            //Calcular id

            $contacto = "#4|".$nombre."|".$apellidos."|".$email."|".$movil;
            file_put_contents("agenda.txt",$contacto,FILE_APPEND | LOCK_EX);
            header("Location: agenda.php");
            exit;
        }
    }



?>