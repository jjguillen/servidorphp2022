<?php
// ---------------- ENCRIPTAR -----------------------

//Configuración del algoritmo de encriptación
//Debes cambiar esta cadena, debe ser larga y unica
//nadie mas debe conocerla
$clave = 'Una cadena, muy, muy larga para mejorar la encriptacion';
//Metodo de encriptación
$method = 'aes-256-cbc';
// Puedes generar una diferente usando la funcion $getIV()
$iv = base64_decode("C9fBxl1EWtYTL1/M8jfstw==");
 /*
 Encripta el contenido de la variable, enviada como parametro.
  */
function encriptar($valor, $method, $clave, $iv) {
     return openssl_encrypt ($valor, $method, $clave, false, $iv);
}
 /*
 Desencripta el texto recibido
 */
function desencriptar($valor, $method, $clave, $iv) {
     $encrypted_data = base64_decode($valor);
     return openssl_decrypt($valor, $method, $clave, false, $iv);
 }
 

    // ---------------- FIN ENCRIPTAR -------------------

?>