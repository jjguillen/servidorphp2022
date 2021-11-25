<?php

    class VistaAlumno extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($elementos) {
            //Cabecera
            $vistaC = new VistaCabecera();
            $this->html .= $vistaC->render("");

            $this->html .= '<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ALUMNOS
                            <a href="enrutador.php?accion=insertarAlumno"><i class="fas fa-fw fa-plus-square"></i></a>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Edad</th>
                                            <th>DNI</th>
                                            <th>Email</th>
                                            <th>Localidad</th>
                                            <th>Móvil</th>
                                            <th>Curso</th>
                                            <th>Avatar</th>
                                            <th>Acciones</th>            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>';

            foreach($elementos as $alumno) {
                $this->html .= '<tr>
                                    <td>'.$alumno->getNombre().'</td>
                                    <td>'.$alumno->getApellidos().'</td>
                                    <td>'.$alumno->getEdad().'</td>
                                    <td>'.$alumno->getDni().'</td>
                                    <td>'.$alumno->getEmail().'</td>
                                    <td>'.$alumno->getLocalidad().'</td>
                                    <td>'.$alumno->getTelefono().'</td>
                                    <td>'.$alumno->getCurso().'</td>
                                    <td><img width="50" src="data:image/jpeg;base64,'.base64_encode( $alumno->getAvatar() ).'"/></td>
                                ';

                $this->html .= "    <td>
                                        <a href='enrutador.php?accion=borrarAlumno&id={$alumno->getId()}'>
                                            <i class='fas fa-fw fa-trash-alt'></i>
                                        </a>
                                        <a href='enrutador.php?accion=editarAlumno&id={$alumno->getId()}'>
                                            <i class='fas fa-fw fa-user-edit'></i>
                                        </a>
                                        <a href='enrutador.php?accion=mostrarPartes&id={$alumno->getId()}'>
                                            <i class='fas fa-file-powerpoint'></i>
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




        public function renderFormInsertar($alumno) {
            //Cabecera
            $vistaC = new VistaCabecera();
            echo $vistaC->render("");

            //Edito o Inserto - Así pongo o no placeholder
            if ($alumno == "") 
                $ph = false;
            else 
                $ph = true;

?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

            <!-- Page Heading -->
            <h2 class="h3 mb-2 text-gray-800">Alumno</h2>


            <form action="enrutador.php" method="post" enctype="multipart/form-data">                        
                <div class="form-floating">
                <input type="text" name="nombre" class="form-control" value="<?= ($ph) ? $alumno->getNombre() : '' ?>">
                <label for="floatingInput">Nombre</label>
                </div>
                
                <div class="form-floating">
                <input type="text" name="apellidos" class="form-control" value="<?= ($ph) ? $alumno->getApellidos() : '' ?>">
                <label for="floatingInput">Apellidos</label>
                </div>
            
                <div class="form-floating">
                <input type="number" name="edad" class="form-control" value="<?= ($ph) ? $alumno->getEdad() : '' ?>">
                <label for="floatingInput">Edad</label>
                </div>

                <div class="form-floating">
                <input type="text" name="dni" class="form-control" value="<?= ($ph) ? $alumno->getDni() : '' ?>">
                <label for="floatingInput">DNI</label>
                </div>

                <div class="form-floating">
                <input type="email" name="email" class="form-control" value="<?= ($ph) ? $alumno->getEmail() : '' ?>">
                <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating">
                <input type="text" name="localidad" class="form-control" value="<?= ($ph) ? $alumno->getLocalidad() : '' ?>">
                <label for="floatingInput">Localidad</label>
                </div>

                <div class="form-floating">
                <input type="tel" name="telefono" class="form-control" value="<?= ($ph) ? $alumno->getTelefono() : '' ?>">
                <label for="floatingInput">Móvil</label>
                </div>

                <div class="form-floating">
                <select class="form-control" name="curso">
                    <?php
                        if ($ph)
                            ControladorCurso::mostrarCursosEnOption($alumno->getCurso());
                        else
                            ControladorCurso::mostrarCursosEnOption("");
                    ?>
                </select>   
                <label for="floatingInput">Curso</label>  
                </div>

                <div class="form-floating">
                        <input type="file" name="avatar" class="form-control">
                        <label>Avatar</label>
                </div>

                <?php
                    if ($ph) { ?>
                        <!-- Esto va a ser para indicar la acción: editar alumno -->
                        <input type="hidden" name="accion" value="editarAlumnoBD">
                        <input type="hidden" name="id" value="<?= $alumno->getId() ?>">
        
                    <?php } else {?>
                        <!-- Esto va a ser para indicar la acción: insertar alumno -->
                        <input type="hidden" name="accion" value="insertarAlumnoBD">
        
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
