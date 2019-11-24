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
        <title>Eliminar Producto </title> 
    </head> 
    <body> 
        <?php 
        //incluir conexión a la base de datos 
        include '../../../../config/conexionBD.php';           

        $codigo = $_POST["codigo"]; 
        //Si voy a eliminar físicamente el registro de la tabla 
        //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
         date_default_timezone_set("America/Guayaquil"); 
         $fecha = date('Y-m-d H:i:s', time()); 
         $sql = "UPDATE productos SET pro_eliminado = 'S' WHERE pro_codigo = '$codigo'"; 
         
         if ($conn->query($sql) === TRUE) { 
             echo "<p>Se elimino el producto correctamente!!!</p>"; 
             /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
             } else { 
                 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
             } 
        
             $conn->close();
             echo"<a href='../../../vista/admin/producto/listar_producto.php'>Regresar</a>";
         ?> 
    </body>
</html>