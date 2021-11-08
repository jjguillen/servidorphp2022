<?php
    
    //Abrir conexión BBDD -----------------------------------
    try {
        $dsn = "mysql:host=localhost;dbname=prueba";            
        $dbh = new PDO($dsn, "usuario", "usuario");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e){
        echo $e->getMessage();
    }
/*
    //INSERTAR con bindValue ---------------------------------
    $stmt = $dbh->prepare("INSERT INTO tareas (nombre, fecha_limite, prioridad) VALUES (?, ?, ?)");
    // Bind
    $stmt->bindValue(1, "Lo mismo hecho en clase, tiene que estar para el próxima día");
    $stmt->bindValue(2, "2021-10-09");
    $stmt->bindValue(3, 1);
    // Ejecuta la consulta
    $stmt->execute();

    //INSERTAR con nombre y bindParam ------------------------
    $stmt = $dbh->prepare("INSERT INTO tareas (nombre, fecha_limite, prioridad) VALUES (:nombre, :fecha, :prioridad)");
    // Bind
    $nombre = "Otra tarea";
    $fecha = "2021-10-08";
    $prioridad = 2;
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':prioridad', $prioridad);
    // Ejecuta la consulta
    $stmt->execute();
*/

    //SELECT ---------------------------------------------------------------
    $stmt = $dbh->prepare("SELECT * FROM tareas");
    // Especificamos el fetch mode antes de llamar a fetch()
    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
    // Ejecutamos
    $stmt->execute();
    // Mostramos los resultados, se puede poner nombre columna o número de columna
    while ($tarea = $stmt->fetch()){
        echo "ID: {$tarea['id']} <br>";
        echo "Nombre: {$tarea['nombre']} <br>";
        echo "Fecha: {$tarea['fecha_limite']} <br>";
        echo "Prioridad: {$tarea['prioridad']} <br><br>";
    }


    //SELECT CON FETCHALL
    $stmt = $dbh->prepare("SELECT * FROM tareas WHERE prioridad = :id");
    $stmt->bindValue(':id',1);
    $stmt->execute();
    $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($tareas as $tarea){
        echo "ID: {$tarea['id']} <br>";
        echo "Nombre: {$tarea['nombre']} <br>";
        echo "Fecha: {$tarea['fecha_limite']} <br>";
        echo "Prioridad: {$tarea['prioridad']} <br><br>";
    }



   //Cerrar conexión BBDD
   $dbh = null;


?>