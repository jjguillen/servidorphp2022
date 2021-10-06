<?php
    include "cabecera.php";

    //Mis alumnos en un array
    $alumnos = $_SESSION['alumnos'];

?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ALUMNOS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
<?php
        //Sacar las etiquetas de las keys del array
        $etiquetas = array_keys($alumnos[0]);
        foreach($etiquetas as $etiqueta) {
            echo "<th>{$etiqueta}</th>";
        }  
        echo "<th>Acciones</th>";
?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
<?php
        //Sacar las etiquetas de las keys del array
        $etiquetas = array_keys($alumnos[0]);
        foreach($etiquetas as $etiqueta) {
            echo "<th>{$etiqueta}</th>";
        }                        
        echo "<th>Acciones</th>";               
?>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php
                                        foreach($alumnos as $alumno) {
                                            echo "<tr>";
                                            foreach($alumno as $value) {
                                                echo "<td>";
                                                echo $value;
                                                echo "</td>";
                                            }

                                            echo "<td>
                                                        <a href='controlador.php?accion=borrarAlumno&email={$alumno['email']}'>
                                                            <i class='fas fa-fw fa-trash-alt'></i>
                                                        </a>
                                                  </td>";

                                            echo "</tr>";
                                        }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<?php
    include "pie.php";
?>