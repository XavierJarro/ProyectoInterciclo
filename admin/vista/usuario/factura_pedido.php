<?php 
session_start(); 
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin'){ 
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
<title>Supermarket Jessica | Facturación</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../../../css/estilos.css" rel="stylesheet" type="text/css" media="all">
<link href="../../../css/estilo_producto.css" rel="stylesheet" type="text/css" media="all">
<link href="../../../css/estilo_index.css" rel="stylesheet" type="text/css" media="all">
<link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../../css/style.css" rel="stylesheet" type="text/css" media="all" /> 

<!-- font-awesome icons -->
<link href="../../../css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="../../../js/pagina/jquery-2.2.3.min.js"></script> 
<script src="../../../js/calculos_factura.js"></script> 
<!-- //js --> 

	<!-- //smooth-scrolling-of-move-up -->
<script src="../../../js/pagina/bootstrap.js"></script>	
<style>@import url(http://fonts.googleapis.com/css?family=Bree+Serif);
  			body, h1, h2, h3, h4, h5, h6{
    			font-family: 'Bree Serif', serif;
 	 									}
  	</style>
</head>
<body>
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
				<div class="header-cart"> 
					<div class="cart"> 
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
	</div>
	
    <!-- AQUI MANDO LOS DATOS PARA LA FACTURA CON LA CANTIDADs -->
    <!-- ========================AQUI MANDO LOS DATOS PARA LA FACTURA CON LA CANTIDADs ===============================================-->
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

	<form method="POST" action="../../controladores/usuario/facturas/crear_factura.php" enctype="multipart/form-data">

    <section>
    
     <!-- ========================AQUI MANDO LOS DATOS PARA la cabecera ===============================================-->
    

    <?php

        include '../../../config/conexionBD.php';

        
        $sql= "SELECT * FROM usuario WHERE usu_codigo = '$codigo'";
        $result= $conn->query($sql);
        if($result->num_rows> 0) {
            while($row= $result->fetch_assoc()) {

    ?>


    <div class="container">
			<div class="row">
            
		<div class="col-xs-6">
            <h1><a href=" "><img alt="" src="data:image/jpg;base64,<?php echo base64_encode($row['usu_imagen']) ?>" width="90" height="90"/>  </a></h1>
            
		</div>
		<div class="col-xs-6 text-right">
							<div class="panel panel-default">
							<div class="panel-heading">	
							</div>
							<div class="panel-body">
								<h4>FACTURA : 
										<a href="#">5</a>
								</h4>
							</div>
						</div>
					</div>
 
			<hr />
 
			
				<h1 style="text-align: center;">FACTURA</h1> 
			
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-default">
								<div class="panel-heading">
									<h4>Ecuador Cuenca, <?php echo date("Y-m-d");?>
                                    <input type="hidden" name="fecha"  value="<?php echo date("Y-m-d");?>">
                                    <label for="" ty></label>
									</h4>
								</div>
						<div class="panel-body">
						
                                <h4>Cedula : 
									<input type="hidden" id="codigo" name="codigo" value="<?php echo $row['usu_codigo'] ?>" />  
									<a href="#"><?php echo $cedula = $row['usu_cedula'] ?></a>
									<input type="hidden" id="cedula" name="cedula" value="<?php echo $cedula  ?>" />  
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
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
									<!--Sucursal :
									<a href="#">nombre sucursal</a>-->
								</h4>
								<h4>Comprador :  
									<a href="#"><?php echo $row['usu_nombres'] ?> <?php echo $row['usu_apellidos'] ?></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
                                </h4>
                                <h4>Dirección :  
									<a href="#"><?php echo $direccion = $row['usu_direccion'] ?></a>
									<input type="hidden" id="direccion" name="direccion" value="<?php echo $direccion  ?>" />  
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
                                </h4>
                                <h4>Telefono :  
									<a href="#"><?php echo $row['usu_telefono'] ?></a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									
								</h4>
					
						</div>
						</div>
					</div>
					
				</div>
<pre></pre>

<?php

            }
        }
        $conn->close();
?>

<!--DATOS PARA DETALE DE LA FACTURA =========================================-->


<table class="table table-bordered">
	<thead >
		<tr >
			<th style="text-align: center;">
				<h4>Cantidad</h4>
			</th>
			<th style="text-align: center;">
				<h4>Concepto</h4>
			</th>
			<th style="text-align: center;">
				<h4>Precio unitario</h4>
			</th>
			<th style="text-align: center;">
				<h4>Total</h4>
			</th>
			
		</tr>
	</thead>
	<tbody>

    <!--SACO LOS DETALES===================================-->

    <?php

        include '../../../config/conexionBD.php';

        $sql = "SELECT * FROM pedidos WHERE ped_cod_usu = '$codigo' AND ped_eliminado = 'N'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $codPro = $row['ped_cod_pro'];

                $sql2 = "SELECT * FROM productos WHERE pro_codigo = '$codPro'";
                $result2 = $conn->query($sql2);
                if($result2 != null){
                    $row2 = $result2->fetch_assoc();
     ?>
		<tr>
            <td style="text-align: center;"><?php echo $row['ped_cantidad'] ?></td>
			<td><a href="#"> <?php echo $row2['pro_descripcion'] ?></a></td>
			<td class=" text-right "><?php echo $row2['pro_precio'] ?></td>
			
			<td class=" text-right "><?php echo $row['ped_cantidad'] * $row2['pro_precio'] ?></td>

			<input type="hidden" value="<?php $subtotal += $row['ped_cantidad'] * $row2['pro_precio']; ?>">
			
        </tr>
        
        <?php

				}
				 
            }
		}
		$iva = ($subtotal*12)/100;
		$total = $subtotal + $iva;

		$conn->close();

        ?>


		<tr>
			<td>&nbsp;</td>
			<td><a href="#"> &nbsp; </a></td>
			<td class="text-right">&nbsp;</td>
			<td class="text-right ">&nbsp;</td>
			
		</tr>
		<tr >
            <td colspan="3" style="text-align: right;">SUBTOTAL</td>
            
			<td style="text-align: right;"><?php echo $subtotal ?></td>
			<input type="hidden" id="subtotal" name="subtotal" value="<?php echo $subtotal ?>" />  
			
			
        </tr>
        <tr >
            <td colspan="3" style="text-align: right;">IVA 12%</td>
            
			<td style="text-align: right;"><?php echo $iva ?></td>
			<input type="hidden" id="iva" name="iva" value="<?php echo $iva ?>" />
			
        </tr>
        <tr >
            <td colspan="3" style="text-align: right;">TOTAL</td>
            
			<td style="text-align: right;"><?php echo $total ?></td>
			<input type="hidden" id="total" name="total" value="<?php echo $total ?>" />
			
		</tr>
		
	</tbody>
</table>
<pre></pre>
		

	<div class="row">
			<div class="col-xs-4">
				
			</div>
			<div class="col-xs-8">
			
				<div class="panel panel-info"  style="text-align: right;">
				</div>
			
		</div>
	</div>
		
</div>
</div>

	

		
	
	</section>

	<h3> <p style="text-align: center" ><input type="submit" value="FINALIZAR LA COMPRA"></p></h3>

	</form>



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
	
	<div class="copy-right"> 
		<div class="container">
			<p>© 2019 Supermaxi Fabiola . Todos los derechos reservados diseñado por<a href="http://w3layouts.com"> Ing. UPS</a></p>
		</div>
	</div> 
	<!-- cart-js -->
	<script src="../../../js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
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
	
	<script src="../../js/jquery.classycountdown.js"></script>
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