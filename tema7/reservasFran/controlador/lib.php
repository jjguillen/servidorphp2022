<?php
    function leerArchivo(){
        $restaurante = array();
        $fichero = file("mesas.txt");
        
        foreach($fichero as $lineas){
            $posiciones = explode(",", $lineas);
            array_push($restaurante, $posiciones);
        }

        return $restaurante;
    }
?>