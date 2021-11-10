<?php

function conectar() {
      //Abrir conexión BBDD -----------------------------------
      try {
        $dsn = "mysql:host=localhost;dbname=iesjaroso";            
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    return $dbh;
}


function comprobarUsuario($email,$password) {
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT password FROM usuarios WHERE email = :email");
    $stmt->bindValue(":email", $email);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_BOTH);

    //Cerrar conexión
    $dbh = null;

    //Desencriptar
    $method = 'aes-256-cbc';
    $key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
    $iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
    $password_decrypted = openssl_decrypt($resultado['password'], $method, $key, false, $iv);

    if ($password_decrypted == $password)
        return 1;
    else 
        return 0;

}

//Leer alumnos
function leerAlumnos() {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM alumnos");

    $stmt->execute();
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $alumnos;
}



//Insertar Usuario
function insertarUsuario($email, $password, $nombre, $ciudad, $situacion, $especialidad){
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO usuarios (email, password, nombre, ciudad, situacion, especialidad) VALUES (?, ?, ?, ?, ?, ?)");
        // Bind
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $nombre);
        $stmt->bindValue(4, $ciudad);
        $stmt->bindValue(5, $situacion);
        $stmt->bindValue(6, $especialidad);
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