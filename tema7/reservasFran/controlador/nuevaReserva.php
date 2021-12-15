<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante - Nueva Reserva</title>
    <style type="text/css">
        body{
            margin: 0 auto;
            width: 95%;
        }
        #cabecera{
            border: 1px solid black;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        h1{
            color: green;
        }
        #navegador{
            border: 1px solid black;
            border-radius: 10px;
            padding: 10px;
            float: left;
            margin-right: 20px;
        }
        .nav{
            color: green;
        }
        a{
            color: green;
            text-decoration: none;
        }
        a:hover{
            color: greenyellow;
            text-decoration: underline;
        }
        ul{
            list-style-type: none;
        }
        li{
            padding: 10px;
            margin-left: -35px;
        }
        #contenido{
            background-color: grey;
            color: white;
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
            width: 47%;
            float: left;
            margin-bottom: 20px;
        }
        #pie{
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            color: green;
            clear: both;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div id="cabecera">
        <h1>Reservas restaurante</h1>
    </div>
    <div id="navegador">
        <h2 class="nav">Opciones de Reserva:</h2>
        <ul>
            <li><a href="controlador/nuevaReserva.php">Nueva Reserva</a></li>
            <li><a href="controlador/modificarReserva.php">Modificar Reserva</a></li>
            <li><a href="controlador/cancelarReserva.php">Cancelar Reserva</a></li>
            <li><a href="controlador/cancelarFecha.php">Cancelar Fecha</a></li>
        </ul>
    </div>
    <div id="contenido">
        <h2>Nueva Reserva</h2>
        <form action="controlador.php" method="post">
            <label>Numero Mesa:</label><br>
            <input type="number" name="numeroMesa"><br>
            <label>Nombre:</label><br>
            <input type="text" name="nombre"><br>
            <label>Apellidos:</label><br>
            <input type="text" name="apellidos"><br>
            <label>Gmail:</label><br>
            <input type="email" name="gmail"><br>
            <label>Móvil:</label><br>
            <input type="text" name="movil"><br>
            <label>Fecha:</label><br>
            <input type="date" name="fecha"><br>
            <label>Comida-Cena:</label><br>
            <input type="text" name="comida"><br>
            <label>Hora:</label><br>
            <input type="time" name="hora"><br>
            <label>Numero de personas:</label><br>
            <input type="number" name="numeroPersonas"><br>
            <label>Estado:</label><br>
            <input type="hidden" name="accion" value="nueva">
            <input type="text" name="estado"><br><br>
            <input type="submit" name="enviarNueva" value="Enviar">
        </form>
    </div>
    <div id="pie">
        <p>Esta pagina web es donde se realizan las reservas del restaurante</p>
    </div>
</body>
</html>