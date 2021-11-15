<?php
    include_once "cabecera.php";
    include_once "modelo.php";

    if (isset($_GET['id'])) {
        $partes = leerPartesAlumno(filtrado($_GET['id']));
    } else {
        $partes = leerPartes();
    }

?>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">PARTES
                            <a href="insertarParte.php"><i class='fas fa-fw fa-plus-square'></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
<?php

        if (count($partes) > 0) {
            //Sacar las etiquetas de las keys del array
            $etiquetas = array_keys($partes[0]);
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
            $etiquetas = array_keys($partes[0]);
            foreach($etiquetas as $etiqueta) {
                echo "<th>{$etiqueta}</th>";
            }  
            echo "<th>Acciones</th>";
?>                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        foreach($partes as $parte) {
                                            echo "<tr>";
                                            foreach($parte as $key => $value) {
                                                echo "<td>";
                                                if ($key == 'comunicado') {
                                                    if ($value == 0)
                                                        echo "No";
                                                    else    
                                                        echo "Si";
                                                } else 
                                                    echo $value;
                                                echo "</td>";
                                            }
                                            echo "<td>
                                            <a href='controlador.php?accion=borrarParte&id={$parte['id']}'>
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
        }

    include "pie.php";
?>