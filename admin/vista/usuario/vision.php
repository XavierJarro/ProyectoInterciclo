<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin'){ 
    header("Location: /proyectoInterciclo/supermarket/public/vista/login.html"); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
<title>Visión</title>
<meta charset="utf-8"/>
<link href="../../../css/estilos_mision.css" rel="stylesheet" type="text/css">
<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../../../css/font-awesome.css" rel="stylesheet"> 
<script src="../../../js/pagina/jquery-2.2.3.min.js"></script> 
<script src="../../../js/pagina/bootstrap.js"></script>	
</head>
<body>


            <div class="w3ls-header"><!--header-one--> 
                <div class="w3ls-header-left">
                    <p><a href="#">Los Mejores descuentos en tus compras </a></p>
                </div>
                <div class="w3ls-header-right">
                    <ul>
                    <li class="dropdown head-dpdn">
                        <?php
                        include '../../../config/conexionBD.php';

                        $codigo = $_SESSION['codigo'];

                        $sql= "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
                            $result= $conn->query($sql);
                            if($result->num_rows> 0) {
                                while($row= $result->fetch_assoc()) {
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
            <div class="header-two"><!-- header-two -->
                <div class="container">
                    <div class="header-logo">
                        <h1><a href="index.php"><span>S</span>upermarket <i></i></a></h1>
                        <h6>FABIOLA</h6> 
                    </div>	
    
                    <div class="header-cart"> 
                    <?php
				include '../../../config/conexionBD.php';

				$sql = "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {

						?>

						<div class="figure">
							<img id="imag3" class="imag3" src="data:image/jpg;base64,<?php echo base64_encode($row['usu_imagen']) ?>" alt="imagenPerfil" width="90" height="90">
						<?php
					}
				}
				?>        
                    <div class="cart"> 
                        <form action="#" method="post" class="last"> 
                                <a href="carrito_compras.php"><img src="../../../images/carrito.jpg" width="100" height="100"></a>
                            <input type="hidden" name="cmd" value="" />
                            <input type="hidden" name="display" value="" />
                        </form>  
                    </div>
                    <div class="clearfix"> </div> 
                </div>   
                    <div class="clearfix"> </div>
                </div>		
            </div><!-- //header-two -->

 
        <header>
		
				<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
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

            </header>
            <br>
            <br>

            
            <div>
                <h1>VISIÓN</h1>

                <br>
                <br>
                <br>

                <h1>
                    <p>Nuestra Visión es er la cadena de supermercados líder a nivel local, ofreciendo una gran variedad de
                        productos
                        con precios accesibles y una proyección comunitaria.
                    </p>
                </h1>
            </div>



</body>
</html>