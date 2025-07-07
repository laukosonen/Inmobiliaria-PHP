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
    <title>Buscar Piso</title>
</head>
<body>
   
<?php
mostrarCabecera();
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$codigoPiso = mysqli_real_escape_string($conexion,$_POST['codigoPiso']);
$sql = "SELECT * FROM pisos WHERE Codigo_piso='$codigoPiso';";
$resultado=mysqli_query($conexion, $sql);
if (mysqli_num_rows($resultado) > 0) {
    echo("<p class='text-center fs-5'>Estos son los datos del piso:</p>");
    print("<div class='container d-flex justify-content-center align-items-center w-100 border border-white'>");

    while($row = mysqli_fetch_assoc($resultado)) {
        
        print("<div class='descripcionPiso d-flex justify-content-center align-items-center text-center font-monospace w-40 fs-5 me-5 p-2'>");
            mostrarDatosPiso($row);
        print("</div>");
        
            mostrarImagenPiso($row); 
    print("</div>");
    }
    print("</div>");}
    else{
        echo("<div class='text-center text-danger mb-5 mt-5 fw-bold fs-3'>No hay pisos registrados con ese código</div>");
}
    mysqli_close($conexion);
?>  
</body>
</html>