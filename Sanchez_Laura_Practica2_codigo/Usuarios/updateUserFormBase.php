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
    <title>Modificar usuario</title>
</head>

<?php
mostrarCabecera();
?>
<body>

<h3 class="text-center">Introduce el id del usuario que quieres modificar:</h3>
        <div class="formularioBajaPiso m-auto border-border-black bg-white w-25 p-5">
      
            <form method="post" action="updateUserForm.php">
                <div class="mb-3">
                    <label for="id" class="form-label">Id:</label>
                    <input type="number" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required>
                </div>
                <button type="submit" class="btn btn-primary text-center w-100" style='background-color:#3eb97a;font-size:18px;'>Buscar</button>
            </form>
        </div>
</body>
</html>
