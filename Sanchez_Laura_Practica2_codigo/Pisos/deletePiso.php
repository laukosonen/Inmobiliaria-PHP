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
    <title>Borrar Piso</title>
</head>
<body>
<?php
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$codigoPiso = mysqli_real_escape_string($conexion,$_POST['codigoPiso']);
$sql = "DELETE FROM pisos WHERE Codigo_piso='$codigoPiso'";
mysqli_query($conexion, $sql);
if (mysqli_affected_rows($conexion) > 0) {
    echo "<div class='text-center text-success mt-5 fw-bold'>Piso eliminado correctamente</div>";
} else {
    echo "<div class='text-center text-danger mt-5 fw-bold mb-2'>No existe un piso registrado con ese código</div>";
}
mysqli_close($conexion);
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");
    ?>
</body>
</html>