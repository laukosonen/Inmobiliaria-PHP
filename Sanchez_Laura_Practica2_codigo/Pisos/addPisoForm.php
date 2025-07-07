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
<title>Alta Piso</title>
</head>
<body>
<?php
mostrarCabecera();
?>

<h3 class="text-center">Rellena los datos de registro del piso:</h3>
<div  id="formularioAltaPiso">
<form method="post" action="addPiso.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Calle:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="calle" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Número:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="numero" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Piso:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="piso" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Puerta:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="puerta" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Código postal:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="codigoPostal" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Metros cuadrados:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="metros" required>
  </div>
  <select class="form-select" aria-label="Default select example" name="zona">
  <option selected>Zona</option>
  <option value="Sierra Norte">Sierra Norte</option>
  <option value="Cuenca del Medio Jarama">Cuenca del Medio Jarama</option>
  <option value="Cuenca del Henares">Cuenca del Henares</option>
  <option value="Comarca de las Vegas">Comarca de las Vegas</option>
  <option value="Cuenca Alta del Manzanares">Cuenca Alta del Manzanares</option>
  <option value="Area Metropolitana">Área Metropolitana</option>
  <option value="Comarca Sur">Comarca Sur</option>
  <option value="Sierra Oeste">Sierra Oeste</option>
  <option value="Cuenca del Guadarrama">Cuenca del Guadarrama</option>
  </select>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Municipio:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="municipio" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Precio:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"name="precio" required>
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Subir imagen:</label>
    <input type="file" class="form-control" id="exampleInputPassword1" name="imagen" required>
  </div>
 
  <button type="submit" class="btn btn-primary" style='background-color:#3eb97a;font-size:18px;'>Añadir</button>
</form>

</div>
</body>
</html>