<?php

 //Función para filtrar los campos del formulario
 function filtrado($datos){
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}


    if ($_GET) {
        //INSERTAR CONTACO
        if (isset($_GET['insertar'])) {
            $nombre = filtrado($_GET['nombre']);
            $apellidos = filtrado($_GET['apellidos']);
            $email = filtrado($_GET['email']);
            $movil = filtrado($_GET['movil']);

            //Calcular id, máximo + 1 de los id que haya
            //Leer archivo
            $agenda = explode("#",file_get_contents("agenda.txt"));
            $mayor=0;
            foreach($agenda as $contacto) {
                $valores = explode("|",$contacto);
                if ($valores[0] > $mayor)
                    $mayor = $valores[0];
            }            
            
            if (strlen(file_get_contents("agenda.txt") > 0)) 
                $contacto = "#".($mayor+1)."|".$nombre."|".$apellidos."|".$email."|".$movil;
            else
                $contacto = ($mayor+1)."|".$nombre."|".$apellidos."|".$email."|".$movil;

            file_put_contents("agenda.txt",$contacto,FILE_APPEND | LOCK_EX);
            header("Location: agenda.php");
            exit;
        }

        //BORRAR CONTACTO
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == "borrar") {
                $id = filtrado($_GET['id']);
                //Borramos ese contacto
                $agenda = explode("#",file_get_contents("agenda.txt"));
                file_put_contents("agenda.txt", "", LOCK_EX);

                foreach($agenda as $contacto) {
                    $valores = explode("|",$contacto);
                    if ($valores[0] != $id) {
                        //Ese contacto se copia
                        $cadena = implode("|",$valores); //Contacto con los campos separados por |

                        if (strlen(file_get_contents("agenda.txt") > 0)) 
                            $cadena = "#".$cadena; //Nuevo Contacto

                        file_put_contents("agenda.txt", $cadena, FILE_APPEND | LOCK_EX);
                    }
                }
                header("Location: agenda.php");
                exit;
            }
        }

        //BORRAR TODOS CONTACTOS
        if (isset($_GET['borrarTodo'])) {
            file_put_contents("agenda.txt", "", LOCK_EX);
            header("Location: agenda.php");
            exit;
        }


    }



?>