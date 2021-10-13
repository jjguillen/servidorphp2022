<?php
    include "lib.php";

    //Si has pinchado en una imagen, creas la cookie
    if ($_GET) {
        //Comprobar si hemos pinchado en Lol o en Dota2
        $valor="";
        if (strcmp($_GET['juego'],"lol") == 0) {
            if (isset($_COOKIE['miCookie'])) {
                $desencriptado = desencriptar($_COOKIE['miCookie'], $method, $clave, $iv);
                if (!str_contains($desencriptado,"1")) {
                    $valor = $desencriptado . "|" . "1";
                } else {
                    $valor = $desencriptado;
                }
            } else {
                $valor = "1";
            }
                      
        } else if (strcmp($_GET['juego'],"dota2") == 0) {
            if (isset($_COOKIE['miCookie'])) {
                $desencriptado = desencriptar($_COOKIE['miCookie'], $method, $clave, $iv);
                if (!str_contains($desencriptado,"2")) {
                    $valor = $desencriptado . "|" . "2";
                } else {
                    $valor = $desencriptado;
                }
            } else {
                $valor = "2";
            }      

        } else if (strcmp($_GET['juego'],"wow") == 0) {
            if (isset($_COOKIE['miCookie'])) {
                $desencriptado = desencriptar($_COOKIE['miCookie'], $method, $clave, $iv);
                if (!str_contains($desencriptado,"3")) {
                    $valor = $desencriptado . "|" . "3";
                } else {
                    $valor = $desencriptado;
                }
            } else {
                $valor = "3";
            }       
        }

        //Encriptar contenido
        $valor = encriptar($valor,$method, $clave, $iv);

        $nombre = 'miCookie';
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
        //echo $nombre.",".$valor.",".$expiracion.",".$ruta.",".$dominio;
        //echo "JJ".$valor;        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="establecerCookie.php?juego=dota2"><img src="imgs/dota2.jpg" alt="" width="200"></a>
    <a href="establecerCookie.php?juego=lol"><img src="imgs/lol.jpg" alt="" width="200"></a>
    <a href="establecerCookie.php?juego=wow"><img src="imgs/wow.jpg" alt="" width="200"></a>


</body>
</html>





