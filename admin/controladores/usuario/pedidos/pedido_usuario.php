<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin'){ 
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
    
    $codigoUsuario = $_SESSION['codigo'];
    $codigoProducto = $_POST['codigopro'];
    $cant = $_POST['cantidad'];
  
    $sql = "SELECT * FROM pedidos WHERE ped_cod_pro = '$codigoProducto' AND ped_eliminado = 'N' AND ped_cod_usu = $codigoUsuario";
    $result = $conn->query($sql);
    if( $result->num_rows > 0){
        echo "<p>EL PRODUCTO YA SE ENCUENTRA EN PEDIDOS</p>";
    }else{
        $sql2= "INSERT INTO pedidos VALUES(0, '$codigoProducto', '$codigoUsuario', '$cant', 'N', 'CREADO')";        
                
                if($conn->query($sql2) === TRUE) {
                    echo"<p>Añadido al carrito!!!</p>";
                } else{
                    if($conn->errno== 1062){
                        echo"<p class='error'>Ya existe en el carrito </p>";     
                    }else{
                        echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
                    }            
                }

    }

    //cerrar la base de datos
    $conn->close();
    echo"<a href='../../../vista/usuario/productos.php'>Regresar</a>";
 ?>

</body>
<html>