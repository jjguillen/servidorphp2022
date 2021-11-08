<?php

include("lib.php");
include("modelo.php");

    //NUEVA TAREA
    if ($_POST) {
        if (isset($_POST['nuevaTarea'])) {
            //Leemos los datos del formulario de nueva tarea
            $nombre = filtrado($_POST['desc']);
            $fecha = filtrado($_POST['fecha']);
            $prioridad = filtrado($_POST['prioridad']);

            //Insertar nueva tarea
            insertarTarea($nombre,$fecha,$prioridad);

            header("Location: index.php");
            exit;

        }
    }

    //BORRAR TAREA
    if($_GET){
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == 'borrar') {
                $id = $_GET['id'];
                
                borrarTarea($id);                

                header("Location: index.php");
                exit;

            }
        }
    }


?>