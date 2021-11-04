<?php

include("lib.php");

    //NUEVA TAREA
    if ($_POST) {
        if (isset($_POST['nuevaTarea'])) {
            //Leemos los datos del formulario de nueva tarea
            $desc = filtrado($_POST['desc']);
            $fecha = filtrado($_POST['fecha']);
            $prioridad = filtrado($_POST['prioridad']);

            //Calcular id. Leemos el fichero
            $max=0;
            $lineasFichero = file("tasks.txt");
            foreach($lineasFichero as $linea) {
                $tarea = explode("|",$linea);
                if ($tarea[0] > $max)
                    $max = $tarea[0];
            }
            $id = $max+1;

            //Insertamos datos en una nueva línea en tasks.txt
            $tarea = $id . "|" . $desc . "|" . $fecha . "|" . $prioridad . "|" . PHP_EOL;
            file_put_contents("tasks.txt",$tarea, FILE_APPEND | LOCK_EX);
            header("Location: index.php");
            exit;

        }
    }

    //BORRAR TAREA
    if($_GET){
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == 'borrar') {
                $id = $_GET['id'];
                //Leemos el archivo y lo volvemos a escribir excepto la línea
                $tareas = leerArchivo();
                file_put_contents("tasks.txt","", LOCK_EX); //Borrar todo
                foreach($tareas as $tarea) {
                    if ($tarea[0] != $id) {
                        $tarea = $tarea[0] . "|" . $tarea[1] . "|" . $tarea[2] . "|" . $tarea[3] . "|" . PHP_EOL;
                        file_put_contents("tasks.txt",$tarea, FILE_APPEND | LOCK_EX);
                    }
                }
                header("Location: index.php");
                exit;

            }
        }
    }


?>