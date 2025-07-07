<?php
session_start();
require 'comun.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Comprar piso</title>
</head>
<body>
    <?php
mostrarCabecera1();

$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$sql = "SELECT * FROM pisos WHERE estado='Disponible';";
$sql1="SELECT *FROM usuario WHERE nombre='$_SESSION[nombre]';";
$resultado=mysqli_query($conexion, $sql);
$resultado1=mysqli_query($conexion, $sql1);
$row1=mysqli_fetch_assoc($resultado1);
$compra=false;
echo("Estos son los pisos disponibles:")."<br><br>";
if (mysqli_num_rows($resultado) > 0) {
    print("<div class=container>");
    while($row = mysqli_fetch_assoc($resultado) ) {

        print("<div class=anuncio>");
            print("<div id=descripcionPiso>");
                mostrarDatosPiso($row);

                print("<form method='post' action=confirmacionCompra.php>");
                print("<input type='hidden' name='idPiso' value='$row[Codigo_piso]'>");
                print("<input type='submit' id='botonComprar' value='COMPRAR'>");print("<br>");
                print("</form>");
            print("</div>");
            mostrarImagenPiso($row);
        print("</div>"); 

    $codigoPiso=$row["Codigo_piso"];
  
    }
    print("</div>");
    } else {
    echo "No hay ningún piso registrado con ese código";
    }
    mysqli_close($conexion);
?>   

</body>
</html>