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
	<title>Detalle Producto</title>
       <link rel="stylesheet" href="../../css/producto.css">
       <script type="text/javascript" src="js/pagina/frutas.js"></script>
       <link rel="stylesheet" type="text/css" href="../../css/ver.css"id="vent">

       <link href="../../css/detalle.css" rel="stylesheet">
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
<link href="../../../css/tablascuadros.css" rel="stylesheet" type="text/css"/>
                   
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
                <div class="clearfix"> </div>
            </div>		
        </div><!-- //header-two -->


    <header>
    
            <nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
                <ul class="nav">
                        <li><a href="productos.php">PRODUCTOS</a>
                            <ul>
                                <li><a href="#frut">FRUTAS</a></li>
                                <li><a href="#veget">VEGETALES</a></li>
                                <li><a href="#viv">VIVERES</a></li>
                                <li><a href="#bebi">BEBIDAS</a></li>                                
                                <li><a href="#car">CARNES</a></li>
                                <li><a href="#as">ASEO</a></li>
                            </ul>
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

            
        </header>
        <br>
        <br>

        

        <!--PRODUCTOS DE LA BASE ---->
        <div>
        <!--CREAR SUCURSAL -->
        <section>
		
        <?php

        $codigopro = $_GET['codigo'];
           
           $sql = "SELECT * FROM productos WHERE pro_codigo = '$codigopro' AND pro_eliminado = 'N'";
           $result = $conn->query($sql);
            if($result->num_rows> 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                <div class="producto">
                <center>
                    <form method="POST" action="../../controladores/usuario/pedidos/pedido_usuario.php">
                    <img id="imag" class="imag" src="data:image/jpg;base64,<?php echo base64_encode($row['pro_imagen']) ?>" alt="imagenPerfil" width="90" height="90"><br><br>
                    <span><?php echo $row['pro_nombre']?></span><br><br>
                    <span>Precio: <?php echo $row['pro_precio']?></span><br><br>
                    <label for="">Cantidad</label>
                    <select name="cantidad" id="cantidad">
                        <option value="0">escoja</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select> <br>
                    <input type="hidden" id="codigopro" name="codigopro" value="<?php echo $row['pro_codigo'] ?>" />  
                    <input type="submit" id="anadir" name="anadir" value="Añadir al carrito de compras"> 
                    </form >
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