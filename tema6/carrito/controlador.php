<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

include("./lib/lib.php");
include("./lib/pdf.php");
   

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

        //NUEVO PRODUCTO
        if (isset($_POST['nuevoProducto'])) {
            $nombre = filtrado($_POST['nombre']);
            $precio = filtrado($_POST['precio']);
            $descripcion = filtrado($_POST['descripcion']);

            //Imagen del producto
            $errores="";
            $destino="";

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
                    //Lo subimos a imgs/productos
                    $destino = "./imgs/productos/" . $_FILES["imagen"]["name"]; 
        
                    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino)) { 
                        //echo "Archivo subido correctamente";

                        //Insertarmos en el archivo store.txt
                        insertarProducto($nombre,$precio,$descripcion,$destino);

                        header("Location: index.php");
                        exit;
                    } else  { 
                        $errores .= "Fallo al cargar archivo";
                    } 
                }
        
        
            }
            //echo $errores;
        }




        //COMPRAR Y GENERAR FACTURA PDF
        if (isset($_POST['pdf'])) {
            $nombre = filtrado($_POST['nombre']);
            $direccion = filtrado($_POST['direccion']);
            $pais = filtrado($_POST['pais']);
            $ciudad = filtrado($_POST['ciudad']);
            $email = filtrado($_POST['email']);

            $carrito = $_SESSION['carrito'];
            $productos = cargarProductos();

            generarPDF($nombre, $direccion, $pais, $ciudad, $email, $carrito, $productos);

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