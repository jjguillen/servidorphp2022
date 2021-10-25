<?php 
$to = "jjavierguillen@gmail.com"; 
$subject = "Ejercicio 1: Prueba de envío";
$message = "Si lees esto es que se ha enviado correctamente"; 

$header = 'From: ' . "jjavierguillen@gmail.com" . "\r\n"; 
$header .= 'MIME-Version: 1.0' . "\r\n"; 
$header .= 'Content-type: text/html; charset=utf-8'."\r\n"; 
$header .= 'X-Mailer: PHP/' . phpversion(); 
if(mail($to, $subject, $message, $header)){ 
echo "Mensaje enviado correctamente"; 
}else{ 
echo "Fallo al enviar el mensaje"; 
}

?>