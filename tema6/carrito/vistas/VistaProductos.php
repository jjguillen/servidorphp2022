<?php

    class VistaProductos extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($productos) {
     
            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");


            //CUERPO
            $this->html .= '<div class="album py-5 bg-light">
            <div class="container">
        
              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
        
            //Pintar los productos
            foreach($productos as $key => $producto) {
                
    
                $this->html .= '<div class="col">';
                $this->html .= '<div class="card shadow-sm">';
                //Imagen
                $this->html .= '<img src="data:image/jpeg;base64,'.base64_encode( $producto->getImagen() ).'"/>';
                $this->html .= '<div class="card-body">';
                $this->html .= '<p class="card-text">'.$producto->getNombre().'</p>';
                $this->html .= '    <div class="d-flex justify-content-between align-items-center">';
                $this->html .= '        <div class="btn-group">';
                $this->html .= '          <form action="enrutador.php" method="post">';
                $this->html .= '            <input type="hidden" name="accion" value="addCarro">';
                $this->html .= '            <input type="hidden" name="id" value="'.$producto->getId().'">';
                $this->html .= '                <div class="form-row row">';
                $this->html .= '                    <div class="col-sm-5">';
                $this->html .= '                        <button type="submit" name="comprar" class="btn btn-outline-secondary">Comprar</button>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="form-control input-sm" type="number" name="cantidad" value="1" min="1" max="20">
                                                    </div>
                                                </div>
                                          </form>
                                        </div>';
                $this->html .= '        <small class="text-muted">'.$producto->getPrecio().'€</small>';
                $this->html .= '      </div>
                                </div>
                                </div>
                                </div>';
        
       
            }
          
            
                
            $this->html .= '    
                            </div>
                        </div>
                    </div>';


            //Pie
            $vistaP = new VistaPie();
            $this->html .= $vistaP->render("");

            echo $this->html;
        }
    }
            