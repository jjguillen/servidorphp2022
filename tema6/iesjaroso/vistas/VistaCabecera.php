<?php

    class VistaCabecera extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($productos) {

            $this->html = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
            
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">
            
                <title>IES JAROSO - ADMIN</title>
            
                <!-- Custom fonts for this template -->
                <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
                <link
                    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                    rel="stylesheet">
            
                <!-- Custom styles for this template -->
                <link href="css/sb-admin-2.min.css" rel="stylesheet">
            
                <!-- Custom styles for this page -->
                <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
            
            </head>
            
            <body id="page-top">
            
                <!-- Page Wrapper -->
                <div id="wrapper">
            
                    <!-- Sidebar -->
                    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            
                        <!-- Sidebar - Brand -->
                        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="enrutador.php?accion=mostrarAlumnos">
                            <div class="sidebar-brand-text mx-3">IES Jaroso - Admin</div>
                        </a>
            
                        <!-- Divider -->
                        <hr class="sidebar-divider my-0">
            
                        <!-- Nav Item - Dashboard -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">
                                <i class="fas fa-fw fa-tachometer-alt"></i>
                                <span>Panel de Control</span></a>
                        </li>
            
                        <!-- Divider -->
                        <hr class="sidebar-divider">
            
                        <!-- Heading -->
                        <div class="sidebar-heading">
                            Alumnado IES  
                        </div>
            
                        <!-- Nav Item - Alumnos -->
                        <li class="nav-item">
                            <a class="nav-link" href="alumnos.php">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Alumnos</span></a>
                        </li>
            
                        <!-- Nav Item - Cursos -->
                        <li class="nav-item">
                            <a class="nav-link" href="cursos.php">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Cursos</span></a>
                        </li>
            
                        <!-- Nav Item - Partes -->
                        <li class="nav-item">
                            <a class="nav-link" href="partes.php">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Partes Disciplinarios</span></a>
                        </li>
            
            
                        <!-- Divider -->
                        <hr class="sidebar-divider d-none d-md-block">
            
                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>
            
                    </ul>
                    <!-- End of Sidebar -->
            
                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">
            
                        <!-- Main Content -->
                        <div id="content">
            
                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            
                                <!-- Sidebar Toggle (Topbar) -->
                                <form class="form-inline">
                                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                </form>
            
                                <!-- Topbar Search -->
                                <form
                                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                            aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
            
                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">                        
            
                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$_SESSION['usuario'].'</span>
                                            <img class="img-profile rounded-circle"
                                                src="img/undraw_profile.svg">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Perfil
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Configuración
                                            </a>                                
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Salir
                                            </a>
                                        </div>
                                    </li>
            
                                </ul>
            
                            </nav>
                            <!-- End of Topbar -->
            
            ';

            return $this->html;
        }
    }
     