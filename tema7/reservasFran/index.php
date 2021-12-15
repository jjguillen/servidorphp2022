<?php
    include "controlador/cabecera.php";
    include "controlador/navegador.php";
?>
    <div id="contenido">
        <h2>Reservas del Restaurante</h2>
        <table>
            <thead>
                <th>Numero Mesa</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Gmail</th>
                <th>Movil</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Numero Personas</th>
                <th>Estado</th>
            </thead>
            <tbody>
            <?php
                /*include "controlador/mysql.php";
                mostrarReservas();*/
            ?>
            </tbody>
            <tfoot>
                <th>Numero Mesa</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Gmail</th>
                <th>Movil</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Numero Personas</th>
                <th>Estado</th>
            </tfoot>
        </table>
    </div>
<?php
    include "controlador/pie.php";
?>
