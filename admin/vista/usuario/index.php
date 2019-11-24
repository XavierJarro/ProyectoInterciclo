<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin') {
	header("Location: /proyectoInterciclo/supermarket/public/vista/login.html");
}
?>
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
	<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
	<link href="../../../css/estilo_index.css" rel="stylesheet" type="text/css" media="all">
	<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../../../css/font-awesome.css" rel="stylesheet">
	<script src="../../../js/pagina/jquery-2.2.3.min.js"></script>
	<script src="../../../js/pagina/bootstrap.js"></script>
</head>

<body>
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
							while ($row = $result->fetch_assoc()) {
								?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i>
									<?php echo $row['usu_nombres'] ?>&nbsp<?php echo $row['usu_apellidos'] ?><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="mi_cuenta.php">Mi Cuenta</a></li>
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

		<div class="header-two">
			<!-- header-two -->
			<div class="container">
				<div class="header-logo">
					<h1><a href="index.php"><span>S</span>upermarket <i></i></a></h1>
					<h6>FABIOLA</h6>
				</div>

				<div class="header-cart">
					<div class="cart">
						<form action="#" method="post" class="last">
							<a href="carrito_compras.php"><img src="../../../images/carrito.jpg" width="100" height="100"></a>
							<input type="hidden" name="cmd" value="" />
							<input type="hidden" name="display" value="" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>

				<?php
				include '../../../config/conexionBD.php';

				$sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {

						?>

						<div class="figure">
							<img id="imag" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['usu_imagen']) ?>" alt="imagenPerfil" width="90" height="90">
						<?php
					}
				}
				?>

				</div>
			</div><!-- //header-two -->

			<header>

				<nav>
					<!-- Aqui estamos iniciando la nueva etiqueta nav -->
					<ul class="nav">
						<li><a href="productos.php">PRODUCTOS</a></li>

						<li><a href="">RAZON DE SER</a>
							<ul>
								<li><a href="quienes_somos.php">QUIENES SOMOS</a></li>
								<li><a href="mision.php">MISION</a></li>
								<li><a href="vision.php">VISION</a></li>
							</ul>
						</li>

						<li><a href="contactos.php">CONTACTOS</a></li>
					</ul>
				</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->

				<div id="encabezado">
					<img src="../../../images/logoSupermarket.png" width="100%" height="380px" alt="Logo Supermarket">
				</div>
			</header>


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

		<div class="copy-right">
			<div class="container">
				<p>© 2019 Supermaxi Fabiola . Todos los derechos reservados diseñado por<a href="http://w3layouts.com"> Ing. UPS</a></p>
			</div>
		</div>
		<!-- cart-js -->
		<script src="../../../js/pagina/minicart.js"></script>
		<script>
			w3ls.render();

			w3ls.cart.on('w3sb_checkout', function(evt) {
				var items, len, i;

				if (this.subtotal() > 0) {
					items = this.items();

					for (i = 0, len = items.length; i < len; i++) {
						items[i].set('shipping', 0);
						items[i].set('shipping2', 0);
					}
				}
			});
		</script>

		<script src="../../js/pagina/jquery.classycountdown.js"></script>
		<script>
			$(document).ready(function() {
				$('#countdown1').ClassyCountdown({
					end: '1388268325',
					now: '1387999995',
					labels: true,
					style: {
						element: "",
						textResponsive: .5,
						days: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#1abc9c",
								lineCap: 'round'
							},
							textCSS: 'font-weight:300; color:#fff;'
						},
						hours: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#05BEF6",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						minutes: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#8e44ad",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						seconds: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#f39c12",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						}

					},
					onEndCallback: function() {
						console.log("Time out!");
					}
				});
			});
		</script>
</body>

</html>