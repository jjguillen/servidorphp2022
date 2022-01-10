

        </div> <!-- Ajax -->

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!----------------------- AJAX -------------------->

<script>
    //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
    window.addEventListener("load" ,inicio);

    //Función que escucha los eventos
    function inicio() {

        //Botón de borrar noticia
        document.getElementById("ajax").addEventListener("click", async function(e)  {
            e.preventDefault(); //Para no enviar el form

            //Botón BORRAR. Con closest buscamos el botón dentro del div 'ajax' más cercano a la ocurrencia del evento click
            let botonBorrar = e.target.closest("button[accion=borrarN]");
		    if (botonBorrar) {
                const datos = new FormData(); //Lo mandamos siempre con POST
                datos.append("accion","borrarN"); //Acción para que PHP sepa de donde vienen la petición HTTP
                datos.append("id",botonBorrar.value);
                
                const response = await fetch("enrutador.php", { //Fetch hace la petición
                    method: 'POST', // *GET, POST, PUT, DELETE, etc.
                    body: datos
                });                
                //Tratar la respuesta
                document.getElementById("ajax").innerHTML = await response.text(); //Lo que devuelve la Vista
		    }

            //Form INSERTAR
            let enviarFormInsertar = e.target.closest("button[accion=nuevaNoticia]");
            if (enviarFormInsertar) {
                const datos = new FormData(document.getElementById("formNuevaNoticia")); //Lo mandamos siempre con POST
                datos.append("accion","crearNoticia"); 
                const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
                //Tratar la respuesta
                document.getElementById("ajax").innerHTML = await response.text(); //Lo que devuelve la Vista                
            }


        });
        //Fin botón borrar noticia ---------------------------------

        //Botón cargar formulario nueva noticia --------------------
        document.getElementById("bNuevaNoticia").addEventListener("click", async function(e) {
            const datos = new FormData(); //Lo mandamos siempre con POST
            datos.append("accion","nuevaNoticia");
            const response = await fetch("enrutador.php", { method: 'POST', body: datos });                
            document.getElementById("ajax").innerHTML = await response.text(); //Lo que devuelve la Vista            
        });
        //Fin botón cargar formulario nueva noticia ----------------
    }

</script>


<!------------------------------------------------->

</body>
</html>