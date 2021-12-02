<?php

    class VistaRegalo extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($regalos) {
            include "cabecera.php";
        }

        public function renderRegalos($regalos) {
         
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Nombre</th>";
            echo "<th scope='col'>Destinatario</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Estado</th>";
            echo "<th scope='col'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";   

            foreach($regalos as $regalo) {
                echo "<tr>";
            
                echo "<td>{$regalo->getNombre()}</td>";
                echo "<td>{$regalo->getDestinatario()}</td>";
                echo "<td>{$regalo->getPrecio()}</td>";
                echo "<td>{$regalo->getEstado()}</td>";
                echo "<td>";
                
                echo "<button id='borrarRegalo' accion='borrarRegalo' value='{$regalo->getId()}' class='btn btn-danger'>X</button>";
                
                echo "</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            
        }


    }




?>