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
        <title>Eliminar Producto del pedido </title> 
    </head> 
    <body> 
        <?php 
        //incluir conexión a la base de datos 
        include '../../../../config/conexionBD.php';     

        $codigo = $_GET["codigoPedido"]; 
        //Si voy a eliminar físicamente el registro de la tabla 
        //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
         date_default_timezone_set("America/Guayaquil"); 
         $fecha = date('Y-m-d H:i:s', time()); 
         $sql = "UPDATE pedidos SET ped_eliminado = 'S' WHERE ped_codigo = '$codigo'"; 
         
         if ($conn->query($sql) === TRUE) { 
             echo "<p>Se elimino este articulo del carrito!!!</p>"; 
             /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
             } else { 
                 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
             } 
        
             $conn->close();
             echo"<a href='../../../vista/usuario/mis_pedidos.php'>Regresar</a>";
         ?> 
    </body>
</html>