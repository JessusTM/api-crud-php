<?php
    include 'configuracion.php'; 

    $id         = $_GET['id'];                              
    $sql        = "SELECT * FROM usuarios WHERE id = $id";  
    $result     = $conn->query($sql);                       
    $user       = $result->fetch_assoc();                   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {     
        $nombreUsuario  = $_POST['nombreUsuario'];  
        $email          = $_POST['email'];          
        $sql            = "UPDATE usuarios SET nombreUsuario='$nombreUsuario', email='$email' WHERE id=$id"; 

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; 
    }
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Actualizar Usuario</title>
    </head>



    <body>
        <h1>Actualizar Usuario</h1>

        <form method="post">
            <label for="nombreUsuario">Nombre:</label>
            <input 
                type    = "text" 
                name    = "nombreUsuario" 
                value   = "<?php echo htmlspecialchars($user['nombreUsuario']); ?>" 
                required>
            
            <br>
            
            <label for="email">Email:</label>
            <input 
                type    = "email" 
                name    = "email" 
                value   = "<?php echo htmlspecialchars($user['email']); ?>" 
                required>
            
            <br>

            <button type="submit">Actualizar</button>
        </form>
    </body>
</html>

<?php
    $conn->close(); 
?>
