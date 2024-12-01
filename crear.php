<?php
    include "configuracion.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombreUsuario  = $_POST["nombreUsuario"];
        $email          = $_POST["email"];

        $sql = "INSERT INTO usuarios (nombreUsuario, email) VALUES ('$nombreUsuario','$email')";

        if ($conn->query($sql) === TRUE){
            header("Location: index.php");
        } else {
            echo "Error: ".$sql. "<br>". $conn->error;
        }
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5"> 
        <h1 class="mb-4">Crear Usuario</h1> 
        
        <form method="post">
            <div class="form-group"> 
                <label for = "nombreUsuario"> Nombre      :</label>
                <input 
                    type    = "text" 
                    class   = "form-control" 
                    name    = "nombreUsuario" 
                    required> 
            </div>

            <div class="form-group"> 
                <label for="email"> Email       :</label>
                <input 
                    type    = "email" 
                    class   = "form-control" 
                    name    = "email" 
                    required> 
            </div>

            <button 
                type    = "submit" 
                class   = "btn btn-primary"
                > Crear
            </button> 
        </form>
    </div>
    <!-- Enlace al archivo JavaScript de Bootstrap desde una CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php
$conn->close(); 
?>
