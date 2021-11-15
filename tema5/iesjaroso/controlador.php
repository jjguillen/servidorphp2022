<?php
    session_start();
    include("modelo.php");

    //Has recibido un formulario o bien el login o el registro
    if ($_POST) {

        //ACCIONES CON POST
        if (isset($_POST['accion'])) {
            //LOGIN ------------------------------------------------------------------------
            if ($_POST['accion'] == "login") {
                //Leer valor del email
                if (isset($_POST['email'])) {
                    $email = filtrado($_POST['email']);                    
                }
                //Leer valor de la contraseña
                if (isset($_POST['password'])) {
                    $password = filtrado($_POST['password']);                    
                }

                //Comprobamos que los datos son correctos
                if (comprobarUsuario($email,$password)) {
                    //Metemos en la sesión el usuario registrado
                    $_SESSION['usuario'] = $email;
                    header("Location: home.php"); 
                    exit;
                } else {
                    header("Location: index.php?mensaje='Password incorrecto'"); 
                    exit;
                }

               
            } 
            //FIN LOGIN --------------------------------------------------------------------

            //REGISTRO ---------------------------------------------------------------------
            if ($_POST['accion'] == "registro") {
                //Leer valor del email
                if (isset($_POST['email'])) {
                    $email = filtrado($_POST['email']);                    
                }
                //Leer valor de la contraseña
                if (isset($_POST['password'])) {
                    $password = filtrado($_POST['password']);                    
                }
                //Leer valor del nombre
                if (isset($_POST['nombre'])) {
                    $nombre = filtrado($_POST['nombre']);                    
                }
                //Leer valor de la ciudad
                if (isset($_POST['ciudad'])) {
                    $ciudad = filtrado($_POST['ciudad']);                    
                }
                 //Leer valor del estado
                 if (isset($_POST['situacion'])) {
                    $situacion = filtrado($_POST['situacion']);                    
                }
                //Leer valor de la especialidad
                if (isset($_POST['especialidad'])) {
                    $especialidad = filtrado($_POST['especialidad']);                    
                }

                $method = 'aes-256-cbc';
                $key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
                $iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
                $password_encrypted = openssl_encrypt ($password, $method, $key, false, $iv);


                //Si no existe ya ese email en BBDD, lo insertaríamos
                insertarUsuario($email, $password_encrypted, $nombre, $ciudad, $situacion, $especialidad);
                $_SESSION['usuario'] = $email;

                //Por ahora redirigimos a home.php (para que funcione quitar echos de antes)
                header("Location: home.php"); 
                exit;

            } 
            //FIN REGISTRO ------------------------------------------------------------------

            //MODIFICAR ALUMNO --------------------------------------------------------------
            if ($_POST['accion'] == "modificarAlumno") {
                $id = filtrado($_POST['id']);                

                $alumno['nombre'] = filtrado($_POST['nombre']);
                $alumno['apellidos'] = filtrado($_POST['apellidos']);
                $alumno['edad'] = filtrado($_POST['edad']);
                $alumno['dni'] = filtrado($_POST['dni']);
                $alumno['email'] = filtrado($_POST['email']);
                $alumno['localidad'] = filtrado($_POST['localidad']);
                $alumno['telefono'] = filtrado($_POST['telefono']);
                $alumno['curso'] = filtrado($_POST['curso']);

                //Avatar
                if (!empty($_FILES['avatar']['tmp_name'])) {
                    $image = file_get_contents($_FILES['avatar']['tmp_name']);
                    $alumno['avatar'] = $image;
                } else 
                    $alumno['avatar'] = "-";

                modificarAlumno($id, $alumno);

                header("Location: alumnos.php"); 
                exit;
            }
            //FIN MODIFICAR ALUMNO ----------------------------------------------------------

            //INSERTAR ALUMNO --------------------------------------------------------------
            if ($_POST['accion'] == "insertarAlumno") {

                $alumno['nombre'] = filtrado($_POST['nombre']);
                $alumno['apellidos'] = filtrado($_POST['apellidos']);
                $alumno['edad'] = filtrado($_POST['edad']);
                $alumno['email'] = filtrado($_POST['email']);
                $alumno['dni'] = filtrado($_POST['dni']);
                $alumno['localidad'] = filtrado($_POST['localidad']);
                $alumno['telefono'] = filtrado($_POST['telefono']);
                $alumno['curso'] = filtrado($_POST['curso']);

                //Avatar
                $image = file_get_contents($_FILES['avatar']['tmp_name']);
                $alumno['avatar'] = $image;

                //Metemos en la sesión
                insertarAlumno($alumno);

                header("Location: alumnos.php"); 
                exit;

            }
            //FIN INSERTAR ALUMNO ----------------------------------------------------------

            //INSERTAR CURSO --------------------------------------------------------------
            if ($_POST['accion'] == "insertarCurso") {

                $curso['nombre'] = filtrado($_POST['nombre']);
                $curso['etapa'] = filtrado($_POST['etapa']);
                $curso['anio'] = filtrado($_POST['anio']);

                //Metemos en bbdd
                insertarCurso($curso);

                header("Location: cursos.php"); 
                exit;
            }
            //FIN INSERTAR CURSO ----------------------------------------------------------


            //INSERTAR PARTE --------------------------------------------------------------
            if ($_POST['accion'] == "insertarParte") {

                $parte['usuario_id'] = filtrado($_POST['usuario_id']);
                $parte['alumno_id'] = filtrado($_POST['alumno_id']);
                $parte['fecha'] = filtrado($_POST['fecha']);
                $parte['hora'] = filtrado($_POST['hora']);
                $parte['asignatura'] = filtrado($_POST['asignatura']);
                $parte['descripcion'] = filtrado($_POST['descripcion']);
                $parte['gravedad'] = filtrado($_POST['gravedad']);
                if (isset($_POST['comunicado']))
                    $parte['comunicado'] = 1;
                else
                    $parte['comunicado'] = 0;

                //Metemos en bbdd
                insertarParte($parte);

                header("Location: partes.php"); 
                exit;
            }
            //FIN INSERTAR PARTE ----------------------------------------------------------


            //MODIFICAR CURSO ---------------------------------------------------------------
            if ($_POST['accion'] == "modificarCurso") {
                $id = filtrado($_POST['id']); //viene del hidden del formulario
                $curso['nombre'] = filtrado($_POST['nombre']);
                $curso['etapa'] = filtrado($_POST['etapa']);
                $curso['anio'] = filtrado($_POST['anio']);

                modificarCurso($id, $curso);

                header("Location: cursos.php"); 
                exit;
            }
            //FIN MODIFICAR CURSO -----------------------------------------------------------

        }

    }


    //ACCIONES de alumnos y cursos con GET
    if ($_GET) {
        //Ver qué acción se ha elegido
        if (isset($_GET['accion'])) {

            //BORRAR ALUMNO -----------------------------------------------------------------
            if ($_GET['accion'] == "borrarAlumno") {
                $id = filtrado($_GET['id']);

                //Borramos alumno
                borrarAlumno($id);

                //Ir a BBDD y borrar ese alumno

                //Por ahora redirigimos a alumnos.php después de borrar un alumno
                header("Location: alumnos.php"); 
                exit;
            }
            //FIN BORRAR ALUMNO -------------------------------------------------------------

            //EDITAR ALUMNO -----------------------------------------------------------------
            if ($_GET['accion'] == "editarAlumno") {
                $id = filtrado($_GET['id']);
                header("Location: editarAlumno.php?id=".$id); 
                exit;
            }
            //FIN EDITAR ALUMNO -------------------------------------------------------------

            //BORRAR CURSO ------------------------------------------------------------------
            if ($_GET['accion'] == "borrarCurso") {
                $id = filtrado($_GET['id']);

                //Borramos alumno BBDD
                borrarCurso($id);

                //Por ahora redirigimos a cursos.php después de borrar un curso
                header("Location: cursos.php"); 
                exit;
            }
            //FIN BORRAR CURSO --------------------------------------------------------------

            //EDITAR CURSO ------------------------------------------------------------------
            if ($_GET['accion'] == "editarCurso") {
                $id = filtrado($_GET['id']);
                header("Location: editarCurso.php?id=".$id); 
                exit;
            }
            //FIN EDITAR CURSO --------------------------------------------------------------

            //BORRAR PARTE ------------------------------------------------------------------
            if ($_GET['accion'] == "borrarParte") {
                $id = filtrado($_GET['id']);

                //Borrar parte BBDD
                borrarParte($id);

                header("Location: partes.php"); 
                exit;
            }
            //FIN BORRAR PARTE --------------------------------------------------------------


             //MOSTRAR PARTES DE ALUMNO -----------------------------------------------------------------
             if ($_GET['accion'] == "mostrarPartes") {
                $id = filtrado($_GET['id']);

                //Por ahora redirigimos a alumnos.php después de borrar un alumno
                header("Location: partesAlumno.php?id={$id}"); 
                exit;
            }
            //FIN MOSTRAR PARTES DE ALUMNO -------------------------------------------------------------

        }




    }


?>