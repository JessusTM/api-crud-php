<?php
    $host   = "localhost";
    $db     = "UsuariosMantenedor";
    $user   = "root";
    $pass   = "123456";
    $conn   = new mysqli ($host, $user, $pass, $db);
    if ($conn->connect_error){
        die("Error al conectar, detalles del error: ".$conn->connect_error);
    }
?>