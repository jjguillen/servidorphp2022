<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Ejemplo PHP + Async/Await/Fetch</h2>
    <button id="prueba">Prueba</button>
    <div id="contenido"></div>


    <form id="formulario">
        <input type="text" name="nombre" id="nombre">
        <input type="number" name="edad" id="edad">
        <input type="submit" value="Enviar" id="enviarForm">
    </form>


    <script>
    
        //Cuando cargue la página llama a inicio, donde tendré los escuchadores de los eventos
        window.addEventListener("load" ,inicio);

        //Función que escucha los eventos
        function inicio() {

            //Botón Prueba
            document.getElementById("prueba").addEventListener("click", function(event) {
                //event.preventDefault(); //Mandemos un formulario
                peticionAjax("escuchar.php",datos);
            });


            //Botón Prueba
            document.getElementById("enviarForm").addEventListener("click", function(event) {
                event.preventDefault(); //Mandemos un formulario
                const datos = new FormData(); 
                var form = document.getElementById('formulario');
                for (var i = 0; i < form.elements.length ; i++) {
                    console.log(form.elements[i].name);
                            datos.append(form.elements[i].name, form.elements[i].value);
                        }
                
                peticionAjaxFormulario("escuchar.php",datos);
            });

        }

        /** Llama al servidor pasándole unos datos */
        async function peticionAjaxFormulario(url = '', data = {}) {
            // Opciones por defecto estan marcadas con un *
 
            const response = await fetch(url, { //Fetch hace la petición
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                 'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: data
            });
            
            //Tratar la respuesta
            document.getElementById("contenido").innerHTML = await response.text();
        }


        /** Llama al servidor pasándole unos datos */
        async function peticionAjax(url = '', data = {}) {
            // Opciones por defecto estan marcadas con un *
            const response = await fetch(url, { //Fetch hace la petición
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                headers: {
                 'Content-Type': 'application/x-www-form-urlencoded',
                },
                //body: JSON.stringify(data) // body data type must match "Content-Type" header
                body: "nada=77"
            });
            
            //Tratar la respuesta
            document.getElementById("contenido").innerHTML = await response.text();
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