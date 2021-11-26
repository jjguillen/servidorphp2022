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

            //LOGIN, REGISTRO Y PROFESORES ----------------------------------------------
            if ($_REQUEST['accion'] == "inicio") {
                ControladorProfesor::login();
            }

            if ($_REQUEST['accion'] == "login") {
                ControladorProfesor::checkLogin();
            }

            if ($_REQUEST['accion'] == "registro") {
                ControladorProfesor::insertarProfesor();
            }

            if ($_REQUEST['accion'] == "insertarProfesorBD") {
                ControladorProfesor::insertarProfesorBD();
            }


            //ALUMNOS --------------------------------------------------------------------
            if ($_REQUEST['accion'] == "mostrarAlumnos") {
                ControladorAlumno::mostrarAlumnos();
            }

            if ($_REQUEST['accion'] == "borrarAlumno") {
                ControladorAlumno::borrarAlumno();                
            }

            if ($_REQUEST['accion'] == "insertarAlumno") {
                ControladorAlumno::insertarAlumno();                
            }

            if ($_REQUEST['accion'] == "insertarAlumnoBD") {
                ControladorAlumno::insertarAlumnoBD();                
            }

            if ($_REQUEST['accion'] == "editarAlumno") {
                ControladorAlumno::editarAlumno();                
            }

            if ($_REQUEST['accion'] == "editarAlumnoBD") {
                ControladorAlumno::editarAlumnoBD();                
            }

            //CURSOS --------------------------------------------------------------------
            if ($_REQUEST['accion'] == "mostrarCursos") {
                ControladorCurso::mostrarCursos();
            }

            if ($_REQUEST['accion'] == "borrarCurso") {
                ControladorCurso::borrarCurso();                
            }

            if ($_REQUEST['accion'] == "insertarCurso") {
                ControladorCurso::insertarCurso();                
            }

            if ($_REQUEST['accion'] == "insertarCursoBD") {
                ControladorCurso::insertarCursoBD();                
            }

            if ($_REQUEST['accion'] == "editarCurso") {
                ControladorCurso::editarCurso();                
            }

            if ($_REQUEST['accion'] == "editarCursoBD") {
                ControladorCurso::editarCursoBD();                
            }

            //PARTES --------------------------------------------------------------------
            if ($_REQUEST['accion'] == "mostrarPartes") {
                ControladorParte::mostrarPartes();
            }

            if ($_REQUEST['accion'] == "borrarParte") {
                ControladorParte::borrarParte();                
            }

            if ($_REQUEST['accion'] == "insertarParte") {
                ControladorParte::insertarParte();                
            }

            if ($_REQUEST['accion'] == "insertarParteBD") {
                ControladorParte::insertarParteBD();                
            }

        }

    }

?>