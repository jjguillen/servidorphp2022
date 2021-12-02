<?php
    class VistaRegaloForm extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($noticias) {

            echo "<form id='nuevoRegaloForm' class='row g-3 needs-validation'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Nombre</label>";
            echo "    <input type='text' class='form-control' name='nombre' required>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Destinatario</label>";
            echo "    <input type='text' class='form-control' name='destinatario' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Precio</label>";
            echo "    <input type='text' class='form-control' name='precio' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Estado</label>";
            echo "    <input type='text' class='form-control' name='estado' required>";
            echo "  </div>";
            echo "<input type='hidden' name='accion' value='insertarRegalo'>";
            echo "  <div class='col-12'>";
            echo "    <button accion='insertarRegalo' class='btn btn-primary' type='submit'>Añadir</button>";
            echo "  </div>";
            echo "</form>";


        }

    }




?>