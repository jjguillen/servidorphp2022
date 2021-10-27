<?php

    function pintarCarton($carton) {
        echo "Carton: ";
        //print_r($carton);
        foreach($carton as $valor) {
            if ($valor[1] == "X") {
                echo "<del>{$valor[0]}</del>&nbsp;";
            } else {
                echo "{$valor[0]}&nbsp;";
            }
        }
        echo "<br>";
    }

    function pintarBolas($bolas) {
        $cont = 0;
        foreach($bolas as $valor) {
            echo "{$valor}&nbsp;";
            $cont++;
            if ($cont % 10 == 0)
                echo "<br>";

        }
        echo "<br>";
    }


    function marcarBola($numero, &$array) {

        foreach($array as &$valor) { //Necesita la referencia para modificar el valor en la sesión
            //echo $valor[0];
            if ($valor[0] == $numero) {
                $valor[1] = "X";
            }
        }

    }