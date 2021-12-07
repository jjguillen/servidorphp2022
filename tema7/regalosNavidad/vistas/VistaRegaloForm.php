<?php
    class VistaRegaloForm extends Vista {

        public function __construct() {
             parent::__construct();
        }

        public function render($regalo) {

            $nombre = (isset($regalo)) ? $regalo->getNombre() : "";
            $destinatario = (isset($regalo)) ? $regalo->getDestinatario() : "";
            $precio = (isset($regalo)) ? $regalo->getPrecio() : "";
            $estado = (isset($regalo)) ? $regalo->getEstado() : "";
            $id = (isset($regalo)) ? $regalo->getId() : "";
            
            echo "<form id='nuevoRegaloForm' class='row g-3 needs-validation'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Nombre</label>";
            echo "    <input type='text' class='form-control' name='nombre' value='$nombre' required>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Destinatario</label>";
            echo "    <input type='text' class='form-control' name='destinatario' value='$destinatario' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Precio</label>";
            echo "    <input type='text' class='form-control' name='precio' value='$precio' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Estado</label>";
            echo "    <input type='text' class='form-control' name='estado' value='$estado' required>";
            echo "  </div>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "  <div class='col-12'>";
            if (isset($regalo)) {
                echo "    <button accion='modificarRegalo' class='btn btn-primary' type='submit'>Confirmar</button>";
            } else {
                echo "    <button accion='insertarRegalo' class='btn btn-primary' type='submit'>Añadir</button>";
            }
            
            echo "  </div>";
            echo "</form>";


        }

    }




?>