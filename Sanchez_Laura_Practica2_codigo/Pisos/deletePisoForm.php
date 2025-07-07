<?php
session_start();
require '../comun.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../estilos.css">
    <title>Borrar piso</title>
</head>

<?php
mostrarCabecera();
?>
<body>

<h3 class="text-center">Introduce el código del piso que quieres borrar:</h3>
        <div class="formularioBajaPiso m-auto border-border-black bg-white w-25 p-5">
      
            <form method="post" action="deletePiso.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Código piso:</label>
                    <input type="number" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" name="codigoPiso" required>
                </div>
                <button type="submit" class="btn btn-primary text-center w-100" style='background-color:#3eb97a;font-size:18px;'>Borrar</button>
          
            </form>
        </div>
    
</body>
</html>