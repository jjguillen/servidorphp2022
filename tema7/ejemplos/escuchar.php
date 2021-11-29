<?php

var_dump($_REQUEST);
    $valores = json_decode($_REQUEST['nombre']);

    $valor = $valores->nombre;
    echo '{"mensaje": "Probando...", "estado":"ok", "resultado": "'.$valor.'"}' ;




?>