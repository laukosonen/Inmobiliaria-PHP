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
    <link rel="stylesheet" href="estilos.css">
    <title>Comprar piso</title>
</head>
    <body class='mt-5'>
    <?php
mostrarCabecera1();
?>
        
        <h3 class='text-white text-center'>Selecciona las características que desees para el piso que estás buscando</h3>
        <div class='d-flex justify-content-center mt-5'>
            <form method="post" action="verPisosFiltrados.php">
                Zona:
                <select class="form-select mb-4" name="location">
                <option value="Todas">Todas</option>
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
                Precio:
                <select class="form-select mb-4" name="price">
                <option value="Todos">Todos</option>
                <option value="200000">Menos de 200.000€</option>
                <option value="300000">Menos de 300.000€</option>
                <option value="400000">Menos de 400.000€</option>
                <option value="600000">Menos de 600.000€</option>
                <option value="1100000">Menos de 1.100.000€</option>
                </select>
                Metros cuadrados:
                <select class="form-select mb-4" name="surface">
                <option value="Todos">Todos</option>
                <option value="100">Menos de 100m2</option>
                <option value="150">Menos de 150m2</option>
                <option value="200">Menos de 200m2</option>
                <option value="500">Menos de 500m2</option>
                </select>
                <button type="submit" class="btn btn-primary text-center w-100 bg-success">Buscar</button>
            </form>
        </div>
    </body>
</html>