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
    <title>Ver pisos</title>
</head>
<body>
<?php
mostrarCabecera1();

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}

$zona = mysqli_real_escape_string($conexion,$_POST['location']);
$precio = mysqli_real_escape_string($conexion,$_POST['price']);
$metrosCuadrados = mysqli_real_escape_string($conexion,$_POST['surface']);
$resultado=0;

if($zona=="Todas" && $precio=="Todos" && $metrosCuadrados=="Todos"){
$sql = "SELECT * FROM pisos WHERE estado='Disponible'";
$resultado=mysqli_query($conexion, $sql);
}

elseif($zona=="Todas" && $precio=="Todos" && $metrosCuadrados!="Todos"){
$sql = "SELECT * FROM pisos WHERE metros<'$metrosCuadrados' AND estado='Disponible'";
$resultado=mysqli_query($conexion, $sql);
}

elseif($zona=="Todas" && $precio!="Todos" && $metrosCuadrados=="Todos"){
    $sql = "SELECT * FROM pisos WHERE precio<'$precio' AND estado='Disponible'";
    $resultado=mysqli_query($conexion, $sql);
}

elseif($zona!="Todas" && $precio=="Todos" && $metrosCuadrados=="Todos"){
    $sql = "SELECT * FROM pisos WHERE zona='$zona' AND estado='Disponible'";
    $resultado=mysqli_query($conexion, $sql);
}
elseif($zona!="Todas" && $precio!="Todos" && $metrosCuadrados=="Todos"){
    $sql = "SELECT * FROM pisos WHERE zona='$zona' AND precio<'$precio' AND estado='Disponible'";
    $resultado=mysqli_query($conexion, $sql);
}
elseif($zona=="Todas" && $precio!="Todos" && $metrosCuadrados!="Todos"){
    $sql = "SELECT * FROM pisos WHERE precio<'$precio' AND metros<'$metrosCuadrados' AND estado='Disponible'";
    $resultado=mysqli_query($conexion, $sql);
}
else{
    $sql = "SELECT * FROM pisos WHERE zona='$zona' AND precio<'$precio' AND metros<'$metrosCuadrados' AND estado='Disponible'";
    $resultado=mysqli_query($conexion, $sql);
    print("Entrando por aquí");
}


if (mysqli_num_rows($resultado) > 0) {
  
    print("<div class='container d-flex justify-content-center flex-column w-100'>");
    while($row = mysqli_fetch_assoc($resultado)) {
     
        print("<div class='anuncio d-flex justify-content-center align-items-center border border-white w-100 p-3'>");
            print("<div class='descripcionPiso  text-center font-monospace w-45 me-5'>");
                echo 
                "Código piso: " . $row["Codigo_piso"]."<br>"."Calle: " . $row["calle"]."<br>". "  Número: " 
                . $row["numero"]."<br>". " Piso: " . $row["piso"]."<br>".  "Puerta: " . $row["puerta"]."<br>"."Código postal: " . $row["cp"]."<br>"
                ."Metros cuadrados: " . $row["metros"]."<br>"."Zona: " . $row["zona"]."<br>"."Municipio: " . $row["municipio"]."<br>"."Precio: " . $row["precio"]."€"."<br>";
                print("<form method='post' action=confirmacionCompra.php>");
                print("<input type='hidden' name='idPiso' value='$row[Codigo_piso]'>");
                print("<input type='submit' id='botonComprar' value='COMPRAR'>");print("<br>");
                print("</form>");
            print("</div>"); 
            print("<div class='imagenPiso w-75 h-100 d-flex align-items-center'>");
                print("<img class='w-100 h-100' src='./img/$row[imagen]'>");
            print("</div>");   
        print("</div>");
  
    }
    print("</div>");}
    else{
        echo "<div class='text-center text-danger mt-5 fw-bold mb-2 fs-4'>Actulalmente no hay pisos registrados con las características seleccionadas</div>";
}
    mysqli_close($conexion);
?>  

</body>
</html>