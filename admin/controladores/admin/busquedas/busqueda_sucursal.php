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
    <caption>Gestion de Sucursales</caption>
        <tr>
                    <th>Nombre</th>
					<th>Direccion</th>
					<th>Ciudad</th>
                    <th>Eliminar</th>
                    <th>Actualizar</th>
        </tr>

        <?php
        
        $sucursal = $_GET['nombresucursal'];

        include '../../../../config/conexionBD.php';
        
        $sql = "SELECT * FROM sucursal WHERE suc_eliminada = 'N' AND suc_nombre LIKE '$sucursal%'";
        $result = $conn->query($sql);

        if($result->num_rows> 0) {
            while($row= $result->fetch_assoc()) {

                $nombre = $row["suc_nombre"];
                $direccion = $row["suc_direccion"];
                $ciudad = $row["suc_ciudad"];
                
                echo "<tr>";
                echo "   <td>". $nombre. "</td>";
                echo "   <td>". $direccion . "</td>";
                echo "   <td>". $ciudad . "</td>";
                echo "   <td>". "<a href = 'eliminar_sucursal.php?codigo=".$row['suc_codigo']."'>"."eliminar</a>"."</td>";
                echo "   <td>". "<a href = 'actualizar_sucursal.php?codigo=".$row['suc_codigo']."'>"."actualizar</a>"."</td>";
                echo"</tr>";
            }
        } else{
            echo"<tr>";
            echo"   <td colspan='7'> No existen mensajes en el Sistema</td>";
            echo"</tr>";
        }
        ?>
</table>
</body>

</html>