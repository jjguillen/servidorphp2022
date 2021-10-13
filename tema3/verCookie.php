<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
    include "lib.php";

    echo "Contenido miCookie encriptado <br>";
    echo $_COOKIE['miCookie'];
    echo "<br>";

    $desencriptado = desencriptar($_COOKIE['miCookie'], $method, $clave, $iv);

    echo "Contenido miCookie desencriptado <br>";
    echo $desencriptado;
    echo "<br>";

    $misJuegos = explode("|", $desencriptado);



?>

</body>
</html>

