<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="estilos.css">
<title>Inmobiliaria</title>
</head>
<body>

    <h6 style='text-align:center;margin-top:50px;font-size:20px;color:white;'>Inicia sesión para acceder a la compra o venta de un piso:</h6><br>
    <div id="inicioSesion">
    <h3>Inicio de sesión</h3>
    <form method="post" action="usuariosRegistrados.php">
    
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre de Usuario</label>
        <input type="text" class="form-control" id="usuario" aria-describedby="emailHelp" name="nombre">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1"  name="password">
      </div>
      <button type="submit" class="btn btn-primary" style='background-color:#3eb97a;font-size:18px;'>Iniciar sesión</button>
    
</form>


    <p style='margin-top:20px;'>¿Aún no estás registrado?<a href="./Usuarios/addUserForm.php">Regístrate aquí</a></p>

    </div>

   <div class='volverMenu d-flex justify-content-center mt-3'>
        <a class='text-white text-decoration-none'href='index.php'>Volver al menú principal</a>
    <div">
    <script>

</script>
</body>
</html>