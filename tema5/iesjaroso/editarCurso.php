<?php
    include "cabecera.php";
    include_once "modelo.php";

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
                $id = filtrado($_GET['id']);
                $curso = leerCurso($id);
?>

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Editando curso <?=$curso['nombre'];?></h2>

                    <form action="controlador.php" method="post">                        
                        <div class="form-floating">
                        <input type="text" name="nombre" class="form-control" 
                               value="<?=$curso['nombre'];?>">
                        <label>Nombre</label>
                        </div>

                        <div class="form-floating">
                        <input type="text" name="etapa" class="form-control" 
                               value="<?=$curso['etapa'];?>">
                        <label>Etapa</label>
                        </div>

                        <div class="form-floating">
                        <input type="number" name="anio" class="form-control" 
                               value="<?=$curso['anio'];?>">
                        <label>Año</label>
                        </div>                        
                        
                        <!--IMPORTANTE PARA QUE MODIFIQUE EL CURSO QUE ESTOY MOSTRANDO -->
                        <input type="hidden" name="id" value="<?=$curso['id'];?>">


                        <!-- Esto va a ser para indicar la acción: modificar curso -->
                        <input type="hidden" name="accion" value="modificarCurso">

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