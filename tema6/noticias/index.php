<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    
    <?php
        include_once("modelo/NoticiaBD.php");


        $noticias = NoticiaBD::getNoticias();


        echo "<table class='table'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th scope='col'>#</th>";
        echo "<th scope='col'>Encabezado</th>";
        echo "<th scope='col'>Texto</th>";
        echo "<th scope='col'>Fecha</th>";
        echo "<th scope='col'>Acciones</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";   

        foreach($noticias as $noticia) {
            echo "<tr>";
            echo "<th scope='row'>{$noticia->getId()}</th>";
            echo "<td>{$noticia->getEncabezado()}</td>";
            echo "<td>{$noticia->getTexto()}</td>";
            echo "<td>{$noticia->getFecha()}</td>";
            echo "<td><a href='controlador.php?accion=borrarN&id={$noticia->getId()}'>X</a></td>";
            echo "</tr>";
        }

        echo "</tbody></table>";

    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>