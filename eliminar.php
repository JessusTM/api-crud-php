<?php
    include 'configuracion.php'; 

    $id     = $_GET['id'];                          // ID del usuario desde la URL
    $sql    = "DELETE FROM usuarios WHERE id=$id";  // Consulta SQL para eliminar el usuario

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");              // Redirigir a la página principal
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }

    $conn->close(); 
?>
