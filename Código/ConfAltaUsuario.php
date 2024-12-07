<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!-- CONEXION -->
<?php
session_start();
include("./GestionBD/1-conexion.php");

// Validar conexión a la base de datos
if (!$conn) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Validar que el DNI del cliente esté definido en la sesión
if (!isset($_SESSION['DNI_Cliente'])) {
    die("Error: No se ha iniciado sesión correctamente. DNI_Cliente no está definido.");
}

// Obtener el DNI del cliente desde la sesión
$DNI_Cliente = $_SESSION['DNI_Cliente'];

// Consulta SQL para obtener los datos del cliente
$sql_cliente = "SELECT Nombre_Cliente, Apellido_Cliente FROM CLIENTES WHERE DNI_Cliente = '$DNI_Cliente'";
$resultado_cliente = mysqli_query($conn, $sql_cliente);

// Validar el resultado de la consulta
if (!$resultado_cliente || mysqli_num_rows($resultado_cliente) == 0) {
    die("Error: No se encontraron datos del cliente.");
}

// Obtener los datos del cliente
$cliente = mysqli_fetch_assoc($resultado_cliente);
?>

<!-- CABECERA -->
<div id="header">
    <div class="logo">
        <img src="img/logo.png" alt="COACHING SL">
    </div>
    <nav>
        <ul>
            <li><a href="Inicio.php"><i class="fa fa-home"></i> Inicio</a></li>
            <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> ¿Quiénes somos?</a></li>
            <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> Puesta en contacto</a></li>
            <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> Especialistas</a></li>
            <li><a href="Calendario.html"><i class="fa fa-calendar"></i> Calendario</a></li>
        </ul>
    </nav>
</div>

<!-- CODIGO CONFIRMACION -->
<div id="contenedor">
    <div class="central">
        <div class="titulo">
            <?php
            // Mostrar mensaje de bienvenida al cliente
            echo "Bienvenido " . htmlspecialchars($cliente['Nombre_Cliente']) . " " . htmlspecialchars($cliente['Apellido_Cliente']) . ".";
            ?>
        </div>
        <div class="pie-form">
            <a href="ComoTrabajamos.php">Continuar</a>
        </div>   
    </div>
</div>

<!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

<!-- Link a JavaScript -->
<script src="JS/traducciones.js"></script>

</body>
</html>
