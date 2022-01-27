<?php

    $json_str = json_encode(array(
            array('nombre' => 'Javier', 'altura' => 1.82),
            array('nombre' => 'Luisa', 'altura' => 1.72)
        )
    );
    echo $json_str . "<br>";

    class Usuario {
        public $nombre = "";
        public $apellido = "";
        public $fechaNacimiento = "";
    }
    $usuario = new Usuario;
    $usuario->nombre = "Angelina";
    $usuario->apellido = "Jolie";
    $usuario->fechaNacimiento = new DateTime();
    $json_str = json_encode($usuario);
    echo $json_str. "<br>";


    $json_str = '{
        "nombre" : {
            "apellido1": "Guillen" ,
            "apellido2": "Benavente" ,
            "nombre" : "Javier"
        },
        "altura" : 1.82 ,
        "colorPelo" : "negro canoso"
    }';

    $php_obj = json_decode($json_str);
    echo $php_obj->nombre->apellido1;




?>