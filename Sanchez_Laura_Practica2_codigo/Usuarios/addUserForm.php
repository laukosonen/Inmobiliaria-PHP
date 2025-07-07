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
    <title>Alta usuario</title>
</head>
<body>
<?php
if(isset($_SESSION['nombre'])){
    mostrarCabecera();
    print("<h3 class='text-center mt-5'>Rellena los datos del usuario:</h3>");
}
else{
    print("<h3 class='text-center mt-5'>Rellena tus datos:</h3>");
}
?>
        <div class="formularioBajaPiso m-auto border-border-black bg-white w-25 p-5">
      
            <form method="post" action="addUser.php" autocomplete="off">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico:</label>
                    <input type="email" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave:</label>
                    <input type="password" class="form-control w-100" id="exampleInputEmail1" aria-describedby="emailHelp" name="clave" required>
                </div>
                <div class="d-flex flex-row">
                <div class="form-check me-3 mb-3">
                    <input class="form-check-input border border-success p-2" type="radio" name="tipoUsuario" id="flexRadioDefault1" value="Cliente">
                    <label class="form-check-label" for="tipoUsuario">
                        Cliente
                    </label>
                </div>
                <div class="form-check me-3">
                    <input class="form-check-input border border-success p-2" type="radio" name="tipoUsuario" id="flexRadioDefault1" value="Vendedor">
                    <label class="form-check-label" for="tipoUsuario">
                        Vendedor
                    </label>
                </div>
                <div class="form-check me-3">
                    <input class="form-check-input border border-success p-2" type="radio" name="tipoUsuario" id="flexRadioDefault1" value="Administrador"> 
                    Administrador
                </div>
                </div>
                <button type="submit" class="btn btn-primary text-center w-100" style='background-color:#3eb97a;font-size:18px;'>Añadir</button>
          
            </form>
        </div>
    
</body>
</html>




