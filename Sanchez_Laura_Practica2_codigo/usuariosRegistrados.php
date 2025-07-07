<?php
session_start();
$tipoUsuario=null;
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

function sesionIniciada(){
print("<div class='text-center'>");
print("<h4 class='mt-5'>Sesión iniciada: ".$_SESSION['nombre']."</h4>");
print("</div>");
}


    $conexion = mysqli_connect('localhost', 'root','','inmobiliaria');
     $nombre=null;
     if(isset($_REQUEST['nombre'])){
        if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
            }
            $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
        
            $sql = "SELECT * FROM usuario WHERE nombre='$nombre'";
            $resultado=mysqli_query($conexion, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                $_SESSION['nombre']=trim(strip_tags($_REQUEST['nombre']));
    
            } 
        }
        if(isset($_REQUEST['password'])){
        
            if (!$conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
            }
            $clave = mysqli_real_escape_string($conexion,$_POST['password']);
            $sql = "SELECT * FROM usuario WHERE clave='$clave' AND nombre='$nombre'";
            $resultado=mysqli_query($conexion, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                $_SESSION['password']=trim(strip_tags($_REQUEST['password']));
                $row = mysqli_fetch_assoc($resultado);
                $tipoUsuario=$row['tipo_usuario'];
                sesionIniciada();
                print("<h2 style='text-align:center; color:green;'>".$_SESSION['nombre'].", estás registrad@ como <strong>$tipoUsuario</strong></h2>");
                print("<p style='text-align:center;margin-bottom:20px;margin-top:40px;font-size:22px;color:green;'>¿Qué quieres hacer?</p>");
                mostrarAcciones($tipoUsuario);
                cerrarSesion();
                
                
            } 
            else{
            print("<p style='text-align:center;margin-bottom:40px;margin-top:40px;font-size:22px;color:#d12323;'>El usuario o la contraseña no existen</p>");
            print("<div class='text-center 'id='volverMenu'>");
            print("<a class='text-center text-success text-decoration-none' href='inicioRegistro.php'>Volver a intentarlo</a>");
            print("<div");

                 }
     }
     else{
        $nombre=$_SESSION['nombre'];
        $tipoUsuario=tipoUsuario($nombre);
        sesionIniciada();
        print("<h2 style='text-align:center; color:green;'>".$_SESSION['nombre'].", estás registrad@ como <strong>$tipoUsuario</strong></h2>");
        print("<p style='text-align:center;margin-bottom:40px;font-size:22px;color:green;'>¿Qué quieres hacer?</p>");
        mostrarAcciones($tipoUsuario);
        cerrarSesion();
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
            $_SESSION['tipo_usuario']=$tipoUsuario;
          
        } 
        return $tipoUsuario;
    }

   
    mysqli_close($conexion);

   
    function cerrarSesion(){
    print("<div class='text-center mb-5'>");
    print("<a href='abandonarSesion.php' class='text-decoration-none text-success fs-3'>CERRAR SESIÓN</a>");
    print("</div>");
    }



    function mostrarAcciones($tipoUsuario){
        if($tipoUsuario=="Cliente"){
           
           print("<div class='contenedorOpciones d-flex justify-content-center align-items-center flex-row w-50 m-auto'>");
                print("<div id='opcion1Comprador'>");
                    print("<div id='textoAccion'>");
                        print("<a href='./Pisos/showPisos.php'>VER PISOS DISPONIBLES</a>");
                    print("</div>");   
                print("</div>");
                print("<div id='opcion2Comprador'>");
                    print("<div id='textoAccion'>");
                        print("<a href='filtrarPisos.php'>BUSCAR PISO</a>");
                    print("</div>");
                print("</div>");
            print("</div>");
        

        }
        else if($tipoUsuario=="Vendedor"){

            print("<div class='contenedorOpciones d-flex justify-content-center align-items-center flex-row w-50 m-auto'>");
            print("<div id='opcion1Vendedor'>");
                print("<div id='textoAccion'>");
                    print("<a href='./Pisos/showPisos.php'>VER PISOS</a>");
                print("</div>");   
            print("</div>");

            print("<div id=opcion2Vendedor>");
                print("<div id='textoAccion'>");
                    print("<a href='./Pisos/addPisoForm.php'>REGISTRAR PISO</a>");
                print("</div>");   
            print("</div>");
        print("</div>");
    

        }
        else{
            print("<div class='panelAdministracion d-flex justify-content-center mb-4'>");
            print("<div class='list-group me-3' id='administracionUsuarios'>
              <li class='list-group-item bg-success text-white'>ADMINISTRACIÓN DE USUARIOS</li>
             <a href='./Usuarios/addUserForm.php' class='list-group-item list-group-item-action'>Alta Usuario</a>
            <a href='./Usuarios/deleteUserForm.php' class='list-group-item list-group-item-action'>Baja Usuario</a>
            <a href='./Usuarios/searchUserForm.php' class='list-group-item list-group-item-action'>Buscar Usuario</a>
            <a href='./Usuarios/updateUserFormBase.php' class='list-group-item list-group-item-action'>Modificar Usuario</a>
            <a href='./Usuarios/showUsers.php' class='list-group-item list-group-item-action'>Listar Usuarios</a>
           
          </div>");

          print("<div class='list-group' id='administracionPisos'>
            <li class='list-group-item bg-success text-white'>ADMINISTRACIÓN DE PISOS</li>
          <a href='./Pisos/addPisoForm.php' class='list-group-item list-group-item-action'>Alta Piso</a>
          <a href='./Pisos/deletePisoForm.php' class='list-group-item list-group-item-action'>Baja Piso</a>
          <a href='./Pisos/searchPisoForm.php' class='list-group-item list-group-item-action'>Buscar Piso</a>
          <a href='./Pisos/updatePisoFormBase.php' class='list-group-item list-group-item-action'>Modificar Piso</a>
          <a href='./Pisos/showPisos.php' class='list-group-item list-group-item-action'>Listar Pisos</a>
         
        </div>");
        print("</div>");
     
    }
  
        }
        

    ?>




</body>
</html>