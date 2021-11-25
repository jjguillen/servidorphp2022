<?php

    class ProfesorBD {

        /**
         * Comprueba que un usuario está logueado y su password es correcta
         */
        public static function checkLogin($email,$password) {

            $conexion = ConexionBD::conectar("iesjaroso");

            //Consulta BBDD
            $stmt = $conexion->prepare("SELECT password FROM usuarios WHERE email = :email");
            $stmt->bindValue(":email", $email);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_BOTH);

            //Cerrar conexión
            $dbh = null;

            //Desencriptar
            $method = 'aes-256-cbc';
            $key = hex2bin('5ae1b8a17bad4da4fdac796f64c16ecd');
            $iv = hex2bin('34857d973953e44afb49ea9d61104d8c');
            $password_decrypted = openssl_decrypt($resultado['password'], $method, $key, false, $iv);

            ConexionBD::cerrar();

            if ($password_decrypted == $password)
                return 1; //Correcto
            else 
                return 0; //Incorrecto

        }

    }