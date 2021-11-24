<?php
    class VistaFormularioNoticias extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($noticias) {
            include "cabecera.php";
            echo "<form class='row g-3 needs-validation' action='enrutador.php' method='post'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Encabezado</label>";
            echo "    <input type='text' class='form-control' name='encabezado' required>";
            echo "  </div>";
            echo "  <div class='col-md-4'>";
            echo "    <label class='form-label'>Fecha</label>";
            echo "    <input type='date' class='form-control' name='fecha' required>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Noticia</label>";
            echo "    <textarea class='form-control' name='noticia' required></textarea>";
            echo "  </div>";
            echo "<input type='hidden' name='accion' value='crearNoticia'>";
            echo "  <div class='col-12'>";
            echo "    <button class='btn btn-primary' type='submit'>Crear</button>";
            echo "  </div>";
            echo "</form>";
            include "pie.php";

        }

    }




?>