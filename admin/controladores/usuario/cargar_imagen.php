<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin'){ 
    header("Location: /proyectoInterciclo/supermarket/public/vista/login.html"); 
    } 

    include '../../../config/conexionBD.php'; 

$codigo = $_SESSION['codigo'];
$imagen = addslashes(file_get_contents($_FILES['fotoPerfil']["tmp_name"]));

$sql = "UPDATE usuario SET usu_imagen = '$imagen' WHERE usu_codigo = $codigo";
$result = $conn->query($sql);
if($result === TRUE) {
   /* header("Location: /hipermedialIC/SistemaDEGestion/admin/vista/usuario/mi_cuenta.php");*/
    echo "Imagen subida Correctamente.";
} else{
    echo "Ha fallado la subida, reintente nuevamente.";
}
echo"<a href='../../vista/usuario/datos_usuario.php'>Regresar</a>";

$conn->close();

?>


