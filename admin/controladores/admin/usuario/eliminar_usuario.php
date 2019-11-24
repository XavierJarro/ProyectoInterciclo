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
        <title>Eliminar Sucursal </title> 
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
         $sql = "UPDATE usuario SET usu_eliminado = 'S' WHERE usu_codigo = '$codigo'"; 
         
         if ($conn->query($sql) === TRUE) { 
             echo "<p>Se elimino el usuario correctamente!!!</p>"; 
             /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
             } else { 
                 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
             } 
        
             $conn->close();
             echo"<a href='../../../vista/admin/usuario/listar_usuario.php'>Regresar</a>";
         ?> 
    </body>
</html>