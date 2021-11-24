<?php


require 'vendor/autoload.php';
use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    class VistaCarro extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($carro) {
            
            //Sacar productos del carro
            $productos = $carro->getCarro();

            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");

            //Cuerpo del carro
            $this->html .= '<div class="album py-5 bg-light">
            <div class="container">
        
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <td>Nombre</td>
                            <td>Cantidad</td>
                            <td>Precio</td>
                            <td>Subtotal</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>';
        
       
                $total = 0;
                foreach($productos as $key => $producto) {
                    //Sacar datos de el producto con ese id
                    $linea = $producto["producto"];
        
                    //Total de cada línea del carro. Vamos acumulando
                    $total += $producto['cantidad'] * $linea->getPrecio();
        
                    $this->html .= "<tr>";
                    $this->html .= "  <td>{$linea->getNombre()}</td>";
                    $this->html .= "  <td>{$producto['cantidad']}</td>";
                    $this->html .= "  <td>{$linea->getPrecio()}€</td>";
                    $this->html .= "  <td>".$producto['cantidad'] * $linea->getPrecio()."€</td>";
                    $this->html .= "  <td><a href='enrutador.php?accion=quitarCarro&id=".$linea->getId()."'>";
                    $this->html .= "
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                    </svg>        
                    ";
                    $this->html .= "      </a></td>";
                    $this->html .= "</tr>";
       
                }
        
                //Calcular el total
                $this->html .= "<tr>";
                $this->html .= "<td>Total</td><td></td><td></td>";
                $this->html .= "<td colspan='2'><strong>{$total}€</strong></td>";
                $this->html .= "</tr>";
        
           
            
                $this->html .= '    </tbody>
                </table>
        
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#comprar">
                Comprar
              </button>
        
            </div>
          </div>';  



            //Pie
            $vistaP = new VistaPie();
            $this->html .= $vistaP->render("");

            echo $this->html;

         }


         public function renderFactura($nombre) {
            
            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");

            //Cuerpo del carro
            $this->html .= '<div class="album py-5 bg-light">
            <div class="container">
        
                <p>Gracias por comprar en nuestra tienda</p>
                <p> <a target="_blank" href="'.$nombre.'">Ver factura</a></p>
        
            </div>
          </div>';  



            //Pie
            $vistaP = new VistaPie();
            $this->html .= $vistaP->render("");

            echo $this->html;

         }


        //Función que genera el PDF de la factura del carro de la compra
        public function generarPDF($nombre, $direccion, $pais, $ciudad, $email, $carreta) {

            //Me devuelve el array de productos del carro
            $carro = $carreta->getCarro();

            // instantiate and use the dompdf class
            $dompdf = new Dompdf();

            //FACTURA DEL CARRO EN HTML
            $html = "<style type='text/css'>

            table,td,th {
                border: solid 1px #437ad3;
            table
            {
                padding: 0;
                font-size: 12pt;
                text-align: center;
                vertical-align: middle;
                border-collapse: collapse;
            }
            td
            {
                padding: 1mm;
                width: 150px;
            }
            td.right {
                text-align: right;
                padding-right: 30px;
            }


            </style>";

            $html .= "<h1>Factura XXXXXXX</h1>";
            $html .= "<h3>Nombre: {$nombre}</h3>";
            $html .= "<h3>Direccion: {$direccion}</h3>";
            $html .= "<h3>País: {$pais}</h3>";
            $html .= "<h3>Ciudad: {$ciudad}</h3>";
            $html .= "<h3>Email: {$email}</h3>";
            $html .= "<br>";

            $html .= "<table>";
            $html .= "<thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Cantidad</td>
                                <td>Precio</td>
                                <td>Subtotal</td>
                            </tr>
                        </thead>
                        <tbody>";

            $total = 0;
            foreach($carro as $linea) {
                $producto = $linea["producto"];
                $cantidad = $linea["cantidad"];

                $html .= "<tr>";
                $html .= "  <td>{$producto->getNombre()}</td>";
                $html .= "  <td>{$cantidad}</td>";
                $html .= "  <td>{$producto->getPrecio()}€</td>";
                $html .= "  <td>".$cantidad * $producto->getPrecio()."€</td>";
                $html .= "</tr>";
                
                //Total de cada línea del carro. Vamos acumulando
                $total += $linea['cantidad'] * $producto->getPrecio();
            }

            $html .= "<tr>
                        <td>Total</td><td></td><td></td>
                        <td><strong>{$total}€</strong></td>
                        </tr>";

            $html .= "</tbody></table>";

            $dompdf->loadHtml($html);

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

            // Render the HTML as PDF
            $dompdf->render();

            //Guardamos pdf en factura.pdf
            $algo = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10); 
            $fichero = "factura" . $algo . ".pdf";
            file_put_contents($fichero, $dompdf->output());

            mandarEmail($fichero,$email,$nombre);

            unset($_SESSION['carrito']);

            return $fichero;
        }




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