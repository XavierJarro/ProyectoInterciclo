<?php

session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
    header("Location: /proyectoInterciclo/supermarket/public/vista/index.html"); 
} 

include '../../config/conexionBD.php';

$usuario= isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contraseña= isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$cifrar = MD5($contraseña);

/*header ("Location: ../../admin/vista/admin/index.php?correo=".$usuario); 
header ("Location: ../../admin/vista/usuario/index.php?correo=".$usuario); 
header ("Location: ../../admin/vista/usuario/mensajes_enviados.php?correo=".$usuario); */

$rol1 = 'admin';

$sql= "SELECT * FROM usuario WHERE usu_correo ='$usuario' and usu_password = '$cifrar' "; 
$result= $conn->query($sql);
$rows = $result->fetch_assoc();

    if($result->num_rows> 0) {
        if ($rows['usu_rol'] == 'user' and $rows['usu_eliminado'] == 'N') {
            $_SESSION['isLogged'] = TRUE;
            $_SESSION['usuario'] = $rows['usu_correo'];
            $_SESSION['codigo'] = $rows['usu_codigo'];
            $_SESSION['permisos'] = 'user';
            header("Location: ../../admin/vista/usuario/index.php");
        } else if($rows['usu_rol'] == 'admin' and $rows['usu_eliminado'] == 'N' || $rows['usu_eliminado'] == 'A'){
            $_SESSION['isLogged'] = TRUE;
            $_SESSION['usuario'] = $rows['usu_correo'];
            $_SESSION['codigo'] = $rows['usu_codigo'];
            $cod = $rows['usu_codigo'];
            $_SESSION['permisos'] = 'admin';
            $sql2="UPDATE usuario SET usu_eliminado = 'A' WHERE usu_codigo = '$cod'";
            $result2= $conn->query($sql2);
            if($result2 === TRUE){
                  echo "eres usuario admin";
            }
            header("Location: ../../admin/vista/admin/index.php");

        }else {
            header("Location: ../vista/login.html");
        }
    }
    else {
        header("Location: ../vista/login.html");
    }
    $conn->close();
