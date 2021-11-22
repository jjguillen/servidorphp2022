<?php
    include "cabecera.php";
    include "modelo.php";

 
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                   
<?php
                
                $id = filtrado($_GET['id']);
                $alumno = leerAlumno($id);

?>

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Editando alumno <?=$alumno['nombre'];?></h2>
                    

                    <form action="controlador.php" method="post" enctype="multipart/form-data">                        
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
                        <input type="email" name="email" class="form-control" 
                               value="<?=$alumno['email'];?>" id="floatingInput">
                        <label for="floatingInput">Email</label>
                        </div>

                        <input type='hidden' name='id' value='<?=$alumno['id'];?>'>

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
                        <select class="form-control" name="curso">
                            <?php
                                $cursos = leerCursos();
                                foreach($cursos as $curso) {
                                    if ($alumno['curso'] == $curso['id'])
                                        echo "<option value='{$curso['id']}' selected>{$curso['nombre']}</option>";
                                    else
                                        echo "<option value='{$curso['id']}'>{$curso['nombre']}</option>";
                                }                                
                            ?>
                        </select>   
                        <label for="floatingInput">Curso</label> 
                        </div>

                        <div class="form-floating">
                                <input type="file" name="avatar" class="form-control">
                                <label>Avatar</label>
                        </div>

                        <!-- Esto va a ser para indicar la acción: modificar alumno -->
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