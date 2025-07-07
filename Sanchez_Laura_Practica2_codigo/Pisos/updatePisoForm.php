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
    <title>Modificar Piso</title>
</head>

<?php
mostrarCabecera();
?>
<body>
<?php
$conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
if (!$conexion) {
die("Conexión fallida: " . mysqli_connect_error());
}
$codigoPiso=mysqli_real_escape_string($conexion,$_POST['codigoPiso']);
$sql="SELECT * FROM pisos WHERE Codigo_piso='$codigoPiso'";
$resultado=mysqli_query($conexion,$sql);
if(mysqli_num_rows($resultado) > 0){
    $row=mysqli_fetch_assoc($resultado);
  
print("<h3 class='text-center'>Modifica los datos que necesites del piso</h3>
<div class='formularioBajaPiso m-auto border-border-black bg-white w-25 p-5'>
    <form method='post' action='updatePiso.php'>
        <div class='mb-3'>
            <label for='codigoPiso' class='form-label'>Código piso:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['Codigo_piso']."' aria-describedby='emailHelp' name='codigoPiso' readonly>
        </div>
        <div class='mb-3'>
            <label for='calle' class='form-label'>Calle:</label>
            <input type='text' class='form-control w-100' id='exampleInputEmail1' value='".$row['calle']."' aria-describedby='emailHelp' name='calle' required>
        </div>
        <div class='mb-3'>
            <label for='numero' class='form-label'>Número:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['numero']."' aria-describedby='emailHelp' name='numero' required>
        </div>
        <div class='mb-3'>
            <label for='piso' class='form-label'>Piso:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['piso']."'  aria-describedby='emailHelp' name='piso' required>
        </div>
        <div class='mb-3'>
            <label for='puerta' class='form-label'>Puerta:</label>
            <input type='text' class='form-control w-100' id='exampleInputEmail1' value='".$row['puerta']."'  aria-describedby='emailHelp' name='puerta' required>
        </div>
        <div class='mb-3'>
            <label for='codigoPostal' class='form-label'>Código postal:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['cp']."'  aria-describedby='emailHelp' name='codigoPostal' required>
        </div>
        <div class='mb-3'>
            <label for='metros' class='form-label'>Metros cuadrados:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['metros']."'  aria-describedby='emailHelp' name='metros' required>
        </div>
        Zona:
        <select class='form-select' aria-label='Default select example' name='zona'>
            <option selected>".$row['zona']."</option>
            <option value='Sierra Norte'>Sierra Norte</option>
            <option value='Cuenca del Medio Jarama'>Cuenca del Medio Jarama</option>
            <option value='Cuenca del Henares'>Cuenca del Henares</option>
            <option value='Comarca de las Vegas'>Comarca de las Vegas</option>
            <option value='Cuenca Alta del Manzanares'>Cuenca Alta del Manzanares</option>
            <option value='Area Metropolitana'>Área Metropolitana</option>
            <option value='Comarca Sur'>Comarca Sur</option>
            <option value='Sierra Oeste'>Sierra Oeste</option>
            <option value='Cuenca del Guadarrama'>Cuenca del Guadarrama</option>
            </select>
        <div class='mb-3'>
            <label for='municipio' class='form-label'>Municipio:</label>
            <input type='text' class='form-control w-100' id='exampleInputEmail1' value='".$row['municipio']."'  aria-describedby='emailHelp' name='municipio' required>
        </div>
        <div class='mb-3'>
            <label for='precio' class='form-label'>Precio:</label>
            <input type='number' class='form-control w-100' id='exampleInputEmail1' value='".$row['precio']."'  aria-describedby='emailHelp' name='precio' required>
        </div>
       <div class='imagenPiso w-55 d-flex align-items-center'>
            <img src='../img/$row[imagen]' width=100%; height=90%;>
       </div>  
        <div class='mb-3'>
            <label for='imagen' class='form-label'>Cambiar imagen:</label>
            <input type='file' class='form-control w-100' id='exampleInputEmail1' value='".$row['imagen']."'  aria-describedby='emailHelp' name='imagen'>
        </div>
        <button type='submit' class='btn btn-primary text-center w-100' style='background-color:#3eb97a;font-size:18px;'>Cambiar</button>
    </form>
</div>");
    }else {
        echo("<div class='text-center text-danger mb-5'>No hay ningún piso registrado con ese código</div>");
        }
    
    mysqli_close($conexion);
    ?>    
</body>
</html>
