<?php
session_start();
//AUTOLOAD
function autocarga($clase)
{
  $ruta = "./controladores/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }

  $ruta = "./modelos/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }

  $ruta = "./vistas/$clase.php";
  if (file_exists($ruta)) {
    include_once $ruta;
  }
}
spl_autoload_register("autocarga");

//Función para filtrar los campos del formulario
function filtrado($datos)
{
  $datos = trim($datos); // Elimina espacios antes y después de los datos
  $datos = stripslashes($datos); // Elimina backslashes \
  $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
  return $datos;
}

if ($_REQUEST) {
  if (isset($_REQUEST['accion'])) {
    if ($_REQUEST['accion'] == "inicio") {
      ControladorRestaurante::inicio();
    }

    //Insertar producto
    if ($_REQUEST['accion'] == "nuevaReserva") {
      ControladorRestaurante::insertarReserva();
      //Es un fallo que insertes una reserva y te devuelva a inicio
      header("Location: enrutador.php?accion=inicio");
      exit;
    }

    //Cancelar Reserva
    if ($_REQUEST['accion'] == "cancelarReserva") {
      ControladorRestaurante::cancelarReserva();
      //Es un fallo que insertes una reserva y te devuelva a inicio
      header("Location: enrutador.php?accion=inicio");
      exit;
    }

    //Modificar Reserva
    if ($_REQUEST['accion'] == "modificarReserva") {
      ControladorRestaurante::modificarReserva();
    }
    if ($_REQUEST['accion'] == "modificacion") {
      ControladorRestaurante::modificacion();
      //Es un fallo que insertes una reserva y te devuelva a inicio
      header("Location: enrutador.php?accion=inicio");
      exit;
    }

    //buscar por fecha
    if ($_REQUEST['accion'] == "buscar") {
      ControladorRestaurante::buscarFecha();
    }
  }
}
