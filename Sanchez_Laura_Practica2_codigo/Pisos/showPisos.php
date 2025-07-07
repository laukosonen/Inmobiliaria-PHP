<?php
session_start();
$tipoUsuario=null;
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
    <title>Listar pisos</title>
</head>
<body>
<?php
mostrarCabecera();


$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}

$sql1 = "SELECT * FROM pisos;";
$resultado1=mysqli_query($conexion, $sql1);

$sql2 = "SELECT * FROM pisos WHERE estado='Disponible'";
$resultado2=mysqli_query($conexion, $sql2);

$nombre=$_SESSION['nombre'];
$tipoUsuario=tipoUsuario($nombre);

if($tipoUsuario=="Cliente"){

    if (mysqli_num_rows($resultado2) > 0) {
    
        print("<div class='containerPisos d-flex justify-content-center flex-row flex-wrap'>");
        while($row = mysqli_fetch_assoc($resultado2)) {
        
            print("<div class='anuncio m-0 d-flex justify-content-center p-3 border border-white w-50'>");
            print("<div class='descripcionPiso  text-center font-monospace w-45'>");
                
                mostrarDatosPiso($row);
                
                if($row['estado']=="Disponible"){
                    print("<div id='estadoPisoD'><p>Disponible</p></div>");
                }
                else{
                    print("<div id='estadoPisoV'><p>Vendido</p></div>");
                }
            print("</div>");
            mostrarImagenPiso($row);  
        print("</div>");
    

        }
        print("</div>");}
        else{
        print("Actualmente no hay pisos registrados");
    }

}
else{
    
    if (mysqli_num_rows($resultado1) > 0) {
    
        print("<div class='containerPisos d-flex justify-content-center flex-row flex-wrap'>");
        while($row = mysqli_fetch_assoc($resultado1)) {
        
            print("<div class='anuncio m-0 d-flex justify-content-center p-3 border border-white w-50'>");
            print("<div class='descripcionPiso  text-center font-monospace w-45'>");
                mostrarDatosPiso($row);
                if($row['estado']=="Disponible"){
                    print("<div id='estadoPisoD'><p>Disponible</p></div>");
                }
                else{
                    print("<div id='estadoPisoV'><p>Vendido</p></div>");
                }
            print("</div>");
            mostrarImagenPiso($row);     
        print("</div>");
    

        }
        print("</div>");}
        else{
        print("Actualmente no hay pisos registrados");
    }

}
    mysqli_close($conexion);
   
?>  
</body>
</html>