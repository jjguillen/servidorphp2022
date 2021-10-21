<?php

//Lectura con fgets
$fp = fopen("fichero.txt", "r");
while (!feof($fp)){
    $linea = fgets($fp); //Línea a línea
    echo $linea;
}
fclose($fp); //Importante cerrarlo

echo "<br>";

//Lectura con file
$lineasFichero = file("fichero.txt");
foreach($lineasFichero as $linea) {
    echo $linea."<br>";
}

echo "<br>";

//Lectura por bytes
$fp = fopen("fichero.txt", "rb");
$datos = fread($fp, filesize("fichero.txt")); //Leer tantos bytes como el tamaño del archivo
echo $datos;
fclose($fp);

echo "<br>";

//Lectura con file_get_content
$cadena = file_get_contents ("fichero.txt");
echo $cadena;



?>