<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

 //Función para filtrar los campos del formulario
 function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

//Función que busca un id en un array asociativo
function buscar($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return array($producto['nombre'],$producto['precio']);
        }
    }
}

//Función que busca un id en un array asociativo
function encontrado($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }

    return false;
}

//Función que modifica la cantidad de una linea de un carro de la compra
//OJO. Para que quede modificado el array de sesión hay que pasar por referencia
//cada línea del foreach '&'
//Sino también se puede hacer con un for
function update($id, $cant) {
    foreach($_SESSION['carrito'] as &$linea) {
        if ($linea['id'] == $id) {
            $linea['cant'] += $cant;   
            return $linea['cant'];      
        }
    }

    /*
        for($i=0; $i<count($_SESSION['carrito']);$i++) {
        if ($_SESSION['carrito'][$i]['id'] == $id) {
            $_SESSION['carrito'][$i]['cant'] += $cant;
            return $_SESSION['carrito'][$i]['cant'];
        }
    }
    */

}

function insertarProducto($nombre,$precio,$descripcion,$destino) {
    //Sacamos el id mayor para al insertar poner un id nuevo
    $agenda = explode("#",file_get_contents("store.txt"));
    $mayor=0;
    foreach($agenda as $contacto) {
        $valores = explode("|",$contacto);
        if ($valores[0] > $mayor)
            $mayor = $valores[0];
    }  
    
    //Añadir
    if (strlen(file_get_contents("store.txt") > 0)) 
        $producto = "#".($mayor+1)."|".$nombre."|".$precio."|".$destino."|".$descripcion;
    else
        //Insertar (primera vez)
        $producto = ($mayor+1)."|".$nombre."|".$precio."|".$destino."|".$descripcion;

    file_put_contents("store.txt",$producto,FILE_APPEND | LOCK_EX);

}


function cargarProductos() {
    $productosReturn = array();

    //Leer archivo de agenda. Array con un contacto por elemento
    if (strlen(file_get_contents("store.txt") > 0)) {
        $productos = explode("#",file_get_contents("store.txt"));
        foreach($productos as $producto) {
            $valores = explode("|",$producto);

            $elemento = array( "id" => $valores[0], "nombre" => $valores[1], 
                "precio" => $valores[2], "img" => $valores[3], "desc" => $valores[4] );

            array_push($productosReturn, $elemento);
        }
    }

    return $productosReturn;


}



function mandarEmail($fichero,$email,$nombre) {

    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jjavierguillen@gmail.com';                     //SMTP username
        $mail->Password   = 'feaucnjdvdfdtakx';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('jjavierguillen@gmail.com', 'Javier');
        $mail->addAddress($email, $nombre);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment($fichero, 'factura.pdf');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Factura de la tienda de tarjetas gráficas';
        $mail->Body    = 'Gracias por su compra, Dios se lo pague!</b>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        //echo 'Message has been sent';
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    

}













?>