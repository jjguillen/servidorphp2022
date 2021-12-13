<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    
    <div class="container col-xxl-10 px-4 py-5">
        <div class="row flex-lg-row align-items-center g-5">
         
          <div class="col-lg-4">
            <h1 class="display-5 fw-bold lh-1 mb-3 text-success">Reservas restaurante</h1>
            <p class="lead">Selecciona fecha:</p>
            <form class='mb-2'>
                <input type="date" name="fecha" id="fecha">
            </form>

            <form class='mb-2'>
                <button type="button" class="btn btn-secondary px-4 me-md-2" data-bs-toggle="modal" data-bs-target="#nuevaReservaModal">Nueva reserva</button>
            </form>
          </div>

          <div class="col-lg-8 bg-secondary rounded p-4">
            <div class="row">
                <h4 class='text-white'>Reservas del día <span id='fechahoy'></span></h4>
                <form class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar por nombre, teléfono o email" aria-label="Fecha" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>
    
            <div class="row m-1" id="reservas">
                    



            </div>

          </div>

        </div>
      </div>
    
      <!-- MODAL INSERTAR ------------------------------------------------------------ -->
      <div class="modal fade" id="nuevaReservaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">NUEVA RESERVA</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="nuevaReservaForm">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Movil</label>
                        <input type="text" class="form-control" name="movil">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fecha" id='fechaForm'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Turno</label>
                        <select name="turno">
                            <option value="comida" selected>Comida</option>
                            <option value="cena">Cena</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Hora</label>
                        <select name="hora">
                            <option value="14:00" selected>14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nº personas</label>
                        <input type="number" class="form-control" name="npersonas" min="1" max="4">
                    </div>
                

            </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="botonNuevaReserva">Hacer reserva</button>
                    </div>

                </form>

            </div>
        </div>
        </div>
    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script>

        window.addEventListener("load",inicio);

        async function inicio() {
            //Obtenemos la fecha del día y la pintamos en el input
            var fecha = new Date();
            var dd = fecha.getDate();
            var mm = fecha.getMonth()+1;
            var yy = fecha.getFullYear();
            if(dd<10) {
                dd = '0'+dd
            } 
            if(mm<10) {
                mm = '0'+mm
            } 
            var strFecha = yy + "-" + mm + "-" + dd;
            document.getElementById("fecha").value = strFecha;
            document.getElementById("fechahoy").innerHTML = strFecha;
            

            //Llamada Ajax pintar las reservas de este día en el lado derecho 
            // --------------------------------------------------------------
            //CARGAR LA PÁGINA CON LOS REGALOS --------------------------------------------------------------------------
            const datos = new FormData(); 
            datos.append("accion","mostrarReservas"); 
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
            document.getElementById("reservas").innerHTML = await response.text(); 

            //Capturar evento de modificar el input de la fecha
            //INPUT FECHA  -----------------------------------------------------------------------------------------------
            document.getElementById("fecha").addEventListener("change", async function(e) {
                document.getElementById("fechahoy").innerHTML = e.target.value;
                const datos = new FormData(); 
                datos.append("accion","mostrarReservasDia"); 
                datos.append("fecha",e.target.value);
                const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                document.getElementById("reservas").innerHTML = await response.text(); 
            });

            //INPUT BUSCAR -----------------------------------------------------------------------------------------------
            document.getElementById("buscar").addEventListener("keyup", async function(e) {
                e.preventDefault();
                let buscar = e.target;
                const datos = new FormData(); //Lo mandamos siempre con POST
                datos.append("accion","buscar"); //Acción para que PHP sepa de donde vienen la petición HTTP
                datos.append("fecha",document.getElementById("fecha").value);
                datos.append("texto",buscar.value);
                const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                document.getElementById("reservas").innerHTML = await response.text(); 
            });

            //CANCELAR RESERVA ------------------------------------------------------------------------------------------
            document.getElementById("reservas").addEventListener("click", async function(e) {
                e.preventDefault();
                let cancelar = e.target.closest("svg[accion=cancelar]");
                if (cancelar) {
                    const datos = new FormData(); //Lo mandamos siempre con POST
                    datos.append("accion","cancelar"); //Acción para que PHP sepa de donde vienen la petición HTTP
                    datos.append("id",cancelar.getAttribute("id"));
                    datos.append("fecha",document.getElementById("fecha").value);
                    const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                    document.getElementById("reservas").innerHTML = await response.text(); 
                }
            });

            //NUEVA RESERVA  ------------------------------------------------------------------------------------------
            document.getElementById("botonNuevaReserva").addEventListener("click", async function(e) {
                e.preventDefault();
                let myModal = document.getElementById('nuevaReservaModal');
                document.getElementById("fechahoy").innerHTML = document.getElementById("fechaForm").value;
                document.getElementById("fecha").value = document.getElementById("fechaForm").value;
                const datos = new FormData(document.getElementById("nuevaReservaForm")); //Lo mandamos siempre con POST
                datos.append("accion","insertarReserva"); 
                const response = await fetch("enrutador.php", { method: 'POST', body: datos });
                
                //myModal.hide();
                //myModal.dispose();
                $('#nuevaReservaModal').modal('hide');
                document.getElementById("reservas").innerHTML = await response.text(); //Lo que devuelve la Vista                
                
            });   
            
        }
    </script>
</body>
</html>