<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function mostrarCabecera(){
        print("<div class='text-center mb-3'>");
    print("<a class='fs-3 text-success' href='../usuariosRegistrados.php' >Volver al menú principal</a>");
    print("</div>");
    print("<div class='text-center mb-5'>");
    print("<h5 >Sesión iniciada: ".$_SESSION['nombre']."</h5>");
    print("<h5><a style='text-decoration:none;color:white;' href='../abandonarSesion.php'>SALIR</a></h5>");
    print("</div>");
    print("</div>");
    }
    function mostrarCabecera1(){
        print("<div class='text-center mb-3'>");
    print("<a class='fs-3 text-success' href='usuariosRegistrados.php' >Volver al menú principal</a>");
    print("</div>");
    print("<div class='text-center mb-5'>");
    print("<h5 >Sesión iniciada: ".$_SESSION['nombre']."</h5>");
    print("<h5><a style='text-decoration:none;color:white;' href='abandonarSesion.php'>SALIR</a></h5>");
    print("</div>");
    print("</div>");
    }

    function mostrarDatosPiso($row){
        echo 
        "Código piso: " . $row["Codigo_piso"]."<br>"."Calle: " . $row["calle"]."<br>". "  Número: " 
        . $row["numero"]."<br>". " Piso: " . $row["piso"]."<br>".  "Puerta: " . $row["puerta"]."<br>"."Código postal: " . $row["cp"]."<br>"
        ."Metros cuadrados: " . $row["metros"]."<br>"."Zona: " ."<br>". $row["zona"]."<br>"."Municipio: " . $row["municipio"]."<br>"."Precio: " . $row["precio"]."€"."<br>";
    }

    function mostrarImagenPiso($row){
        print("<div class='imagenPiso w-55 d-flex align-items-center'>");
        print("<img src='../img/$row[imagen]' width=100%; height=90%;>");
        print("</div>"); 
    }
    function mostrarImagenPiso1($row){
        print("<div class='imagenPiso w-55 d-flex align-items-center'>");
        print("<img src='./img/$row[imagen]' width=100%; height=90%;>");
        print("</div>"); 
    }

    function tipoUsuario($nombre){
        $conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
        if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM usuario WHERE nombre='$nombre'";
        $resultado=mysqli_query($conexion, $sql);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $tipoUsuario=$row['tipo_usuario'];
        
        } 
        return $tipoUsuario;
    }

?>
</body>
</html>