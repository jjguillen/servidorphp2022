<?php
    include "cabecera.php";

    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                   
<?php
                $email = filtrado($_GET['email']);
                for($i=0; $i<count($_SESSION['alumnos']); $i++) {
                    if (strcmp($email, $_SESSION['alumnos'][$i]['email']) == 0) {
                        $alumno = $_SESSION['alumnos'][$i];
                    }
                }

?>

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Editando alumno <?=$email;?></h2>
                    

                    <form action="controlador.php" method="post">                        
                        <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" 
                               value="<?=$alumno['nombre'];?>" id="floatingInput">
                        <label for="floatingInput">Nombre</label>
                        </div>
                        
                        <div class="form-floating">
                        <input type="text" name="apellidos" class="form-control" 
                               value="<?=$alumno['apellidos'];?>" id="floatingInput">
                        <label for="floatingInput">Apellidos</label>
                        </div>
                       
                        <div class="form-floating">
                        <input type="number" name="edad" class="form-control" 
                               value="<?=$alumno['edad'];?>" id="floatingInput">
                        <label for="floatingInput">Edad</label>
                        </div>

                        <div class="form-floating">
                        <input type="text" name="dni" class="form-control" 
                               value="<?=$alumno['dni'];?>" id="floatingInput">
                        <label for="floatingInput">DNI</label>
                        </div>

                        <div class="form-floating">
                        <input disabled type="email" name="email" class="form-control" 
                               value="<?=$alumno['email'];?>" id="floatingInput">
                        <label for="floatingInput">Email</label>
                        </div>

                        <input type='hidden' name='email' value='<?=$alumno['email'];?>'>

                        <div class="form-floating">
                        <input type="text" name="localidad" class="form-control" 
                               value="<?=$alumno['localidad'];?>" id="floatingInput">
                        <label for="floatingInput">Localidad</label>
                        </div>

                        <div class="form-floating">
                        <input type="tel" name="telefono" class="form-control" 
                               value="<?=$alumno['telefono'];?>" id="floatingInput">
                        <label for="floatingInput">Móvil</label>
                        </div>

                        <div class="form-floating">
                        <select name="curso">
                            <?php
                                $cursos = array("1DAW", "2DAW", "1GA", "2GA", "1LAB","2LAB");
                                foreach($cursos as $curso) {
                                    if (strcmp($alumno['curso'],$curso) == 0)
                                        echo "<option value='{$curso}' selected>{$curso}</option>";
                                    else
                                        echo "<option value='{$curso}'>{$curso}</option>";
                                }                                
                            ?>
                        </select>    
                        </div>

                        <!-- Esto va a ser para decidir si estamos tratando el login o el registro 
                            desde el controlador 
                        -->
                        <input type="hidden" name="accion" value="modificarAlumno">

                        <div class='row'>
                            <div class='col-2'>
                                <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Modificar</button>
                                <button class="w-100 btn btn-lg btn-primary" type="reset">Deshacer</button>
                            </div>
                        </div>
                        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                    </form>

                </div>
                <!-- /.container-fluid -->


<?php
    include "pie.php";
?>