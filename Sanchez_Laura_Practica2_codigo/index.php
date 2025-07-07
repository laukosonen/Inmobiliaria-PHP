<?php
session_start();
require 'comun.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="estilos.css">    
<title>Listar pisos</title>
</head>
<body>
<?php

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT * FROM pisos;";
$resultado=mysqli_query($conexion, $sql);



if (mysqli_num_rows($resultado) > 0) {

    print("<div class='comprarVender m-5 d-flex justify-content-center'>

    <button type='button' class='btn btn-success py-2 px-3 me-3 w-25 border border-white'><a class='text-white text-decoration-none' href='inicioRegistro.php'>Comprar/Vender</a></button>
    <button type='button' class='btn btn-secondary py-2 px-3 w-25 border border-white'><a class='text-white text-decoration-none' href='inicioRegistro.php'>Administrar</a></button>");
    print("</div>");

    print("<h1 class='text-center mb-4 text-success' id='indexH1'>Echa un vistazo a nuestros pisos... </h1>");
  
    print("<div class='container d-flex justify-content-center flex-row flex-wrap w-100 '>");
    while($row = mysqli_fetch_assoc($resultado)) {
     
        print("<div class='anuncio m-0 d-flex justify-content-center p-3 border border-white w-50'>");
            print("<div class='descripcionPiso  text-center font-monospace w-45 mx-5'>");
                mostrarDatosPiso($row);
                if($row['estado']=="Disponible"){
                    print("<div id='estadoPisoD'><p>Disponible</p></div>");
                }
                else{
                    print("<div id='estadoPisoV'><p>Vendido</p></div>");
                }
            print("</div>");
            mostrarImagenPiso1($row); 
        print("</div>");
    }
    print("</div>");}
    mysqli_close($conexion);
?>  
</body>
</html>