<?php

function leerArchivo() {
    $tareas = array();

    $lineasFichero = file("tasks.txt");
    foreach($lineasFichero as $linea) {
        array_push($tareas, explode("|",$linea));
    }

    return $tareas;
}

//Función para filtrar los campos del formulario
function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}


?>