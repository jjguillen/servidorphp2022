<?php

//Escritura con fwrite
$fp = fopen("ficheroEscritura.txt", "w"); //Con la w machaca, con la a añade al final

fwrite($fp, "Hola que tal");
fwrite($fp, ", ¿Cómo estás? \n");
fwrite($fp, ", Yo bien, ¿y tú? \n");

fclose($fp);

//Escritura con file_put_content
$cadena = "En un lugar \nde la Mancha \nde cuyo nombre ...";
file_put_contents("ficheroEscritura.txt", $cadena, FILE_APPEND | LOCK_EX);


?>