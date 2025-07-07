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
    <link rel="stylesheet" href="estilos.css">
    <title>Document</title>
</head>
<body>
<?php

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$calle = mysqli_real_escape_string($conexion,$_POST['calle']);
$numero = mysqli_real_escape_string($conexion,$_POST['numero']);
$piso = mysqli_real_escape_string($conexion,$_POST['piso']);
$puerta = mysqli_real_escape_string($conexion,$_POST['puerta']);
$codigoPostal = mysqli_real_escape_string($conexion,$_POST['codigoPostal']);
$metros = mysqli_real_escape_string($conexion,$_POST['metros']);
$zona = mysqli_real_escape_string($conexion,$_POST['zona']);
$municipio = mysqli_real_escape_string($conexion,$_POST['municipio']);
$precio = mysqli_real_escape_string($conexion,$_POST['precio']);
$imagen = mysqli_real_escape_string($conexion,$_POST['imagen']);
$nombre=$_SESSION['nombre'];


$sql1 ="SELECT usuario_id FROM usuario WHERE nombre='$nombre'";
$resultadoIdRegistrador=mysqli_query($conexion, $sql1);
if(mysqli_num_rows($resultadoIdRegistrador) > 0){
    $row=mysqli_fetch_assoc($resultadoIdRegistrador);
    $usuario_id=$row['usuario_id'];
}
else{
    print("Usuario no encontrado");
}
$sql ="INSERT INTO pisos (calle, numero, piso,puerta,cp,metros,zona,municipio,precio,imagen,usuario_id) VALUES ('$calle','$numero','$piso','$puerta',
'$codigoPostal','$metros','$zona','$municipio','$precio','$imagen','$usuario_id')";
if (mysqli_query($conexion, $sql)){
    echo "<div class='text-center text-success mt-5 mb-2 fw-bold'>Piso registrado correctamente</div>";
} else {
echo "Error en el registro: " . mysqli_error($conexion);
}
mysqli_close($conexion);
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");
?>
</body>
</html>