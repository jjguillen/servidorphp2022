<?php

    class VistaParte extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($elementos) {
            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");

            $this->html .= '<div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">PARTES
                <a href="enrutador.php?accion=insertarParte"><i class="fas fa-fw fa-plus-square"></i></a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Profesor</th>
                                <th>Fecha</th>
                                <th>Hora</th>            
                                <th>Asignatura</th>   
                                <th>Gravedad</th>   
                                <th>Descripcion</th>                              
                                <th>Comunicado</th> 
                                <th>Acciones</th>                       
                            </tr>
                        </thead>
                       
                        <tbody>';

foreach($elementos as $parte) {
    $this->html .= '<tr>
                        <td>'.$parte->getAlumno_id().'</td>
                        <td>'.$parte->getUsuario_id().'</td>
                        <td>'.$parte->getFecha().'</td>
                        <td>'.$parte->getHora().'</td>
                        <td>'.$parte->getAsignatura().'</td>
                        <td>'.$parte->getGravedad().'</td>
                        <td>'.$parte->getDescripcion().'</td>
                        <td>'.$parte->getComunicado().'</td>
                    ';

    $this->html .= "    <td>
                            <a href='enrutador.php?accion=borrarParte&id={$parte->getId()}'>
                                <i class='fas fa-fw fa-trash-alt'></i>
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


        public function renderFormInsertar($alumnos, $profesores) {

             //Cabecera
             $vistaC = new VistaCabecera();
             echo $vistaC->render("");
 
           
             ?>
 
                 <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h2 class="h3 mb-2 text-gray-800">Nuevo parte</h2>


                    <form action="enrutador.php" method="post">   
                        
                        <div class="form-floating">
                            <select class='form-control' name="usuario_id" id="">
                                <?php
                                    foreach($profesores as $profe) {
                                        echo "<option value='{$profe->getId()}'>{$profe->getNombre()}</option>";
                                    }

                                ?>
                            </select>
                            <label>Profesor</label>
                        </div>

                        <div class="form-floating">
                            <select class='form-control' name="alumno_id" id="">
                                <?php
                                    foreach($alumnos as $alumno) {
                                        echo "<option value='{$alumno->getId()}'>{$alumno->getNombre()}&nbsp;{$alumno->getApellidos()}</option>";
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
 
                             <input type="hidden" name="accion" value="insertarParteBD">
 
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