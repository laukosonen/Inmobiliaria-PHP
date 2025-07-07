<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Borrar Usuario</title>
</head>
<body>
<?php
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$id = mysqli_real_escape_string($conexion,$_POST['id']);

$sql = "DELETE FROM usuario WHERE usuario_id='$id'";
mysqli_query($conexion, $sql);
if (mysqli_affected_rows($conexion) > 0) {
    echo "<div class='text-center text-success mt-5 fw-bold'>Usuario eliminado correctamente</div>";
} else {
    echo "<div class='text-center text-danger mt-5 fw-bold mb-2'>No existe un usuario registrado con ese ID</div>";
}
mysqli_close($conexion);
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");
?>
</body>
</html>