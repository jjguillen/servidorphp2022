<?php

function conectar() {
      //Abrir conexión BBDD -----------------------------------
      try {
        //Docker
        //$dsn = "mysql:host=172.19.0.2;dbname=iesjaroso";            
        //$dbh = new PDO($dsn, "root", "root");
        //AwardSpace
        $dsn = parse_url(getenv("DATABASE_URL"));
        //$dsn = "mysql:host=fdb22.awardspace.net;port=3306;dbname=2872262_daw";            
        $dbh = new PDO($dsn, "2872262_daw", "mjcrlvj#21");
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    } catch (PDOException $e){
        echo $e->getMessage()+" "+$dsn;
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
    //SELECT iesjaroso.alumnos.id,iesjaroso.alumnos.nombre,iesjaroso.alumnos.edad,iesjaroso.alumnos.dni,
    $stmt = $dbh->prepare("SELECT alumnos.id,alumnos.nombre,alumnos.apellidos,alumnos.edad,alumnos.dni,alumnos.email,
                            alumnos.localidad,alumnos.telefono,cursos.nombre as curso,alumnos.avatar
                           FROM alumnos JOIN cursos WHERE cursos.id=alumnos.curso");

    $stmt->execute();
    $alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $alumnos;
}

//Leer alumnos
function leerCursos() {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM cursos");

    $stmt->execute();
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $cursos;
}

//Leer profesores
function leerProfesores() {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM usuarios");

    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $usuarios;
}


//Leer partes
function leerPartes() {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT partes.id,alumnos.nombre, alumnos.apellidos, partes.fecha, partes.hora,
                            partes.asignatura, partes.gravedad, partes.descripcion, partes.comunicado
                           FROM partes,alumnos,usuarios WHERE partes.alumno_id=alumnos.id AND
                            partes.usuario_id=usuarios.id");

    $stmt->execute();
    $partes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $partes;
}


////Leer alumnos
function leerAlumno($id) {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM alumnos WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $alumno = $stmt->fetch(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $alumno;
}

////Leer curso
function leerCurso($id) {
    
    $dbh = conectar();

    //Consulta BBDD
    $stmt = $dbh->prepare("SELECT * FROM cursos WHERE id = :id");
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    //Cerrar conexión
    $dbh = null;
    
    return $curso;
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

//Insertar Parte
function insertarParte($parte){
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO partes (alumno_id,usuario_id,fecha,hora,asignatura,gravedad,descripcion,comunicado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        // Bind

        $stmt->bindValue(1, $parte['alumno_id']);
        $stmt->bindValue(2, $parte['usuario_id']);
        $stmt->bindValue(3, $parte['fecha']);
        $stmt->bindValue(4, $parte['hora']);
        $stmt->bindValue(5, $parte['asignatura'] );
        $stmt->bindValue(6, $parte['descripcion']);
        $stmt->bindValue(7, $parte['gravedad'] );
        $stmt->bindValue(8, $parte['comunicado'] );
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}


//Insertar Alumno
function insertarAlumno($alumno) {
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO alumnos (nombre, apellidos, edad, email, dni, localidad, telefono, curso, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        // Bind
        $stmt->bindValue(1, $alumno['nombre']);
        $stmt->bindValue(2, $alumno['apellidos']);
        $stmt->bindValue(3, $alumno['edad']);
        $stmt->bindValue(4, $alumno['email']);
        $stmt->bindValue(5, $alumno['dni']);
        $stmt->bindValue(6, $alumno['localidad']);
        $stmt->bindValue(7, $alumno['telefono']);
        $stmt->bindValue(8, $alumno['curso']);
        $stmt->bindValue(9, $alumno['avatar']);

        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}

//Modificar Alumno
function modificarAlumno($id, $alumno) {
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("UPDATE alumnos SET nombre=?, apellidos=?, edad=?, email=?, dni=?, localidad=?, telefono=?, curso=?, avatar=? WHERE id=?");
        // Bind
        $stmt->bindValue(1, $alumno['nombre']);
        $stmt->bindValue(2, $alumno['apellidos']);
        $stmt->bindValue(3, $alumno['edad']);
        $stmt->bindValue(4, $alumno['email']);
        $stmt->bindValue(5, $alumno['dni']);
        $stmt->bindValue(6, $alumno['localidad']);
        $stmt->bindValue(7, $alumno['telefono']);
        $stmt->bindValue(8, $alumno['curso']);
        $stmt->bindValue(9, $alumno['avatar']);
        $stmt->bindValue(10, $id);

        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}


//Borrar alumno
function borrarAlumno($id) {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM alumnos WHERE id = :id");
        // Bind
        $stmt->bindValue(":id", $id);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}

//Borrar Parte
function borrarParte($id) {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM partes WHERE id = :id");
        // Bind
        $stmt->bindValue(":id", $id);
        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}

//Insertar Curso
function insertarCurso($curso) {
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("INSERT INTO cursos (nombre, etapa, anio) VALUES (?, ?, ?)");
        // Bind
        $stmt->bindValue(1, $curso['nombre']);
        $stmt->bindValue(2, $curso['etapa']);
        $stmt->bindValue(3, $curso['anio']);

        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}


//Modificar Curso
function modificarCurso($id,$curso) {
    $dbh = conectar();

    try {
        //Insertar
        $stmt = $dbh->prepare("UPDATE cursos SET nombre=?, etapa=?, anio=? WHERE id=?");
        // Bind
        $stmt->bindValue(1, $curso['nombre']);
        $stmt->bindValue(2, $curso['etapa']);
        $stmt->bindValue(3, $curso['anio']);
        $stmt->bindValue(4, $id);

        // Ejecuta la consulta
        $stmt->execute();
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $dbh = null;
}

//Borrar curso
function borrarCurso($id) {
    $dbh = conectar();

    try {
        //Borrar
        $stmt = $dbh->prepare("DELETE FROM cursos WHERE id = :id");
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