<?php

var_dump($_REQUEST);


echo "javi "+$_REQUEST['edad'];
    $valores = json_decode($_REQUEST['edad']);

    $valor = $valores->nombre;
    echo '{"mensaje": "Probando...", "estado":"ok", "resultado": "'.$valor.'"}' ;




?>