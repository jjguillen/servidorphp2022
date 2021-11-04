<?php

function leerArchivo() {
    $tareas = array();

    $lineasFichero = file("tasks.txt");
    foreach($lineasFichero as $linea) {
        array_push($tareas, explode("|",$linea));
    }

    return $tareas;
}


?>