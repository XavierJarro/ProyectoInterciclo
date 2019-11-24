<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin') {
	header("Location: /proyectoInterciclo/supermarket/public/vista/login.html");
}
?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Supermarket Jessica</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
	<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->
	<link href="../../../css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider -->
	<link href="../../../css/animate.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->
	<link href="../../../estilos.css" rel="stylesheet" type="text/css" media="all">
	<!-- //Custom Theme files -->
	<!-- font-awesome icons -->
	<link href="../../../css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!-- js -->
	<script src="../../../js/pagina/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!-- web-fonts -->
	<link href='../../..///fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='../../..///fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
	<link href='../../..///fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
	<link href='../../..///fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
	<!-- web-fonts -->
	<script src="../../js/pagina/owl.carousel.js"></script>
	<script src="../../../../js/pagina/jquery-scrolltofixed-min.js" type="text/javascript"></script>

	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="../../../js/pagina/move-top.js"></script>
	<script type="text/javascript" src="../../../js/pagina/easing.js"></script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<!-- //smooth-scrolling-of-move-up -->
	<script src="../../../js/pagina/bootstrap.js"></script>
</head>

<body>
	<script>
		$('#myModal88').modal('show');
	</script>
	<!-- header -->
	<div class="header">
		<div class="w3ls-header">
			<!--header-one-->
			<div class="w3ls-header-left">
				<p><a href="#">Los Mejores descuentos en tus compras </a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<?php
						include '../../../config/conexionBD.php';

						$codigo = $_SESSION['codigo'];

						$sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
							while ($row4 = $result->fetch_assoc()) {
								?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
									<?php echo $row4['usu_nombres'] ?>&nbsp<?php echo $row4['usu_apellidos'] ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
										<li><a href="mi_cuenta.php">Mi Cuenta</a></li> 
										<li><a href="index.php">Inicio</a></li> 
										<li><a href="../../../public/vista/index.html">Cerrar Sesión</a></li> 
								</ul>
							<?php
						}
					}
					$conn->close();
					?>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>


	</div>

	<div>

		<!--CREAR SUCURSAL -->
		<table id="tablaDatos">
			<h1><caption>Mis Facturas</caption></h1>
			<tr>
                <th>Fecha</th>
                <th>Dirección</th>
				<th>Cedula</th>
				<th>Cliente</th>
                <th>Sucursal</th>
                <th>Detalles</th>
				
			</tr>

            <?php
            
            $codigoin = $_SESSION['codigo'];


			include '../../../config/conexionBD.php';

			$sql = "SELECT * FROM factura_cabecera WHERE facab_eliminada = 'N' AND facab_usu_codigo = $codigoin";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
                    $codUsu = $row['facab_usu_codigo'];
                    $codSuc = $row['facab_suc_codigo'];

                    $sql2 = "SELECT * FROM usuario WHERE usu_codigo = '$codUsu' AND usu_eliminado = 'N'";
                    $result2 = $conn->query($sql2);
                    if($result2 != null){
                        $row2 = $result2->fetch_assoc();

                        $sql3 = "SELECT * FROM sucursal WHERE suc_codigo = '$codSuc' AND suc_eliminada = 'N'";
                        $result3 = $conn->query($sql3);
                        if($result3 != null){
                            $row3 = $result3->fetch_assoc();

                            echo "<tr>";
                            echo "   <td>" . $row['facab_fecha'] . "</td>";
                            echo "   <td>" . $row['facab_direccion'] . "</td>";
                            echo "   <td>" . $row['facab_cedula']. "</td>";
                            echo "   <td>" . $row2['usu_nombres'] . "&nbsp" . $row2['usu_apellidos'] ."</td>";
                            echo "   <td>" . $row3['suc_nombre']. "</td>";
                            echo "   <td>". "<a href = 'factura/detalle_factura.php?codigoCabecera=".$row['facab_codigo']."'>"."Detalles de Factura</a>"."</td>";
                            
                        }else{
                            echo "<tr>";
                            echo "   <td colspan='7'> No Existen FACTURAS  no se hiso sucursales </td>";
                            echo "</tr>";
                        }
                    }else {
                        echo "<tr>";
                        echo "   <td colspan='7'> No Existen FACTURAS - no se hiso usuarios </td>";
                        echo "</tr>";
                    }	
				}
			} else {
				echo "<tr>";
				echo "   <td colspan='7'> No existen FACTURAS no se hiso la cabecera</td>";
				echo "</tr>";
			}

			$conn->close();
			?>

		</table>


	</div>

	<br>

	<br>


	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- //footer -->
	<div class="copy-right">
		<div class="container">
			<p>© 2019 Supermaxi Fabiola . Todos los derechos reservados diseñado por<a href="http://w3layouts.com"> Ing. UPS</a></p>
		</div>
	</div>
	<!-- cart-js -->
	<script src="../../../../js/pagina/minicart.js"></script>
	<!-- //cart-js -->
	<!-- countdown.js -->
	<script src="../../../../js/pagina/jquery.knob.js"></script>
	<script src="../../../../js/pagina/jquery.throttle.js"></script>
	<script src="../../../../js/pagina/jquery.classycountdown.js"></script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="../../../../js/pagina/jquery.menu-aim.js"> </script>
	<script src="../../../../js/pagina/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
</body>

</html>