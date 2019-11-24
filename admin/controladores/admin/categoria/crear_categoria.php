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

    $sql= "INSERT INTO categoria VALUES(0, '$nombre', 'N')";        
    
    if($conn->query($sql) === TRUE) {
        echo"<p>Categoria creada correctamente!!!</p>";
    } else{
        if($conn->errno== 1062){
            echo"<p class='error'>La sucursal ya esta creada </p>";     
        }else{
            echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
        }            
    }
    
    //cerrar la base de datos
    $conn->close();
    echo"<a href='../../../vista/admin/categoria/crear_categoria.php'>Regresar</a>";
 ?>

</body>
<html>