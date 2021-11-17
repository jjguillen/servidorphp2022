<?php
    include_once ("modelo/NoticiaBD.php");

    if ($_GET) {
        if (isset($_GET['accion'])) {

            //Borrar noticia
            if ($_GET['accion'] == "borrarN") {
                $id = $_GET['id'];
                NoticiaBD::borrarNoticia($id);

                header("Location: index.php");
                exit;
            }

        }
    }





?>