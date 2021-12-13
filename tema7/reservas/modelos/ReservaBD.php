<?php

    class ReservaBD {


        public static function getReservas($fecha) {
            $conexion = ConexionBD::conectar("reservas");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM reservas WHERE fecha = ?");
            $stmt->bindValue(1,$fecha);
            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');

            ConexionBD::cerrar();

            return $reservas;
        }

        public static function getReservasFiltro($fecha,$texto) {
            $conexion = ConexionBD::conectar("reservas");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM reservas WHERE fecha = ? AND (nombre LIKE ? OR email LIKE ? OR movil LIKE ?)");
            $stmt->bindValue(1,$fecha);
            $stmt->bindValue(2,"%$texto%");
            $stmt->bindValue(3,"%$texto%");
            $stmt->bindValue(4,"%$texto%");
            $stmt->execute();

            //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
            $reservas = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Reserva');

            ConexionBD::cerrar();

            return $reservas;
        }

        public static function cancelarReserva($id) {
            $conexion = ConexionBD::conectar("reservas");

            //Consulta BBDD
            $stmt = $conexion->prepare("UPDATE reservas SET estado = 'Cancelada' WHERE id = ?");
            $stmt->bindValue(1,$id);
            $stmt->execute();

            ConexionBD::cerrar();
        }


        public static function insertarReserva($reserva) {
            $conexion = ConexionBD::conectar("reservas");

            try {
                //Insertar
                $stmt = $conexion->prepare("INSERT INTO reservas (nombre, email, movil, fecha, turno, hora, npersonas, id_mesa, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Confirmada')");
                // Bind
                $stmt->bindValue(1, $reserva['nombre']);
                $stmt->bindValue(2, $reserva['email']);
                $stmt->bindValue(3, $reserva['movil']);
                $stmt->bindValue(4, $reserva['fecha']);
                $stmt->bindValue(5, $reserva['turno']);
                $stmt->bindValue(6, $reserva['hora']);
                $stmt->bindValue(7, $reserva['npersonas']);
                $stmt->bindValue(8, $reserva['idMesa']);
                // Ejecuta la consulta
                $stmt->execute();
            } catch (PDOException $e){
                echo $e->getMessage();
            }

            ConexionBD::cerrar();
        }

        
        public static function checkReserva($reserva) {
            $conexion = ConexionBD::conectar("reservas");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT * FROM reservas JOIN mesas ON reservas.id_mesa = mesas.id WHERE fecha = ? AND estado = 'Confirmada' AND turno = ?");
            $stmt->bindValue(1,$reserva['fecha']);
            $stmt->bindValue(2,$reserva['turno']);
            $stmt->execute();

            //Contamos las reservas ese día en ese turno
            $cuenta = $stmt->rowCount();

            ConexionBD::cerrar();

            return $cuenta;
        }

        


    }





?>