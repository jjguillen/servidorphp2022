<?php
    function filtrado($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        return $datos;
    }

    function mesas($numeroMesa, $personasQueCaben){
        include "mysql.php";
        $dbh = conectar();

        try{
            $stmt = $dbh->prepare("INSERT INTO mesas(numero_mesa, personas_que_caben) VALUES (?, ?)");

            $stmt->bindValue(1, $numeroMesa);
            $stmt->bindValue(2, $personasQueCaben);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    include "lib.php";
    /*
    $mesas = leerArchivo();

    for($i=0; $i<sizeof($mesas); $i++){
        mesas($mesas[$i][0], $mesas[$i][1]);
    }
    */

    function añadirReserva(){
        if($_POST){
            if(isset($_POST['enviarNueva'])){
                if(isset($_POST['numeroMesa']) || isset($_POST['nombre']) || isset($_POST['apellidos']) 
                    || isset($_POST['gmail']) || isset($_POST['movil']) || isset($_POST['fecha']) || 
                    isset($_POST['comida']) || isset($_POST['hora']) || isset($_POST['numeroPersonas'])
                    || isset($_POST['estado'])){
                    include_once "mysql.php";
                    nuevaReserva(filtrado($_POST['numeroMesa']), filtrado($_POST['nombre']), 
                    filtrado($_POST['apellidos']), filtrado($_POST['gmail']), filtrado($_POST['movil']), 
                    filtrado($_POST['fecha']), filtrado($_POST['comida']), filtrado($_POST['hora']), 
                    filtrado($_POST['numeroPersonas']), filtrado($_POST['estado']));
                    header("Location: ../index.php");
                }
            }
        }
    }

    function actualizarReserva(){
        if($_POST){
            if(isset($_POST['enviarModificar'])){
                if(isset($_POST['numeroMesa']) || isset($_POST['hora']) || isset($_POST['numeroPersonas'])
                    || isset($_POST['estado'])){
                    include "mysql.php";
                    modificarReserva(filtrado($_POST['numeroMesa']), filtrado($_POST['hora']), 
                    filtrado($_POST['numeroPersonas']), filtrado($_POST['estado']));
                }
            }
        }
    }

    function cambiarReserva(){
        if($_POST){
            if(isset($_POST['enviarCancelacion'])){
                if(isset($_POST['numeroMesa']) || isset($_POST['estado'])){
                    include "mysql.php";
                    cancelarReserva(filtrado($_POST['numeroMesa']), filtrado($_POST['estado']));
                }
            }
        }
    }

    function cambiarFecha(){
        if($_POST){
            if(isset($_POST['enviarFecha'])){
                if(isset($_POST['numeroMesa']) || isset($_POST['fecha'])){
                    include "mysql.php";
                    cambiarFechaBD(filtrado($_POST['numeroMesa']), filtrado($_POST['fecha']));
                }
            }
        }
    }

    function mesasLibres($reservas, $mesas){
        $numeroMesas = sizeof($mesas);
        $numeroReservas = sizeof($reservas);
        $resultado = $numeroMesas - $numeroReservas;

        if($resultado > 0 && $resultado < $numeroMesas){
            echo "<p>Hay mesas libres, puede hacer la reserva y solicitar su comida</p>";
        }else{
            echo "<p>No hay mesas libres, no puede hacer la reserva y solicitar su comida</p>";
        }
    }

    //añadirReserva();
    //actualizarReserva();
    //cambiarReserva();
    //cambiarFecha();

    if (isset($_POST)) {
        if ($_POST['accion'] == "nueva") {
            añadirReserva();
        }
    }
?>