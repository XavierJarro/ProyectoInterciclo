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
        <title>Anular Factura </title> 
    </head> 
    <body> 
        <?php 
        //incluir conexión a la base de datos 
        include '../../../../config/conexionBD.php';           

        $codigofacab = $_GET["codigocabecera"]; 
        //Si voy a eliminar físicamente el registro de la tabla 
        //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
         $sql = "UPDATE factura_cabecera SET facab_eliminada = 'S' WHERE facab_codigo = '$codigofacab'"; 
         
         if ($conn->query($sql) === TRUE) { 

            $sql2 = "UPDATE factura_detalle SET fadet_eliminada = 'S' WHERE fadet_cod_facab = '$codigofacab' ";
            if ($conn->query($sql2) === TRUE) { 

                echo "<p>Se anulo los detalles correctamente!!!</p>"; 

            }

             echo "<p>Se anulo la cabecera correctamente!!!</p>"; 
             /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
             } else { 
                 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
             } 
        
             $conn->close();
             echo"<a href='../../../vista/admin/facturas/listar_factura_usuario.php'>Regresar</a>";
         ?> 
    </body>
</html>