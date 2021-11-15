<?php

function conectar() {
    //Abrir conexión BBDD -----------------------------------
    $dbh=null;
    try {
        $dsn = "mysql:host=localhost;dbname=prueba";            
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    return $dbh;
}


//Leer tareas
function leerArchivo($fecha) {
    
    $dbh = conectar();

    //Consulta BBDD
    //Si le paso como fecha "", me saca todas las tareas, si le paso un fecha me saca las tareas
    //con fecha de fin anteriores a esa fecha
    if (strlen($fecha) > 0) {
        $stmt = $dbh->prepare("SELECT * FROM tareas WHERE fecha_limite <= :fecha");
        $stmt->bindValue(":fecha",$fecha);
    } else
        $stmt = $dbh->prepare("SELECT * FROM tareas");

    $stmt->execute();
    $tareas = $stmt->fetchAll(PDO::FETCH_BOTH);

    //Cerrar conexión
    $dbh = null;
    
    return $tareas;
}



//Insertar tarea
function insertarTarea($nombre, $fecha, $prioridad){
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO tareas (nombre, fecha_limite, prioridad) VALUES (?, ?, ?)");
        // Bind
        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $fecha);
        $stmt->bindValue(3, $prioridad);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}


//Borrar tarea
function borrarTarea($id) {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM tareas WHERE id = :id");
        // Bind
        $stmt->bindValue(":id", $id);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;

}


?>