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
    <title>Document</title>
</head>
<body>
    <?php
    mostrarCabecera1();

    $conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
    if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
    }

  
    $nombreComprador=$_SESSION['nombre'];
    $sql="SELECT *FROM usuario WHERE nombre='$nombreComprador';";
    $resultado=mysqli_query($conexion, $sql);
    $row=mysqli_fetch_assoc($resultado);
    $idPisoComprado=$_POST['idPiso'];
    $sql1="SELECT *FROM pisos WHERE Codigo_piso='$idPisoComprado';";
    $resultado1=mysqli_query($conexion, $sql1);
    $row1=mysqli_fetch_assoc($resultado1);

    $usuarioComprador=$row['usuario_id'];
    $precioPisoComprado=$row1['precio'];

    $sql2="INSERT INTO comprados (usuario_comprador,Codigo_piso,Precio_final) VALUES('$usuarioComprador','$idPisoComprado','$precioPisoComprado');";
    $resultado2=mysqli_query($conexion, $sql2);
    $sql3="UPDATE pisos SET estado='Vendido', usuario_id='$row[usuario_id]' WHERE Codigo_piso='$idPisoComprado';";
    $resultado3=mysqli_query($conexion, $sql3);      
    
    echo("<p style='text-align:center; font-size:20px; color:blue; font-weight:bold;'>¡COMPRA REALIZADA CON ÉXITO!</p>");
    echo("<p style=text-align:left;margin-left:16%;font-size:20px>Éstos son los datos de tu compra:</p>");print("<br>");


        print("<div class='container text-center' id=confirmacionCompra>");
        
            print("<div class='col-3'>");
            print("<h2>Dirección</h2>");
            echo "Calle: " . $row1["calle"]."<br>". "  Número: " 
                . $row1["numero"]."<br>". " Piso: " . $row1["piso"]."<br>".  "Puerta: " . $row1["puerta"]."<br>"."Código postal: " . $row1["cp"]."<br>"."Zona: " . $row1["zona"]."<br>".
                "Municipio: " . $row1["municipio"]; 
            print("</div>");  
            print("<div class='col-3'>");
            print("<h2>Metros cuadrados:</h2>");
            echo "Metros cuadrados: " . $row1["metros"].'m2'."<br>";

            print("<h2 style='margin-top:50px;'>Precio de compra:</h2>");
            print("<h3 style='text-align:center; color:green;'>$row1[precio]€</h3>");
            print("</div>");
            print("<div class='col-6'>");
            print("<img src='./img/$row1[imagen]' width=100%; height=100%;mrgin>");print("<br><br>");   
            print("</div>");
        
        print("</div>");
       
   


?>
</body>
</html>