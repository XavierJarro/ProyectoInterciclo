<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'user'){ 
    header("Location: /proyectoInterciclo/supermarket/public/vista/login.html"); 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Supermarket Jessica</title>
    <style type="text/css" rel="stylesheet">
        .error{
            color: red;
        }
    </style>
 </head>
<body>

    <?php
    //incluir conexión a la base de datos
    include '../../../../config/conexionBD.php';                
    
    $nombre= isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;    
    $direccion= isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $ciudad = isset($_POST["ciudad"]) ? mb_strtoupper(trim($_POST["ciudad"]), 'UTF-8') : null;


    $sql= "INSERT INTO sucursal VALUES(0, '$nombre', '$direccion', '$ciudad', 'N')";        
    
    if($conn->query($sql) === TRUE) {
        echo"<p>Sucursal creada correctamente!!!</p>";
    } else{
        if($conn->errno== 1062){
            echo"<p class='error'>La sucursal ya esta creada </p>";     
        }else{
            echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
        }            
    }
    
    //cerrar la base de datos
    $conn->close();
    echo"<a href='../../../vista/admin/sucursal/crear_sucursal.php'>Regresar</a>";
 ?>

</body>
<html>