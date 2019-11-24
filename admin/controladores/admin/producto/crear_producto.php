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
    $precio= isset($_POST["precio"]) ? mb_strtoupper(trim($_POST["precio"]), 'UTF-8') : null;  
    $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null; 
    $cantidad = isset($_POST["cantidad"]) ? mb_strtoupper(trim($_POST["cantidad"]), 'UTF-8') : null; 
    $categoria = $_POST['categoria'];
    $imagen = addslashes(file_get_contents($_FILES['fotoProducto']["tmp_name"]));

    $pre = (double) $precio;
    $stock = (int) $cantidad;

    $sql= "INSERT INTO productos VALUES(0, '$nombre', '$descripcion', '$pre', '$stock', '$imagen', 'N', '$categoria')";        
    
    if($conn->query($sql) === TRUE) {
        echo"<p>Producto creado correctamente!!!</p>";
    } else{
        if($conn->errno== 1062){
            echo"<p class='error'>El producto ya esta creado </p>";     
        }else{
            echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
        }            
    }
    
    //cerrar la base de datos
    $conn->close();
    echo"<a href='../../../vista/admin/producto/crear_producto.php'>Regresar</a>";
 ?>

</body>
<html>