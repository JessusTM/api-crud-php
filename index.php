<?php
    include "configuracion.php";
    $sql    = "SELECT * FROM usuarios"; 
    $result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <link 
            href        = "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel         = "stylesheet" 
            integrity   = "sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin = "anonymous">
        <title>Listado</title>
        <script>
            function confirmaEliminacion(event){
                if (!confirm("Desea eliminar?")){
                    event.preventDefault();
                }
            }
        </script>
    </head>


    <body class="container mt-5"> 
        <a 
            href    = "crear.php" 
            class   = "btn btn-primary mb-3"
            >Nuevo
        </a> 
        
        <table class="table table-bordered"> 
            <thead class="thead-dark"> 
                <tr>
                    <th>ID              </th>
                    <th>Nombre          </th>
                    <th>E-mail          </th>
                    <th>Fecha Creación  </th>
                    <th>ACCIONES        </th>
                </tr>
            </thead>
            <tbody>
                <?php if($result->num_rows > 0): ?>                 <!-- Verificar si hay resultados -->
                    <?php while($user = $result->fetch_assoc()): ?> <!-- Iterar sobre cada registro -->
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']);?>             </td> 
                            <td><?php echo htmlspecialchars($user['nombreUsuario']);?>  </td> 
                            <td><?php echo htmlspecialchars($user['email']);?>          </td> 
                            <td><?php echo htmlspecialchars($user['fechaCreacion']);?>  </td> 
                            <td>
                                <a 
                                    href    = "actualizar.php?id = <?php echo $user['id']; ?>" 
                                    class   = "btn btn-warning btn-sm"
                                    >Editar
                                </a> 
                                <a 
                                    href    = "eliminar.php?id=<?php echo $user['id']; ?>" 
                                    onclick = "confirmaEliminacion(event)" 
                                    class   = "btn btn-danger btn-sm"
                                    >Eliminar
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                
                <?php else: ?>
                    <tr>
                        <td 
                            colspan = "5" 
                            class   = "text-center"
                            >No hay usuarios registrados
                        </td> 
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </body>
</html>

<?php
    $conn->close(); 
?>
