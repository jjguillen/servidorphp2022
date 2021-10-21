<?php

    if(!isset($_FILES["imagen"])) { 
        echo "No has subido nada";
    } else if ($_FILES["imagen"]["size"] == 0) {
        echo "El archivo no ha llegado correctamente o es mayor a 4MB"; 
    } else if($_FILES["imagen"]["size"] > (3 * 1024 * 1024)){ 
        echo "El archivo demasiado grande, máximo 3MB";
    } else if($_FILES["imagen"]["type"] != 'image/jpeg') { //La extensión
        echo "El archivo no es una imagen jpeg";
    } else { 
        //Nos podemos fiar sólo en parte, hay que comprobar el mime del archivo
        $mimereal = finfo_file(finfo_open(FILEINFO_MIME), $_FILES["imagen"]["tmp_name"]);
        //Lo comparo con los mime que me interesan en la aplicación
        
        if (strpos($mimereal, "image/jpeg") === false) {
            echo "Mime no valido";
        } else {
            $destino = "./portadas/" . $_FILES["imagen"]["name"]; 
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino)) { 
                //echo "Archivo subido correctamente";
                header("Location: index.php");
                exit;
            } else{ 
                echo "Fallo al cargar archivo";
            } 
        }


    }


?>