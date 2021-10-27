<?php
session_start();

include("./lib/lib.php");

   

    if ($_POST) {

        if (isset($_POST['comprar'])) {
            //Hay que tener en cuenta que aún no se haya creado el carrito
            //y cuando ya esté creado
            if (isset($_SESSION['carrito'])) { //Añadir al carrito    
                //Comprobar que esa producto no esté ya en el carro
                //Si está modificamos la cantidad
                if (encontrado($_POST['id'],$_SESSION['carrito'])) {
                    update($_POST['id'],$_POST['cantidad'],$_SESSION['carrito']);
                } else {
                    //Sino lo añadimos al carro              
                    array_unshift($_SESSION['carrito'], array("id" =>$_POST['id'], "cant" => $_POST['cantidad'] ));
                }

            } else { //Crear carrito
                $_SESSION['carrito'] = array(); 
                array_unshift($_SESSION['carrito'], array("id" =>$_POST['id'], "cant" => $_POST['cantidad'] ));
            }

            //Redirigir a index.php
            header("Location: index.php",false);
            exit;

        }

    }



    //Acciones del controlador
    if ($_GET) {
        if (isset($_GET['accion'])) {
            if ($_GET['accion'] == "borrar") {
                //Saco de la sesión todos los ids
                $ids = array_column($_SESSION['carrito'], 'id');
                //Me los da en el orden del array, así que busco la posición de ese id
                $found_key = array_search($_GET['id'], $ids);
                //Borro esa posición
                unset($_SESSION['carrito'][$found_key]);
                //Quito el hueco que se ha creado en el array
                $_SESSION['carrito'] = array_values($_SESSION['carrito']);
                //Redirigir a verCarro.php
                header("Location: verCarro.php",false);
                exit;
            }
        }
    }



?>