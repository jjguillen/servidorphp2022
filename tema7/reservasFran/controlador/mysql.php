<?php
    function conectar(){
        $dbname = "reservasFran";
        $user = "root";
        $password = "root";

        try{
            $dsn = "mysql:host=172.18.0.2;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $dbh;
    }    

    function nuevaReserva($numeroMesa, $nombre, $apellidos, $email, $movil, $fecha, $comidaCena, 
        $hora, $numeroPersonas, $estado){
        $dbh = conectar();

        try{
            $stmt = $dbh->prepare("INSERT INTO reservas (nombre, apellidos, email, movil, 
            fecha, comida_cena, hora, numero_personas, estado) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

           // $stmt->bindValue(1, $numeroMesa);
            $stmt->bindValue(1, $nombre);
            $stmt->bindValue(2, $apellidos);
            $stmt->bindValue(3, $email);
            $stmt->bindValue(4, $movil);
            $stmt->bindValue(5, $fecha);
            $stmt->bindValue(6, $comidaCena);
            $stmt->bindValue(7, $hora);
            $stmt->bindValue(8, $numeroPersonas);
            $stmt->bindValue(9, $estado);
            $stmt->execute();

            //$stmt->debugDumpParams();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function modificarReserva($numeroMesa, $hora, $numeroPersonas, $estado){
        $dbh = conectar();

        try{
            $stmt = $dbh->prepare("UPDATE reservas SET hora = :hora, numero_personas = :numero_personas, 
            estado = :estado WHERE numero_mesa = :numero_mesa");

            $stmt->bindParam(":numero_mesa", $numeroMesa, PDO::PARAM_STR);
            $stmt->bindValue(":hora", $hora);
            $stmt->bindValue(":numero_personas", $numeroPersonas);
            $stmt->bindValue(":estado", $estado);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cancelarReserva($numeroMesa, $estado){
        $dbh = conectar();

        try{
            $stmt = $dbh->prepare("UPDATE reservas SET estado = :estado WHERE numero_mesa = :numero_mesa");

            $stmt->bindParam(":numero_mesa", $numeroMesa, PDO::PARAM_STR);
            $stmt->bindValue(":estado", $estado);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function cambiarFechaBD($numeroMesa, $fecha){
        $dbh = conectar();

        try{
            $stmt = $dbh->prepare("UPDATE reservas SET fecha = :fecha WHERE numero_mesa = :numero_mesa");

            $stmt->bindParam(":numero_mesa", $numeroMesa, PDO::PARAM_STR);
            $stmt->bindValue(":fecha", $fecha);
            $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    function mostrarReservas(){
        $dbh = conectar();
        $stmt = $dbh->prepare("SELECT * FROM reservas");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($restaurante = $stmt->fetch()){
            echo "<tr>";
                echo "<td>" . $restaurante["numero_mesa"] . "</td>";
                echo "<td>" . $restaurante["nombre"] . "</td>";
                echo "<td>" . $restaurante["apellidos"] . "</td>";
                echo "<td>" . $restaurante["email"] . "</td>";
                echo "<td>" . $restaurante["movil"] . "</td>";
                echo "<td>" . $restaurante["fecha"] . "</td>";
                echo "<td>" . $restaurante["hora"] . "</td>";
                echo "<td>" . $restaurante["numero_personas"] . "</td>";
                echo "<td>" . $restaurante["estado"] . "</td>";
            echo "</tr>";
        }
        
        $dbh = null;
    }

    function buscarReservas($apellidos, $movil, $email, $fecha, $estado){
        $dbh = conectar();
        $stmt = $dbh->prepare("SELECT * FROM reservas WHERE apellidos = :apellidos AND movil = :movil 
        AND email = :email AND fecha = :fecha AND estado = :estado");
        $stmt->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(":movil", $movil, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);
        $stmt->execute();

        echo "<table>
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
            <tbody>";
        while($restaurante = $stmt->fetch()){
            if(($restaurante["estado"] == "confirmada") || ($restaurante["estado"] == "finalizada")){
                echo "<tr>";
                    echo "<td>" . $restaurante["numero_mesa"] . "</td>";
                    echo "<td>" . $restaurante["nombre"] . "</td>";
                    echo "<td>" . $restaurante["apellidos"] . "</td>";
                    echo "<td>" . $restaurante["email"] . "</td>";
                    echo "<td>" . $restaurante["movil"] . "</td>";
                    echo "<td>" . $restaurante["fecha"] . "</td>";
                    echo "<td>" . $restaurante["hora"] . "</td>";
                    echo "<td>" . $restaurante["numero_personas"] . "</td>";
                    echo "<td>" . $restaurante["estado"] . "</td>";
                echo "</tr>";
            }
        }
        echo "</tbody>
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
            </tfoot>";
        echo "</table>";
        
        $dbh = null;
    }
?>