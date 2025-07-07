<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Modificar Usuario</title>
    <title>Modificar Piso</title>
</head>
<body>
<?php

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$codigoPiso=mysqli_real_escape_string($conexion,$_POST['codigoPiso']);
$calle = mysqli_real_escape_string($conexion,$_POST['calle']);
$numero = mysqli_real_escape_string($conexion,$_POST['numero']);
$piso = mysqli_real_escape_string($conexion,$_POST['piso']);
$puerta = mysqli_real_escape_string($conexion,$_POST['puerta']);
$codigoPostal = mysqli_real_escape_string($conexion,$_POST['codigoPostal']);
$metros = mysqli_real_escape_string($conexion,$_POST['metros']);
$zona = mysqli_real_escape_string($conexion,$_POST['zona']);
$precio = mysqli_real_escape_string($conexion,$_POST['precio']);
$imagen = mysqli_real_escape_string($conexion,$_POST['imagen']);
$calleActual=null;
$numeroActual=null;
$pisoActual=null;
$puertaActual=null;
$codigoPostalActual=null;
$metrosActual=null;
$zonaActual=null;
$precioActual=null;
$imagenActual=null;

$sql="SELECT * FROM pisos WHERE Codigo_piso='$codigoPiso'";
$resultado=mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    while($row = mysqli_fetch_assoc($resultado)) {
       $calleActual=$row["calle"];
       $numeroActual=$row["numero"];
       $pisoActual=$row["piso"];
       $puertaActual=$row["puerta"];
       $codigoPostalActual=$row["cp"];
       $metrosActual=$row["metros"];
       $zonaActual=$row["zona"];
       $precioActual=$row["precio"];
       $imagenActual=$row["imagen"];

       if($calle==null){
        $calle=$calleActual;
       }
       if($numero==null){
            $numero=$numeroActual;
        }
       if($piso==null){
            $piso=$pisoActual;
       }
       if($puerta==null){
        $puerta=$puertaActual;
        }
        if($codigoPostal==null){
            $codigoPostal=$codigoPostalActual;
        }
        if($metros==null){
            $metros=$metrosActual;
        }
        if($zona==null){
            $zona=$zonaActual;
        }
        if($precio==null){
            $precio=$precioActual;
        }
        if($imagen==null){
            $imagen=$imagenActual;
        }


       $sql1 = "UPDATE pisos SET calle='$calle', numero='$numero', piso='$piso', puerta='$puerta', puerta='$puerta'
       , cp='$codigoPostal', metros='$metros', zona='$zona', precio='$precio', imagen='$imagen' WHERE Codigo_piso='$codigoPiso';";
        if (mysqli_query($conexion, $sql1)){
            echo "<div class='text-center text-success mt-5 fw-bold'>Datos del piso modificados correctamente</div>";
        } else {
            echo "<div class='text-center text-danger mt-5 fw-bold mb-2'>No se ha podido realizar la modificación de piso</div>";
        }
    }

} else {
    echo "No hay ningún piso registrado con ese código";
    }

mysqli_close($conexion);
print("<div class='text-center mb-3'>");
print("<a class='text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
print("</div>");

?>
</body>
</html>