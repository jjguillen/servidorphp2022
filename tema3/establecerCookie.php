<?php

    $nombre = 'miCookie';
    $valor = 'HomerSimpson';
    // El tiempo de expiración es en 30 minutos. PHP traduce la fecha al formato adecuado
    $expiracion = time() + (60 * 30);
    // Ruta y dominio
    $ruta = 'cookies/';
    $dominio = "servidor.info";
    // Sólo envía la cookie con conexión HTTPs
    $seguridad = false;
    // Cookie disponible sólo para el protocolo HTTP
    $solohttp = true;
    setcookie($nombre, $valor, $expiracion, $ruta, $dominio, $seguridad, $solohttp);
    echo "Cookie establecida";

?>
