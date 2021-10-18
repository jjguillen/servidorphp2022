<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$productos = array(
    array("nombre" => "Nvidia 3080 GTX", "descripcion" => "lllal", "precio" => 2000, 
          "img" => "imgs/tg_1.jpg", "id" => 1),
    array("nombre" => "Gigabyte 3090 GTX", "descripcion" => "lllal", "precio" => 3000, 
          "img" => "imgs/tg_2.png", "id" => 2),
    array("nombre" => "Asus 3080 Ti", "descripcion" => "lllal", "precio" => 2500, 
          "img" => "imgs/tg_3.jpg", "id" => 3),
    array("nombre" => "Amd RTX 6800", "descripcion" => "lllal", "precio" => 1800, 
          "img" => "imgs/tg_4.jpg", "id" => 4),
    array("nombre" => "Amd RTX 6900", "descripcion" => "lllal", "precio" => 2600, 
          "img" => "imgs/tg_5.jpg", "id" => 5)
);

//Función que busca un id en un array asociativo
function buscar($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return array($producto['nombre'],$producto['precio']);
        }
    }
}

//Función que busca un id en un array asociativo
function encontrado($id, $productos) {
    foreach($productos as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }

    return false;
}

//Función que modifica la cantidad de una linea de un carro de la compra
//OJO. Para que quede modificado el array de sesión hay que pasar por referencia
//cada línea del foreach '&'
//Sino también se puede hacer con un for
function update($id, $cant) {
    foreach($_SESSION['carrito'] as &$linea) {
        if ($linea['id'] == $id) {
            $linea['cant'] += $cant;   
            return $linea['cant'];      
        }
    }

    /*
        for($i=0; $i<count($_SESSION['carrito']);$i++) {
        if ($_SESSION['carrito'][$i]['id'] == $id) {
            $_SESSION['carrito'][$i]['cant'] += $cant;
            return $_SESSION['carrito'][$i]['cant'];
        }
    }
    */

}














?>