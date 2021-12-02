<?php
    
    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelo/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vistas/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }
    } 
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {

            //Inicio
            if ($_REQUEST['accion'] == "inicio") {
                ControladorRegalo::mostrarInicio();
            }

            //Mostrar regalos
            if ($_REQUEST['accion'] == "mostrarRegalos") {
                ControladorRegalo::mostrarRegalos();
            }

            //Borar regalo
            if ($_REQUEST['accion'] == "borrarRegalo") {
                ControladorRegalo::borrarRegalo();
            }

            //Nuevo regalo
            if ($_REQUEST['accion'] == "nuevoRegalo") {
                ControladorRegalo::nuevoRegaloForm();
            }

             //Insertar regalo
             if ($_REQUEST['accion'] == "insertarRegalo") {
                ControladorRegalo::insertarRegalo();
            }

           

        }
    }





?>