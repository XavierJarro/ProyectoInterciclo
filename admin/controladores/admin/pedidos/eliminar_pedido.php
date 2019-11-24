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
        <title>Eliminar Pedido</title> 
    </head> 
    <body> 
        <?php 
        //incluir conexión a la base de datos 
        include '../../../../config/conexionBD.php';    

        $codigo = $_GET["codigoPedido"]; 
        //Si voy a eliminar físicamente el registro de la tabla 
        //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
         
         $sql = "UPDATE pedidos SET ped_eliminado = 'S' WHERE ped_codigo = '$codigo'"; 
         
         if ($conn->query($sql) === TRUE) { 
             echo "<p>Se elimino este pedido!!!</p>"; 
             /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
             } else { 
                 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
             } 
        
             $conn->close();
             echo"<a href='../../../vista/admin/pedidos/listar_pedido.php'>Regresar</a>";
         ?> 
    </body>
</html>