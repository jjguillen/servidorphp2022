<?php
    include "cabecera.php";

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Nuevo alumno</h2>
                    

                    <form action="controlador.php" method="post">                        
                        <div class="form-floating">
                        <input type="text" name="nombre" class="form-control">
                        <label for="floatingInput">Nombre</label>
                        </div>
                        
                        <div class="form-floating">
                        <input type="text" name="apellidos" class="form-control">
                        <label for="floatingInput">Apellidos</label>
                        </div>
                       
                        <div class="form-floating">
                        <input type="number" name="edad" class="form-control">
                        <label for="floatingInput">Edad</label>
                        </div>

                        <div class="form-floating">
                        <input type="text" name="dni" class="form-control">
                        <label for="floatingInput">DNI</label>
                        </div>

                        <div class="form-floating">
                        <input type="email" name="email" class="form-control">
                        <label for="floatingInput">Email</label>
                        </div>

                        <div class="form-floating">
                        <input type="text" name="localidad" class="form-control">
                        <label for="floatingInput">Localidad</label>
                        </div>

                        <div class="form-floating">
                        <input type="tel" name="telefono" class="form-control">
                        <label for="floatingInput">Móvil</label>
                        </div>

                        <div class="form-floating">
                        <select name="curso">
                            <?php
                                $cursos = array("1DAW", "2DAW", "1GA", "2GA", "1LAB","2LAB");
                                foreach($cursos as $curso) {
                                    echo "<option value='{$curso}'>{$curso}</option>";
                                }                                
                            ?>
                        </select>    
                        </div>

                        <!-- Esto va a ser para indicar la acción: insertar alumno -->
                        <input type="hidden" name="accion" value="insertarAlumno">

                        <div class='row'>
                            <div class='col-2'>
                                <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Insertar</button>
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