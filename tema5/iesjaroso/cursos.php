<?php
    include_once "cabecera.php";

    $cursos = $_SESSION['cursos'];
?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CURSOS
                            <a href="insertarCurso.php"><i class='fas fa-fw fa-plus-square'></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
<?php
        //Sacar las etiquetas de las keys del array
        $etiquetas = array_keys($cursos[0]);
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
        $etiquetas = array_keys($cursos[0]);
        foreach($etiquetas as $etiqueta) {
            echo "<th>{$etiqueta}</th>";
        }  
        echo "<th>Acciones</th>";
?>                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        foreach($cursos as $curso) {
                                            echo "<tr>";
                                            foreach($curso as $value) {
                                                echo "<td>";
                                                echo $value;
                                                echo "</td>";
                                            }
                                            echo "<td>
                                            <a href='controlador.php?accion=borrarCurso&id={$curso['id']}'>
                                                <i class='fas fa-fw fa-trash-alt'></i>
                                            </a>
                                            <a href='controlador.php?accion=editarCurso&id={$curso['id']}'>
                                                <i class='fas fa-fw fa-edit'></i>
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