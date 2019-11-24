<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'user'){ 
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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
<link href="../../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../../../../css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="../../../../css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="../../../../css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../../../../css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
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
</head>
<body>
	<script>
		$('#myModal88').modal('show');
	</script> 
	<!-- header -->
	<div class="header">
		<div class="w3ls-header"><!--header-one--> 
			<div class="w3ls-header-left">
				<p><a href="#">Los Mejores descuentos en tus compras </a></p>
			</div>
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
                        <?php
                        include '../../../../config/conexionBD.php';

                        $codigo = $_SESSION['codigo'];

                        $sql= "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
                            $result= $conn->query($sql);
                            if($result->num_rows> 0) {
                                while($row= $result->fetch_assoc()) {
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> 
                        <?php echo $row['usu_nombres'] ?>&nbsp<?php echo $row['usu_apellidos'] ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="../administracion.php">Administración del Sitio</a></li> 
							<li><a href="../../../../public/vista/index.html">Cerrar Sesión</a></li> 							
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
			    <div class="login-page">
                    <div class="container"> 
                        <h3 class="w3ls-title w3ls-title1">Creacion de Usuarios(Clientes)</h3>  
                        <div class="login-body">
                            <!--DATOS DEL USUARIO =========================== -->
                                <form  method="POST" action="../../../controladores/admin/usuario/crear_usuario.php">

                                <label for="cedula">Cedula (*)</label>
                                <input type="text" id="cedula" class="user" name="cedula" placeholder="cedula" required="">

                                <label for="cedula">Nombres (*)</label>
                                <input type="text" id="nombres" class="user" name="nombres" placeholder="nombres" required="">

                                <label for="cedula">Apellidos (*)</label>
                                <input type="text" id="apellidos" class="user" name="apellidos" placeholder="apellidos" required="">

                                <label for="cedula">Dirección (*)</label>
                                <input type="text" id="direccion" class="user" name="direccion" placeholder="dirección" required="">

                                <label for="cedula">Telefono (*)</label>
                                <input type="text" id="telefono" class="user" name="telefono" placeholder="telefono" required="">

                                <label for="cedula">Correo Electrónico (*)</label>
                                <input type="text" id="correo" class="user" name="correo" placeholder="correo electrónico" required="">

                                <label for="cedula">Fecha de Nacimiento (*)</label>
                                <input type="text" id="fechanacimiento" class="user" name="fechanacimiento" placeholder="fecha de nacimiento" required="">
                                
                                <label for="cedula">Contraseña (*)</label>
                                <input type="password" id="contrasena" name="contrasena" class="lock" placeholder="contraseña" required="">


								 <input type="submit" id="crear" name="crear" value="Crear Usuario">
								 
                            </form>

                        </div>  
                    </div>
                </div>
		

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