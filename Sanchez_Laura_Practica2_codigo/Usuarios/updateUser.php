<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Modificar Usuario</title>
</head>
<body>
<?php

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$id=mysqli_real_escape_string($conexion,$_POST['id']);
$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
$correo = mysqli_real_escape_string($conexion,$_POST['email']);
$clave = mysqli_real_escape_string($conexion,$_POST['clave']);
$tipoUsuario = mysqli_real_escape_string($conexion,$_POST['tipoUsuario']);
$nombreActual=null;
$correoActual=null;
$claveActual=null;
$tipoUsuarioActual=null;


$sql="SELECT * FROM usuario WHERE usuario_id='$id'";
$resultado=mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
       $nombreActual=$row["nombre"];
       $correoActual=$row["correo"];
       $claveActual=$row["clave"];
       $tipoUsuarioActual=$row["tipo_usuario"];
       if($nombre==null){
        $nombre=$nombreActual;
       }
       if($correo==null){
            $correo=$correoActual;
       }
       if($clave==null){
        $clave=$claveActual;
       }
       if($tipoUsuario==null){
            $tipoUsuario=$tipoUsuarioActual;
       }
       $sql1 = "UPDATE usuario SET nombre='$nombre', correo='$correo', clave='$clave', tipo_usuario='$tipoUsuario' WHERE usuario_id='$id';";
        if (mysqli_query($conexion, $sql1)){
            echo "<div class='text-center text-success mt-5 fw-bold'>Datos del usuario modificados correctamente</div>";
        } else {
            echo "<div class='text-center text-danger mt-5 fw-bold mb-2'>No se ha podido realizar la modificación de usuario</div>";
        }
    }

} else {
    echo("<div class='text-center text-success mb-5'>No se han podido modificar los datos del usuario</div>");
    }

mysqli_close($conexion);
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");

?>
</body>
</html>