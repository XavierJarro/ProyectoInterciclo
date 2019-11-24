<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['permisos'] === 'admin') {
    header("Location: /proyectoInterciclo/supermarket/public/vista/login.html");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Supermarket Jessica</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    //incluir conexión a la base de datos
    include '../../../../config/conexionBD.php';

    $codigousu = $_SESSION['codigo'];

    $codigo = isset($_POST["codigo"]) ? mb_strtoupper(trim($_POST["codigo"]), 'UTF-8') : null;
    $cedula = isset($_POST["cedula"]) ? mb_strtoupper(trim($_POST["cedula"]), 'UTF-8') : null;
    $sucursal = $_POST['sucursal'];
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $subtotal = isset($_POST["subtotal"]) ? mb_strtoupper(trim($_POST["subtotal"]), 'UTF-8') : null;
    $iva = isset($_POST["iva"]) ? mb_strtoupper(trim($_POST["iva"]), 'UTF-8') : null;
    $total = isset($_POST["total"]) ? mb_strtoupper(trim($_POST["total"]), 'UTF-8') : null;

    $sub = (double)$subtotal;
    $iv = (double)$iva;
    $to = (double)$total;




    $sql = "INSERT INTO factura_cabecera VALUES(0, NULL, '$direccion', '$cedula', '$codigo', '$sucursal', 'N')";

    if ($conn->query($sql) === TRUE) {

        /*$sql2= "SELECT * FROM  factura_cabecera WHERE facab_eliminada = 'N' AND facab_usu_codigo = '$codigousu'";  */
        $sql2 = "SELECT * FROM factura_cabecera WHERE facab_usu_codigo = $codigousu AND facab_fecha = (SELECT MAX(facab_fecha) from factura_cabecera);";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $codfacab = $row2['facab_codigo'];

                $sql4 = "SELECT * FROM pedidos WHERE ped_eliminado = 'N' AND ped_cod_usu = '$codigousu'";
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                    while ($row4 = $result4->fetch_assoc()) {
                        $cantidad = $row4['ped_cantidad'];
                        $codpro = $row4['ped_cod_pro'];

                        $sql5 = "INSERT INTO factura_detalle VALUES(0, '$cantidad', '$sub', '$iv', '$total', '$codfacab', '$codpro', 'N')";
                        if ($conn->query($sql5) === TRUE) {
                            echo "<p>Factura detalle creada correctamente!!!</p>";
                        }
                    }
                }
            }
        }
        echo "<p>Factura cabecera creada correctamente!!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>Error de creacion de factura </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    //cerrar la base de datos
    $conn->close();
    echo "<a href='../../../vista/usuario/factura_pedido.php'>Regresar</a>";
    ?>

</body>
<html>