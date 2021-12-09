<?php

    class VistaLinks extends Vista {

        public function __construct() {
            parent::__construct();
        }        

        public function render($links) {
            include "cabecera.php";
        }

        public function renderLinks($links,$regalo) {
         
            echo "<br>";
            echo "<h4 class='mr-2'>Enlaces del regalo: ".$regalo->getNombre().
                 " <button class='btn btn-outline-primary btn-sm' accion='nuevoLink' value='{$regalo->getId()}'>+</button></h4>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Link</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Prioridad</th>";
            echo "<th scope='col'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";   

            foreach($links as $link) {
                echo "<tr>";
            
                echo "<td>{$link->getNombre()}</td>";
                echo "<td>{$link->getLink()}</td>";
                echo "<td>{$link->getPrecio()}</td>";
                echo "<td>{$link->getPrioridad()}</td>";
                echo "<td>";
                
                echo "<button id='borrarLink' accion='borrarLink' regalo='{$regalo->getId()}' value='{$link->getId()}' class='btn btn-danger m-1'>X</button>";
                
                echo "</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            
        }

        public function renderFormNuevoLink($regalo) {
            echo "<h4>Nuevo link para regalo: {$regalo->getNombre()}</h4>";
            echo "<form id='nuevoLinkForm' class='row g-3 needs-validation'>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Nombre</label>";
            echo "    <input type='text' class='form-control' name='nombre' required>";
            echo "  </div>";
            echo "  <div class='col-md-10'>";
            echo "    <label class='form-label'>Link</label>";
            echo "    <input type='text' class='form-control' name='link' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Precio</label>";
            echo "    <input type='text' class='form-control' name='precio' required>";
            echo "  </div>";
            echo "  <div class='col-md-5'>";
            echo "    <label class='form-label'>Prioridad</label>";
            echo "    <input type='text' class='form-control' name='prioridad' required>";
            echo "  </div>";
            echo "  <div class='col-12'>";
           
            echo "    <button accion='insertarLink' class='btn btn-primary' regalo='{$regalo->getId()}' type='submit'>Añadir</button>";

            
            echo "  </div>";
            echo "</form>";

        }


    }




?>