<?php

function conectar() {
      //Abrir conexión BBDD -----------------------------------
      try {
        $dsn = "mysql:host=localhost;dbname=prueba";            
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    return $dbh;
}


//Leer contactos
function leerContactos() {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM contactos");

    $stmt->execute();
    $contactos = $stmt->fetchAll(PDO::FETCH_BOTH);

    //Cerrar conexión
    $dbh = null;
    
    return $contactos;
}



//Insertar contacto
function insertarContacto($nombre, $apellidos, $email, $movil){
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO contactos (nombre, apellidos, email, movil) VALUES (?, ?, ?, ?)");
        // Bind
        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $apellidos);
        $stmt->bindValue(3, $email);
        $stmt->bindValue(4, $movil);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}


//Borrar contacto
function borrarContacto($id) {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM contactos WHERE id = :id");
        // Bind
        $stmt->bindValue(":id", $id);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;

}


//Borrar todos los contactos
function borrarContactos() {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM contactos");
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;

}

?>