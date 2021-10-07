<?php
    include "cabecera.php";

?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Nuevo curso</h2>
                    

                    <form action="controlador.php" method="post">                        
                        <div class="form-floating">
                        <input type="text" name="nombre" class="form-control">
                        <label>Nombre</label>
                        </div>
                        
                        <div class="form-floating">
                        <input type="text" name="etapa" class="form-control">
                        <label>Etapa</label>
                        </div>
                       
                        <div class="form-floating">
                        <input type="number" name="anio" class="form-control">
                        <label>Año</label>
                        </div>

                        <!-- Esto va a ser para indicar la acción: insertar curso -->
                        <input type="hidden" name="accion" value="insertarCurso">

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