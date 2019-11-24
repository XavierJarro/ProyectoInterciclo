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
        <title>Actualizacion de Pedido </title> 
        </head> 
        <body> 
            <?php 
            //incluir conexión a la base de datos 
            include '../../../../config/conexionBD.php';

             $codigo = $_POST["codigo"]; 
             $estado = $_POST["estado"]; 

             $cantidad = isset($_POST["cantidad"]) ? mb_strtoupper(trim($_POST["cantidad"]), 'UTF-8') : null; 

             $cant = (int) $cantidad;


             $sql = "UPDATE pedidos SET ped_cantidad = '$cant', ped_estado = '$estado' WHERE ped_codigo = $codigo"; 
 
             if ($conn->query($sql) === TRUE) { 
                 echo "Se ha actualizado el pedido correctamemte!!!<br>"; 
                 /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
                 } else { 
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
                } 
                echo"<a href='../../../vista/admin/pedidos/listar_pedido.php'>Regresar</a>";
                $conn->close(); 
                ?> 
        </body> 
</html>