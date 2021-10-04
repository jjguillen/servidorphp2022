<?php
    $hola = 3;
    echo $GLOBALS["hola"] . "<br>";

    echo $_SERVER["PHP_SELF"] . "<br>";
    echo $_SERVER["SERVER_ADDR"] . "<br>";
    echo $_SERVER["SERVER_NAME"] . "<br>";
    echo $_SERVER["SERVER_PROTOCOL"] . "<br>";
    echo $_SERVER["REQUEST_METHOD"] . "<br>";
    echo $_SERVER["REQUEST_TIME"] . " " . date('d/m/Y h:i:s', $_SERVER["REQUEST_TIME"]) . "<br>";
    echo $_SERVER["DOCUMENT_ROOT"] . "<br>";
    echo $_SERVER["HTTP_ACCEPT"] . "<br>";
    echo $_SERVER["HTTPS"] . "<br>";
    echo $_SERVER["REMOTE_ADDR"] . "<br>";
    echo $_SERVER["REMOTE_HOST"] . "<br>";
    echo $_SERVER["REMOTE_PORT"] . "<br>";
    echo $_SERVER["SCRIPT_FILENAME"] . "<br>";
    echo $_SERVER["SERVER_PORT"] . "<br>";
    echo $_SERVER["REQUEST_URI"] . "<br>";
    
    echo $_GET['id']." ".$_GET['color']." ".$_GET['size']."<br>";





?>