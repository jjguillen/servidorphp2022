<?php
    include "cabecera.php";
    include "modelo.php";

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Nuevo parte</h2>
                    

                    <form action="controlador.php" method="post">   
                        
                        <div class="form-floating">
                            <select class='form-control' name="usuario_id" id="">
                                <?php
                                    $profes = leerProfesores();
                                    foreach($profes as $profe) {
                                        echo "<option value='{$profe['id']}'>{$profe['nombre']}</option>";
                                    }

                                ?>
                            </select>
                            <label>Profesor</label>
                        </div>

                        <div class="form-floating">
                            <select class='form-control' name="alumno_id" id="">
                                <?php
                                    $alumnos = leerAlumnos();
                                    foreach($alumnos as $alumno) {
                                        echo "<option value='{$alumno['id']}'>{$alumno['nombre']}&nbsp;{$alumno['apellidos']}</option>";
                                    }

                                ?>
                            </select>
                            <label>Alumno</label>
                        </div>


                        <div class="form-floating">
                        <input type="date" name="fecha" class="form-control">
                        <label>Fecha</label>
                        </div>
                        
                        <div class="form-floating">
                        <input type="text" name="hora" class="form-control" placeholder="hh:mm">
                        <label>Hora</label>
                        </div>
                       
                        <div class="form-floating">
                        <input type="text" name="asignatura" class="form-control">
                        <label>Asignatura</label>
                        </div>

                        <div class="form-floating">
                        <select class='form-control' name="gravedad" id="">
                            <option value="Alta">Alta</option>
                            <option value="Media">Media</option>
                            <option value="Leve">Leve</option>
                        </select>
                        <label>Gravedad</label>
                        </div>

                        <div class="form-floating">
                        <textarea name="descripcion" id="" cols="30" rows="5" class="form-control"></textarea>
                        <label>Descripción</label>
                        </div>

                        <div class="form-floating">
                        <input type="radio" name="comunicado" value="1" class="form-radio-input ml-1">
                        <label class="ml-4">Comunicado a las familias</label>
                        </div>


                        <!-- Esto va a ser para indicar la acción: insertar curso -->
                        <input type="hidden" name="accion" value="insertarParte">

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