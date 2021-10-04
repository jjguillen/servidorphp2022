<?php
    //Preguntamos con isset si la variable que se manda existe. Evitar errores de no mandar info
    if (isset($_POST['lenguaje'])) {
        echo $_POST['lenguaje'];
    }
?>