<?php

    class VistaPie extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($productos) {

            $this->html .= '

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="enrutador.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                          <label for="precio" class="form-label">Precio (euros)</label>
                          <input type="number" class="form-control" id="precio" name="precio" min="0">
                        </div>
                        <div class="mb-3">
                          <label for="imagen" class="form-label">Imagen</label>
                          <input type="file" class="form-control" id="imagen" name="imagen">
                        </div>
                        <div class="mb-3">
                          <label for="descripcion" class="form-label">Descripción</label>
                          <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>         
                    </div>
                    <input type="hidden" name="accion" value="nuevoProducto">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" >Añadir</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="comprar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="enrutador.php" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre</label>
                          <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="mb-3">
                          <label for="direccion" class="form-label">Dirección</label>
                          <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>     
                        <div class="mb-3">
                          <label for="pais" class="form-label">País</label>
                          <input type="text" class="form-control" id="pais" name="pais">
                        </div> 
                        <div class="mb-3">
                          <label for="ciudad" class="form-label">Ciudad</label>
                          <input type="text" class="form-control" id="ciudad" name="ciudad">
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                        </div> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" name="pdf">Comprar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            </main>
            
            
            <footer class="text-muted py-5">
              <div class="container">
                <p class="float-end mb-1">
                  <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Tienda de gráficas para minar. Ejercicio DWESE 2021 - IES Jaroso</p>    
              </div>
            </footer>
                 
              </body>
            </html>';

            return $this->html;
        }
        
    }

            






