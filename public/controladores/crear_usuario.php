<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php
    //incluir conexión a la base de datos
    include '../../config/conexionBD.php';

    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
    $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
    $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $fechanacimiento = isset($_POST["fechanacimiento"]) ? trim($_POST["fechanacimiento"]) : null;

    $dia = substr($fechanacimiento, 0, 2);
    $mes = substr($fechanacimiento, 3, 2);
    $anio = substr($fechanacimiento, 6, 4);

    $fechaValida = $anio . "/" . $mes . "/" . $dia;

    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $roluser = 'user';


    $sql = "INSERT INTO usuario VALUES(0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', 
    '$correo', MD5('$contrasena'), '$fechaValida', 'N', null, null, '$roluser', null)";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Su registro fue exitoso</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/signup.html'>Regresar</a>";
    ?>

</body>
<html>