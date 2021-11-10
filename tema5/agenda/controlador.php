<?php

    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    include_once("modelo.php");

    if ($_GET) {
        //INSERTAR CONTACTO
        if (isset($_GET['insertar'])) {
            $nombre = filtrado($_GET['nombre']);
            $apellidos = filtrado($_GET['apellidos']);
            $email = filtrado($_GET['email']);
            $movil = filtrado($_GET['movil']);

            insertarContacto($nombre,$apellidos,$email,$movil);

            header("Location: index.php");
            exit;
        }

        //BORRAR CONTACTO
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == "borrar") {
                $id = filtrado($_GET['id']);
                //Borramos ese contacto
                borrarContacto($id);

                header("Location: index.php");
                exit;
            }
        }

        //BORRAR TODOS CONTACTOS
        if (isset($_GET['borrarTodo'])) {
            //Borramos todo
            borrarContactos();

            header("Location: index.php");
            exit;
        }


    }



?>