<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Alta Usuario</title>
</head>
<body>
<?php

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
$correo = mysqli_real_escape_string($conexion,$_POST['email']);
$clave = mysqli_real_escape_string($conexion,$_POST['clave']);
$tipoUsuario = mysqli_real_escape_string($conexion,$_POST['tipoUsuario']);
$sql="SELECT * FROM usuario WHERE nombre='$nombre';";
$resultado=mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    echo("<div class='text-center text-danger mb-5 mt-5 fw-bold'>El nombre de usuario ya existe</div>");
}
else{
$sql1 = "INSERT INTO usuario (nombre, correo, clave,tipo_usuario) VALUES ('$nombre','$correo','$clave','$tipoUsuario')";
if (mysqli_query($conexion, $sql1)){
    echo("<div class='text-center text-success mb-5'>Usuario registrado correctamente</div>");
} else {
echo "Error en el registro: " . mysqli_error($conexion);
}
}
mysqli_close($conexion);
if(isset($_SESSION['nombre'])){
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");
}
else{
    print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../inicioRegistro.php' >Ya puedes INICIAR SESIÓN</a>");
print("</div>");
}
?>
</body>
</html>