<?php

// Crear un flujo
$opciones = array(
    'http'=>array(
      'method'=>"GET",
      'header'=>"Accept-language: en\r\n" .
                "Cookie: foo=bar\r\n"
    )
  );
  
  $contexto = stream_context_create($opciones);
  
    $web = file_get_contents("https://www.php.net/manual/es/",false,$contexto);
    file_put_contents("twich.html",$web);


?>