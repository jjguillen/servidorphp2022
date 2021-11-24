<?php

    class VistaNoticias extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($noticias) {
            include "cabecera.php";
            
            echo "<h5><a class='btn btn-primary' href='enrutador.php?accion=nuevaNoticia' role='button'>Nueva</a></h5>";
    
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>#</th>";
            echo "<th scope='col'>Encabezado</th>";
            echo "<th scope='col'>Texto</th>";
            echo "<th scope='col'>Fecha</th>";
            echo "<th scope='col'>Acciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";   

            foreach($noticias as $noticia) {
                echo "<tr>";
                echo "<th scope='row'>{$noticia->getId()}</th>";
                echo "<td>{$noticia->getEncabezado()}</td>";
                echo "<td>{$noticia->getTexto()}</td>";
                echo "<td>{$noticia->getFecha()}</td>";
                echo "<td><a href='enrutador.php?accion=borrarN&id={$noticia->getId()}'>X</a></td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            include "pie.php";
        }

    }




?>