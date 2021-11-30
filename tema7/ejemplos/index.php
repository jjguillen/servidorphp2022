<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ejemplos AJAX</title>
</head>
<body>
    
    <h2>Ejemplo PHP + Async/Await/Fetch</h2>

    <button id='bEjemplo'>Ejemplo botón</button>

    <form id="formulario" class="mt-3">
        <input type="text" name="nombre" id="nombre">
        <input type="number" name="edad" id="edad">
        <input type="submit" value="Enviar" id="enviarForm">
    </form>
    <div id="contenido"></div>

    <br>

    <button id="mostrarModal">Mostrar modal</button>
   <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
    
        //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
        window.addEventListener("load" ,inicio);

        //Función que escucha los eventos
        function inicio() {

            //Botón del formulario -------------------------------------------------------------------------------------
            document.getElementById("formulario").addEventListener("submit", async function(event) {
                event.preventDefault(); //Mandemos un formulario, hace que no se ejecute submit, sino esta función
                const datos = new FormData(event.target); //Incluye lo que lleve el formulario
                datos.append("accion","verFormulario"); //Acción para que PHP sepa de donde vienen la petición HTTP
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });

                //Tratar la respuesta
                document.getElementById("contenido").innerHTML = await response.text();
            });

            //Botón suelto ---------------------------------------------------------------------------------------------
            document.getElementById("bEjemplo").addEventListener("click", async function(event) {
                const datos = new FormData(); //Incluye lo que lleve el formulario
                datos.append("accion","pulsarBoton"); //Acción para que PHP sepa de donde vienen la petición HTTP
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });

                //Tratar la respuesta
                document.getElementById("contenido").innerHTML = await response.text();
            });

            //Botón para mostrar un modal -------------------------------------------------------------------------------
            document.getElementById('mostrarModal').addEventListener("click", function() {
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            });


        }


        /** Llama al servidor pasándole unos datos */
        async function peticionAjaxCompleta(url = '', data = {}) {
            // Opciones por defecto estan marcadas con un *
            const response = await fetch(url, { //Fetch hace la petición
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                //'Content-Type': 'application/json'
                 'Content-Type': 'application/x-www-form-urlencoded',
                },
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                //body: JSON.stringify(data) // body data type must match "Content-Type" header
            });
            
            //Tratar la respuesta
            document.getElementById("contenido").innerHTML = await response.text();
        }


    </script>

    


</body>
</html>