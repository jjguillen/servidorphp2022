<?php
    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }


    //Leemos los datos del formulario de nueva tarea
    if ($_POST) {
        if (isset($_POST['nuevaTarea'])) {
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
            $tarea = $id . "|" . $desc . "|" . $fecha . "|" . $prioridad . PHP_EOL;
            file_put_contents("tasks.txt",$tarea, FILE_APPEND | LOCK_EX);
            header("Location: index.php");
            exit;

        }
    }


?>