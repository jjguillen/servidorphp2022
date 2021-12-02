<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="vistas/assets/favicon.png">

    <title>Regalos de Navidad</title>


    <!-- Bootstrap core CSS -->
    <link href="" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>

  <body>

    <header>
    
    <div class="navbar navbar-dark bg-danger box-shadow">
        <div class="container d-flex justify-content-between">
        <a href="./index.php" class="navbar-brand d-flex align-items-center">
            <strong>Mis regalos de navidad</strong>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
    </header>

    <main role="main">

        <div class="album py-5 bg-light">
            
            <div class="container">
                <button type="button" class="btn btn-warning" id="nuevoRegalo">Nuevo regalo</button>

                <div class="container mt-3" id="contenido"></div>

            
        </div>

    </main>

    <footer class="text-muted">
    <div class="container">
        <p class="float-right">
        <a href="#">Subir</a>
        </p>
        <p>Regalitos de Navidad by JJ Teacher </p>
    </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <script>
    //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
    window.addEventListener("load" ,inicio);

    //Función que escucha los eventos
    async function inicio() {

        //CARGAR LA PÁGINA CON LOS REGALOS --------------------------------------------------------------------------
        const datos = new FormData(); 
        datos.append("accion","mostrarRegalos"); 
        
        const response = await fetch("enrutador.php", { //Fetch hace la petición
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            body: datos
        });                
        //Tratar la respuesta
        document.getElementById("contenido").innerHTML = await response.text(); //Lo que devuelve la Vista


        //ACCIONES DE LOS BOTONES ------------------------------------------------------------------------------------

        //Botón de borrar noticia
        document.getElementById("contenido").addEventListener("click", async function(e)  {
            e.preventDefault(); //Para no enviar el form

            //Botón BORRAR. Con closest buscamos el botón dentro del div 'ajax' más cercano a la ocurrencia del evento click
            let botonBorrar = e.target.closest("button[accion=borrarRegalo]");
		    if (botonBorrar) {
                const datos = new FormData(); //Lo mandamos siempre con POST
                datos.append("accion","borrarRegalo"); //Acción para que PHP sepa de donde vienen la petición HTTP
                datos.append("id",botonBorrar.value);
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });                
                //Tratar la respuesta
                document.getElementById("contenido").innerHTML = await response.text(); //Lo que devuelve la Vista
		    }

            //Form INSERTAR
            let enviarFormInsertar = e.target.closest("button[accion=insertarRegalo]");
            if (enviarFormInsertar) {
                const datos = new FormData(document.getElementById("nuevoRegaloForm")); //Lo mandamos siempre con POST
                datos.append("accion","insertarRegalo"); 
                const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                //Tratar la respuesta
                document.getElementById("contenido").innerHTML = await response.text(); //Lo que devuelve la Vista                
            }


        });
        //Fin botón borrar noticia ---------------------------------

        //Botón cargar formulario nuevo regalo --------------------
        document.getElementById("nuevoRegalo").addEventListener("click", async function(e) {
            const datos = new FormData(); //Lo mandamos siempre con POST
            datos.append("accion","nuevoRegalo");
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
            document.getElementById("contenido").innerHTML = await response.text(); //Lo que devuelve la Vista            
        });
        //Fin botón cargar formulario nueva noticia ----------------

       
    }

</script>

</body></html>

    