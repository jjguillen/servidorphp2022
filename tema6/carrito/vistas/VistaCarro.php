<?php

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
                    $this->html .= "  <td><a href='controlador.php?accion=borrar&id=".$linea->getId()."'>";
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
     }
             