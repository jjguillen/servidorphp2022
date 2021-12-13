<?php

    class VistaReservas extends Vista {

        public function __construct() {
            parent::__construct();
        }

        public function render($reservas) {
            include "cabecera.php";
        }

        public function renderReservas($reservas) {
         
  
            foreach($reservas as $reserva ) {
                echo "<!-- Una reserva-->";
                echo "<ul class='list-group list-group-horizontal mt-2'>
                        <li class='list-group-item'>";

                if ($reserva->getTurno() == "comida") 
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-brightness-high' viewBox='0 0 16 16'>
                                <path d='M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z'/>
                            </svg>";
                else 
                    echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-moon' viewBox='0 0 16 16'>
                                <path d='M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z'/>
                            </svg>";

                echo "  </li>
                        <li class='list-group-item'>{$reserva->getHora()}</li>
                        <li class='list-group-item'>
                            <strong>{$reserva->getNombre()}</strong><br>
                            <small>{$reserva->getMovil()}</small>
                        </li>
                        <li class='list-group-item'>Mesa {$reserva->getId_mesa()}</li>

                        <li class='list-group-item'>{$reserva->getNPersonas()} 
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person' viewBox='0 0 16 16'>
                                <path d='M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z'/>
                            </svg>
                        </li>";
                
                if ($reserva->getEstado() == "Confirmada")
                        echo "<li class='list-group-item list-group-item-success'>";
                else
                    echo "<li class='list-group-item list-group-item-danger'>";

                echo "
                            {$reserva->getEstado()} <br>
                            
                                <svg accion='cancelar' id={$reserva->getId()} xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='red' class='bi bi-x-circle' viewBox='0 0 16 16'>
                                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                </svg>
                            
                                <svg accion='editar' id={$reserva->getId()} xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='blue' class='bi bi-plus-circle' viewBox='0 0 16 16'>
                                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
                                </svg>
                          
                        </li>
                    </ul>";
            }


            
        }


    }




?>