<?php
    session_start();
    //session_destroy();
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controladores/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./modelos/$clase.php"; 
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

            //Según la acción llamaremos a un método u otro del Controlador
            if ($_REQUEST['accion'] == "inicio") {
                ControladorProductos::mostrarProductos();
            }

            //Insertar producto
            if ($_REQUEST['accion'] == "nuevoProducto") {
                ControladorProductos::insertarProducto();
            }

            //Mostrar carro
            if ($_REQUEST['accion'] == "mostrarCarro") {
                ControladorCarro::mostrarCarro();
            }

            //Añadir al carro
            if ($_REQUEST['accion'] == "addCarro") {
                ControladorCarro::meter();
            }

            //Quitar del carro
            if ($_REQUEST['accion'] == "quitarCarro") {                
                ControladorCarro::quitar();
            }

            //Comprar generando pdf
            if ($_REQUEST['accion'] == "comprar") {
                ControladorCarro::comprar();
            }

        }

    }

?>