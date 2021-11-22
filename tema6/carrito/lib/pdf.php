<?php

require 'vendor/autoload.php';
use Dompdf\Dompdf;


//Función que genera el PDF de la factura del carro de la compra
function generarPDF($nombre, $direccion, $pais, $ciudad, $email, $carrito, $productos) {


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
    foreach($carrito as $linea) {
        $datos = buscar($linea['id'],$productos);

        $html .= "<tr>";
        $html .= "  <td>{$datos[0]}</td>";
        $html .= "  <td>{$linea['cant']}</td>";
        $html .= "  <td>{$datos[1]}€</td>";
        $html .= "  <td>".$linea['cant'] * $datos[1]."€</td>";
        $html .= "</tr>";
        
        //Total de cada línea del carro. Vamos acumulando
        $total += $linea['cant'] * $datos[1];
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

    header("Location: factura.php?nombre={$fichero}",false);
    exit;
}



?>