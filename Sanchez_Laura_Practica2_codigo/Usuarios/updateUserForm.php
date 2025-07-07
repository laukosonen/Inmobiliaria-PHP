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
<?php
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$id=mysqli_real_escape_string($conexion,$_POST['id']);
$sql="SELECT * FROM usuario WHERE usuario_id='$id'";
$resultado=mysqli_query($conexion,$sql);
if(mysqli_num_rows($resultado) > 0){
    $row=mysqli_fetch_assoc($resultado);
print("<h3 class='text-center'>Modifica los datos que necesites del usuario</h3>");
print("<div class='formularioUpdateUser m-auto border-border-black bg-white w-25 p-5'>
<form method='post' action='updateUser.php'>
                <div class='mb-3'>
                    <label for='id' class='form-label'>Id:</label>
                    <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['usuario_id']."' aria-describedby='emailHelp' name='id' readonly>
                </div>
                <div class='mb-3'>
                    <label for='nombre' class='form-label'>Nombre:</label>
                    <input type='text' class='form-control w-100' id='exampleInputEmail1' value='".$row['nombre']."'  aria-describedby='emailHelp' name='nombre' required>
                </div>
                <div class='mb-3'>
                    <label for='email' class='form-label'>Correo electrónico:</label>
                    <input type='email' class='form-control w-100' id='exampleInputEmail1' value='".$row['correo']."' aria-describedby='emailHelp' name='email' required>
                </div>
                <div class='mb-3'>
                    <label for='clave' class='form-label'>Clave:</label>
                    <input type='password' class='form-control w-100' id='exampleInputEmail1' value='".$row['clave']."' aria-describedby='emailHelp' name='clave' required>
                </div>
                <div class='d-flex flex-row'>
                <div class='form-check me-3 mb-3'>
                    <input class='form-check-input border border-success p-2' type='radio' name='tipoUsuario' id='flexRadioDefault1' value='Cliente'>
                    <label class='form-check-label' for='tipoUsuario'>
                        Cliente
                    </label>
                </div>
                <div class='form-check me-3'>
                    <input class='form-check-input border border-success p-2' type='radio' name='tipoUsuario' id='flexRadioDefault1' value='Vendedor'>
                    <label class='form-check-label' for='tipoUsuario'>
                        Vendedor
                    </label>
                </div>
                <div class='form-check me-3'>
                    <input class='form-check-input border border-success p-2' type='radio' name='tipoUsuario' id='flexRadioDefault1' value='Administrador'>
                    Administrador
                </div>
                </div>
              
                <button type='submit' class='btn btn-primary text-center w-100' style='background-color:#3eb97a;font-size:18px;'>Cambiar</button>
            </form>
        </div>");
}else {
    echo("<div class='text-center text-danger mb-5'>No hay ningún usuario registrado con ese id</div>");
    }

mysqli_close($conexion);
?>
</body>
</html>
