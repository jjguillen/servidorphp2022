<?php 
$to = "jjavierguillen@gmail.com"; 
$subject = "Ejercicio 1: Prueba de envío";
$message = "Si lees esto es que se ha enviado correctamente"; 
mail($to, $subject, $message); 
echo "Enviado correctamente";
?>