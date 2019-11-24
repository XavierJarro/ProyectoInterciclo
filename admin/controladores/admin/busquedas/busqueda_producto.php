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
    <caption>Gestion de Productos</caption>
        <tr>
                <th>Nombre</th>
				<th>Descripción</th>
				<th>Precio</th>
				<th>Stock</th>
				<th>Imagen</th>
				<th>Categoría</th>
				<th>Eliminar</th>
				<th>Actualizar</th>
        </tr>

        <?php
        
        $producto = $_GET['productonombre'];

        include '../../../../config/conexionBD.php';
        
        $sql = "SELECT * FROM productos WHERE pro_eliminado = 'N' AND pro_nombre LIKE '$producto%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codCategoria = $row['pro_cod_categoria'];


                $sql2 = "SELECT * FROM categoria WHERE cate_codigo = $codCategoria";
					$result2 = $conn->query($sql2);
					if ($result2 != null) {

						$row2 = $result2->fetch_assoc();

						$nombre = $row["pro_nombre"];
						$descripcion = $row["pro_descripcion"];
						$precio = $row["pro_precio"];
						$stok = $row["pro_stock"];
						$categoria = $row2["cate_nombre"];

						echo "<tr>";
						echo "   <td>" . $nombre . "</td>";
						echo "   <td>" . $descripcion . "</td>";
						echo "   <td>" . $precio . "</td>";
						echo "   <td>" . $stok . "</td>";
						echo "   <td> <img src='data:image/jpg;base64," . base64_encode($row['pro_imagen']) . "' alt='imagenPerfil' width='100' height='100'></td>";
						echo "   <td>" . $categoria . "</td>";
						echo "   <td>" . "<a href = 'eliminar_producto.php?codigo=" . $row['pro_codigo'] . "&categoria=". $categoria."'>" . "eliminar</a>" . "</td>";
						echo "   <td>" . "<a href = 'actualizar_producto.php?codigo=" . $row['pro_codigo'] . "&categoria=". $categoria."&codigocategoria=". $codCategoria."'>" . "actualizar</a>" . "</td>";
						echo "</tr>";
					} else {
						echo "<tr>";
						echo "   <td colspan='7'> No existen productos</td>";
						echo "</tr>";
					}
                    
            }
        } else {
            echo "<tr>";
            echo "   <td colspan='4'> No existen productos </td>";
            echo "</tr>";
        }
        ?>
</table>
</body>

</html>