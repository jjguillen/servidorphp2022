<?php

    $errores="";

    if(!isset($_FILES["imagen"])) { 
        $errores .= "No has subido nada";
    } else if ($_FILES["imagen"]["size"] == 0) {
        $errores .= "El archivo no ha llegado correctamente o es mayor a 4MB"; 
    } else if($_FILES["imagen"]["size"] > (3 * 1024 * 1024)){ 
        $errores .= "El archivo demasiado grande, máximo 3MB";
    } else if($_FILES["imagen"]["type"] != 'image/jpeg') { //La extensión
        $errores .= "El archivo no es una imagen jpeg";
    } else { 
        //Nos podemos fiar sólo en parte, hay que comprobar el mime del archivo
        $mimereal = finfo_file(finfo_open(FILEINFO_MIME), $_FILES["imagen"]["tmp_name"]);
        //Lo comparo con los mime que me interesan en la aplicación
        
        if (strpos($mimereal, "image/jpeg") === false) {
            $errores .= "Mime no valido";
        } else {
            //Lo subimos con el nombre <titulo>_<añ<o>
            if (isset($_POST['titulo']) && isset($_POST['year'])) {
                $destino = "./portadas/" . $_POST['titulo']. "_" . $_POST['year'] . ".jpg"; 
            } else {
                $destino = "./portadas/" . $_FILES["imagen"]["name"]; 
            }

            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino)) { 
                //echo "Archivo subido correctamente";
                header("Location: index.php");
                exit;
            } else{ 
                $errores .= "Fallo al cargar archivo";
            } 
        }


    }

    //Algo no salió no salió bien. Mandamos los errores de vuelta a index.php
    header("Location: index.php?errores={$errores}");
    exit;





?>