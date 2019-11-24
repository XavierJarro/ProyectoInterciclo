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
        <title>Actualizacion de datos de sucursal </title> 
        </head> 
        <body> 
            <?php 
            //incluir conexión a la base de datos 
            include '../../../../config/conexionBD.php';

             $codigo = $_POST["codigo"]; 
             $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null; 
             $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
             $ciudad = isset($_POST["ciudad"]) ? mb_strtoupper(trim($_POST["ciudad"]), 'UTF-8') : null; 
             
             date_default_timezone_set("America/Guayaquil"); 

             $fecha = date('Y-m-d H:i:s', time());

             $sql = "UPDATE sucursal SET suc_nombre = '$nombre', suc_direccion = '$direccion', suc_ciudad = '$ciudad' WHERE suc_codigo = $codigo"; 
             
             if ($conn->query($sql) === TRUE) { 
                 echo "Se ha actualizado los sucursal correctamemte!!!<br>"; 
                 /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
                 } else { 
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
                } 
                echo"<a href='../../../vista/admin/sucursal/listar_sucursal.php'>Regresar</a>";
                $conn->close(); 
                ?> 
        </body> 
</html>