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
    <title>Buscar Usuario</title>
</head>
<body>
<?php
mostrarCabecera();
?>
<?php
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
$sql = "SELECT * FROM usuario WHERE nombre='$nombre'";
$resultado=mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    echo("<div class='text-center mb-5'>A continuación se muestran los datos del usuario:</div>");
    print("<div class='text-center'>");
    while($row = mysqli_fetch_assoc($resultado)) {
    echo "id: " . $row["usuario_id"]."<br>"."Nombre: " . $row["nombre"]."<br>". "  Correo electrónico: " 
    . $row["correo"]."<br>". "  Tipo de usuario: " . $row["tipo_usuario"]."<br><br>";
    print("</div>");
    }
   
    } else {
        echo "<div class='text-center text-danger mt-5 fw-bold mb-2'>No existe un usuario registrado con ese nombre</div>";
    }
    mysqli_close($conexion);
?>  
</body>
</html>