<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'user'){ 
    header("Location: /hipermedialIC/SistemaDEGestion/public/vista/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="../../../css/estilosIndex.css" type="text/css">
<link href="../../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
	<link href="../../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../../css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->
	<link href="../../../../css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider -->
	<link href="../../../../css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../../css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->
	<link href="../../../../estilos.css" rel="stylesheet" type="text/css" media="all">
	<!-- //Custom Theme files -->
	<!-- font-awesome icons -->
	<link href="../../../../css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="../../../../js/pagina/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href='../../../..///fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='../../../..///fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
	<link href='../../../..///fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
	<link href='../../../..///fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
	<!-- web-fonts -->
	<script src="../../js/pagina/owl.carousel.js"></script>
	<script src="../../../../js/pagina/jquery-scrolltofixed-min.js" type="text/javascript"></script>

	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="../../../../js/pagina/move-top.js"></script>
	<script type="text/javascript" src="../../../../js/pagina/easing.js"></script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<!-- //smooth-scrolling-of-move-up -->
	<script src="../../../../js/pagina/bootstrap.js"></script>
<head>
</head>

<body>
    <table id="tablaDatos">
    <caption>Gestion de Usuarios</caption>
        <tr>
                    <th>Cedula</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Correo</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
                    <th>Cambiar Contraseña</th>
        </tr>

        <?php
        
        $nombre = $_GET['nombreusuario'];

        include '../../../../config/conexionBD.php';
        
        $sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' AND usu_nombres LIKE '$nombre%'";
        $result = $conn->query($sql);

        if($result->num_rows> 0) {
            while($row= $result->fetch_assoc()) {

                $cedula = $row["usu_cedula"];
                $nombre = $row["usu_nombres"];
                $apellido = $row["usu_apellidos"];
                $direccion = $row["usu_direccion"];
                $telefono = $row["usu_telefono"];
                $fechanaci = $row["usu_fecha_nacimiento"];
                $correo = $row["usu_correo"];
                
                echo "<tr>";
                echo "   <td>". $cedula. "</td>";
                echo "   <td>". $nombre. "</td>";
                echo "   <td>". $apellido. "</td>";
                echo "   <td>". $direccion. "</td>";
                echo "   <td>". $telefono. "</td>";
                echo "   <td>". $fechanaci. "</td>";
                echo "   <td>". $correo. "</td>";
                echo "   <td>". "<a href = 'eliminar_usuario.php?codigo=".$row['usu_codigo']."'>"."eliminar</a>"."</td>";
                echo "   <td>". "<a href = 'actualizar_usuario.php?codigo=".$row['usu_codigo']."'>"."actualizar</a>"."</td>";
                echo "   <td>". "<a href = 'cambio_contrasena.php?codigo=".$row['usu_codigo']."'>"."Cambio Cotraseña</a>"."</td>";
                echo"</tr>";
            }
        } else{
            echo"<tr>";
            echo"   <td colspan='7'> No existen usuarios en el Sistema</td>";
            echo"</tr>";
        }
        ?>
</table>
</body>

</html>