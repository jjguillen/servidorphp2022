<?php

header('Content-Type: application/json; charset=utf-8');

//Ejemplo GET api sin key
$url = "http://alpha-meme-maker.herokuapp.com/memes/22";
$resultado = file_get_contents($url, false);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}

//echo $resultado;


// Crear opciones de la petición HTTP
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "GET"
        //"content" => http_build_query($datos), # Agregar el contenido definido antes
    ),
);
# Preparar petición
$contexto = stream_context_create($opciones);
# Hacerla
$resultado = file_get_contents($url, false, $contexto);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}
echo $resultado;

/*
$url = "https://httpbin.org/post";
// Los datos de formulario
$datos = [
    "nombre" => "Luis Cabrera Benito",
    "web" => "https://parzibyte.me/blog",
];
// Crear opciones de la petición HTTP
$opciones = array(
    "http" => array(
        "header" => "Content-type: application/x-www-form-urlencoded\r\n",
        "method" => "POST",
        "content" => http_build_query($datos), # Agregar el contenido definido antes
    ),
);
# Preparar petición
$contexto = stream_context_create($opciones);
# Hacerla
$resultado = file_get_contents($url, false, $contexto);
if ($resultado === false) {
    echo "Error haciendo petición";
    exit;
}

# si no salimos allá arriba, todo va bien
var_dump($resultado);
*/



















?>