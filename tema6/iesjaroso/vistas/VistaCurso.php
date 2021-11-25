<?php

    class VistaCurso extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($elementos) {
            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");

            $this->html .= '<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CURSOS
                            <a href="enrutador.php?accion=insertarCurso"><i class="fas fa-fw fa-plus-square"></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Etapa</th>
                                            <th>Año</th>
                                            <th>Acciones</th>            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>';

            foreach($elementos as $curso) {
                $this->html .= '<tr>
                                    <td>'.$curso->getNombre().'</td>
                                    <td>'.$curso->getEtapa().'</td>
                                    <td>'.$curso->getAnio().'</td>
                                ';

                $this->html .= "    <td>
                                        <a href='enrutador.php?accion=borrarCurso&id={$curso->getId()}'>
                                            <i class='fas fa-fw fa-trash-alt'></i>
                                        </a>
                                        <a href='enrutador.php?accion=editarCurso&id={$curso->getId()}'>
                                            <i class='fas fa-fw fa-user-edit'></i>
                                        </a>

                                    </td>
                                </tr>";
            }
        
            $this->html .= '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>';



              //Pie
            $vistaP = new VistaPie();
            $this->html .= $vistaP->render("");

            echo $this->html;
        }

        public function renderFormInsertar($curso) {
            //Cabecera
            $vistaC = new VistaCabecera();
            echo $vistaC->render("");

           //Edito o Inserto - Así pongo o no value
           if ($curso == "") 
                $ph = false;
            else 
                $ph = true;

            ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                <!-- Page Heading -->
                <h2 class="h3 mb-2 text-gray-800">Curso</h2>


                <form action="enrutador.php" method="get" >                        
                    <div class="form-floating">
                    <input type="text" name="nombre" class="form-control" value="<?= ($ph) ? $curso->getNombre() : '' ?>">
                    <label for="floatingInput">Nombre</label>
                    </div>
                    
                    <div class="form-floating">
                    <input type="text" name="etapa" class="form-control" value="<?= ($ph) ? $curso->getEtapa() : '' ?>">
                    <label for="floatingInput">Etapa</label>
                    </div>
                
                    <div class="form-floating">
                    <input type="number" name="anio" class="form-control" value="<?= ($ph) ? $curso->getAnio() : '' ?>">
                    <label for="floatingInput">Año</label>
                    </div>

                    <?php
                        if ($ph) { ?>
                            <!-- Esto va a ser para indicar la acción: editar curso -->
                            <input type="hidden" name="accion" value="editarCursoBD">
                            <input type="hidden" name="id" value="<?= $curso->getId() ?>">
            
                        <?php } else {?>
                            <!-- Esto va a ser para indicar la acción: insertar curso -->
                            <input type="hidden" name="accion" value="insertarCursoBD">
            
                        <?php }
                    ?>

                    <div class='row'>
                        <div class='col-2'>
                            <button class="w-100 btn btn-lg btn-primary mb-1 mt-1" type="submit">Confirmar</button>
                            <button class="w-100 btn btn-lg btn-primary" type="reset">Deshacer</button>
                        </div>
                    </div>
                    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
                </form>

                </div>
                <!-- /.container-fluid -->

            <?php


             //Pie
             $vistaP = new VistaPie();
             $this->html .= $vistaP->render("");
 
             echo $this->html;
         }
    



    }
