<?php


if (isset($_REQUEST['accion'])) {
    //ACCIONES --------------------------

    //VerFormulario
    if ($_REQUEST['accion'] == "verFormulario") {
        $valor = $_REQUEST['nombre'];
        echo '{"estado":"ok", "nombre": "'.$_REQUEST['nombre'].'", "edad": "'.$_REQUEST['edad'].'"}' ;
    }

    //Pulsar botón
    if ($_REQUEST['accion'] == "pulsarBoton") {
        echo 'Has pulsado este botón';
    }

}




?>