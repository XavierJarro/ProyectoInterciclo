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
        <title>Actualizacion de datos de Productos </title> 
        </head> 
        <body> 
            <?php 
            //incluir conexión a la base de datos 
            include '../../../../config/conexionBD.php';

             $codigo = $_POST["codigo"]; 

             $nombre= isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;    
             $precio= isset($_POST["precio"]) ? mb_strtoupper(trim($_POST["precio"]), 'UTF-8') : null;  
             $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null; 
             $cantidad = isset($_POST["stock"]) ? mb_strtoupper(trim($_POST["stock"]), 'UTF-8') : null; 
             $categoria = $_POST['categorianueva'];
             $imagen = addslashes(file_get_contents($_FILES['fotoProducto']["tmp_name"]));

             $pre = (double) $precio;
             $stoc = (int) $cantidad;


             $sql = "UPDATE productos SET pro_nombre = '$nombre', pro_descripcion = '$descripcion', pro_precio = '$pre', pro_stock = '$stoc', pro_imagen = '$imagen', pro_cod_categoria = '$categoria' WHERE pro_codigo = $codigo"; 
 
             if ($conn->query($sql) === TRUE) { 
                 echo "Se ha actualizado el producto correctamemte!!!<br>"; 
                 /*header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/admin/usuarios.php");*/
                 } else { 
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
                } 
                echo"<a href='../../../vista/admin/producto/listar_producto.php'>Regresar</a>";
                $conn->close(); 
                ?> 
        </body> 
</html>