<?php
    session_start();
    //session_destroy();

    include "./lib.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        if (isset($_SESSION['jugador'])) {
            //Pintamos la partida
            echo "<h2>BIENVENIDO AL BINGO 1.0</h2>";
            echo "<p>Cartones Jugadores</p>";
            for ($i=0; $i < $_SESSION['numJugadores']; $i++) {
                pintarCarton($_SESSION['jugadores'][$i]);
            }
            echo "<p>Cartón Jugador</p>";
            pintarCarton($_SESSION['jugador']);

            echo "<form action='controlador.php' method='get'>";
            echo "<button type='submit' name='bola'>Nueva Bola</button>";
            echo "</form>";

            pintarBolas($_SESSION['bolasSalidas']);
            


        } else {
            //Pinto el formulario de nueva partida
            echo "<form action='controlador.php' method='get'>";
            echo "<label>Número de jugadores</label>";
            echo "<input type='text' name='jugadores'>";
            echo "<button type='submit' name='nueva'>Nueva Partida</button>";
            echo "</form>";

        }

    ?>

    


</body>
</html>