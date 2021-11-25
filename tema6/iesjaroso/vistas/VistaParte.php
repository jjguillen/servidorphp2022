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
                <h6 class="m-0 font-weight-bold text-primary">CURSOS
                <a href="enrutador.php?accion=insertarCurso"><i class="fas fa-fw fa-plus-square"></i></a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>Curso</th>
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
                        <td>'.$parte->getCurso_id().'</td>
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

    }