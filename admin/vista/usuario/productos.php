<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin'){ 
    header("Location: /proyectoInterciclo/supermarket/public/vista/login.html"); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Productos</title>
       <link rel="stylesheet" href="../../css/producto.css">
       <script type="text/javascript" src="js/pagina/frutas.js"></script>
       <link rel="stylesheet" type="text/css" href="../../css/ver.css"id="vent">

       <link href="../../../css/detalle.css" rel="stylesheet">
       <link href="../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
       <link href="../../../css/producto.css" rel="stylesheet">
       <link href="../../../css/pedido.css" rel="stylesheet" />
       <link href="../../../css/estilo_producto.css" rel="stylesheet" type="text/css">
       <script src="../../../js/pasar_cantidad.js"></script>	

       <link rel="stylesheet" type="text/css" href="../../../css/estilo_productos_carrito.css">
       <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
       <script type="text/javascript"  href="../../../js/carrito_compras.js"></script>


       <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
       <link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" /> 
       <link href="../../../css/font-awesome.css" rel="stylesheet"> 
       <script src="../../../js/pagina/jquery-2.2.3.min.js"></script> 
       <script src="../../../js/pagina/bootstrap.js"></script>	


       <link rel="stylesheet" href="style.css" type="text/css"/>
<link href='http://fonts.googleapis.com/css?family=ABeeZee' rel='stylesheet' type='text/css'>
<link href="bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="bootstrap-responsive.css" rel="stylesheet" type="text/css"/>
<link href="../../css/tablascuadros.css" rel="stylesheet" type="text/css"/>
                   
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
							<img id="imag3" class="imag3" src="data:image/jpg;base64,<?php echo base64_encode($row['usu_imagen']) ?>" alt="imagenPerfil" width="90" height="90">
						<?php
					}
				}
				?>                     
            </div>		
        </div><!-- //header-two -->


    <header>
    
            <nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
                <ul class="nav">
                        <li><a href="">PRODUCTOS</a>
                            
                        </li>
                        
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
        <br>
        <br>

        

        <!--PRODUCTOS DE LA BASE ---->
        <div style="text-align: center">
        <?php
                                    

                                    $sql2= "SELECT * FROM sucursal";
                                        $result2= $conn->query($sql2);
                                           
									?>
									<label for="sucu">Sucursal</label> 
									<select name="sucursal" id="sucursal">
											<option value="0">Seleccionar</option>
											<?php  while($row2= $result2->fetch_assoc()) { ?>
											<option value="<?php echo $row2['suc_codigo']?>"><?php echo $row2['suc_nombre']?></option>
									<?php
										}
										
										
									?>
									
                                    </select>
                                    </div>

        <div>
        <!--CREAR SUCURSAL -->
            <section>
		
                <?php
                   
                   $sql = "SELECT * FROM productos WHERE pro_eliminado = 'N'";
                   $result = $conn->query($sql);
                    if($result->num_rows> 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="producto">
                        <center>
                        <img id="imag" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['pro_imagen']) ?>" alt="imagenPerfil" width="90" height="90"><br><br>
                            
                            <span><?php echo $row['pro_nombre'];?></span><br><br>
                            <a href="detalle_producto.php?codigo=<?php  echo $row['pro_codigo'];?>">ver</a>
                        </center>
                    </div>
                <?php
                    }
                }
                ?>
                </section>
	</div>

    <div class="copy-right"> 
		<div class="container">
			<p>© 2019 Supermaxi Fabiola . Todos los derechos reservados diseñado por<a href="http://w3layouts.com"> Ing. UPS</a></p>
		</div>
	</div> 

	
   
</body>
 </html