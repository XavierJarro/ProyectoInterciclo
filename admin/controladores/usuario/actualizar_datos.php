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
        <title>Actualizacion de datos del Usuario </title> 
        </head> 
        <body> 
            <?php 
            //incluir conexión a la base de datos 
            include '../../../config/conexionBD.php'; 

             $codigo = $_POST["codigo"]; 
             $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null; 
             $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null; 
             $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
             $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
             $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
             $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null; 
             $fechaNacimiento = isset($_POST["fechanacimiento"]) ? trim($_POST["fechanacimiento"]): null; 
             
             date_default_timezone_set("America/Guayaquil"); 

             $fecha = date('Y-m-d H:i:s', time());
             $sql = "UPDATE usuario " . "
             SET usu_cedula = '$cedula', " 
             . "usu_nombres = '$nombres', " 
             . "usu_apellidos = '$apellidos', " 
             . "usu_direccion = '$direccion', " 
             . "usu_telefono = '$telefono', " 
             . "usu_correo = '$correo', " 
             . "usu_fecha_nacimiento = '$fechaNacimiento', " 
             . "usu_fecha_modificacion = '$fecha' " 
             . "WHERE usu_codigo = $codigo"; 
             
             if ($conn->query($sql) === TRUE) { 
                 echo "Se ha actualizado tus datos correctamemte!!!<br>"; 
                 } else { 
                     echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
                      } 
                      echo"<a href='../../vista/usuario/datos_usuario.php'>Regresar</a>";
            
        $conn->close(); 
        ?> 
        </body> 
</html>