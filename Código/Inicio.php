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

<!-- CONEXIÓN A LA BASE DE DATOS -->
<?php
session_start();
include("./GestionBD/1-conexion.php");

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
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

<div class="container" id="container">

    <!-- REGISTRO DE NUEVO USUARIO -->
    <div class="form-container sign-up-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['RegistrarUsuario'])) {
            // Obtener y validar datos del formulario
            $DNI_Cliente = $_POST['DNI_Cliente'];
            $NumTelefono_Cliente = $_POST['NumTelefono_Cliente'];
            $Correo_Cliente = $_POST['Correo_Cliente'];
            $Nombre_Cliente = $_POST['Nombre_Cliente'];
            $Apellido_Cliente =$_POST['Apellido_Cliente'];
            $Contrasena_Cliente =  $_POST['Contrasena_Cliente'];
            $FechaNacimiento_Cliente =  $_POST['FechaNacimiento_Cliente'];
            $NombreVia_Cliente =  $_POST['NombreVia_Cliente'];
            $NumeroVia_Cliente =  $_POST['NumeroVia_Cliente'];
            $TipoVia_Cliente =  $_POST['TipoVia_Cliente'];
            $Tipo =  "cliente";

            // Consulta para insertar usuario
            $sql = "INSERT INTO CLIENTES 
                        (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, Contrasena_Cliente, FechaNacimiento_Cliente, NombreVia_Cliente, NumeroVia_Cliente, TipoVia_Cliente,Tipo)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";

            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 'sssssssssss', $DNI_Cliente, $NumTelefono_Cliente, $Correo_Cliente, $Nombre_Cliente, $Apellido_Cliente, $Contrasena_Cliente, $FechaNacimiento_Cliente, $NombreVia_Cliente, $NumeroVia_Cliente, $TipoVia_Cliente,$Tipo);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: pago.php?Nombre_Cliente=$Nombre_Cliente");
                exit;
            } else {
                echo "<script>alert('Error al registrar usuario');</script>";
            }
        }
        ?>
        <form action="" method="post">
            <h1>Regístrate</h1>
            <input type="text" name="DNI_Cliente" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">
            <input type="tel" name="NumTelefono_Cliente" required placeholder="Teléfono">
            <input type="email" name="Correo_Cliente" required placeholder="Correo">
            <input type="text" name="Nombre_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Nombre">
            <input type="text" name="Apellido_Cliente" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">
            <input type="password" name="Contrasena_Cliente" required placeholder="Contraseña">
            <input type="date" name="FechaNacimiento_Cliente" placeholder="Fecha de Nacimiento">
            <input type="text" name="NombreVia_Cliente" placeholder="Nombre de la vía">
            <input type="text" name="NumeroVia_Cliente" placeholder="Número de la vía">
            <input type="text" name="TipoVia_Cliente" placeholder="Tipo de vía">
            <input type="text" name="Tipo" placeholder="Tipo">
            <button type="submit" name="RegistrarUsuario">Registrarse</button>
        </form>
    </div>

    <!-- INICIO DE SESIÓN -->
    <div class="form-container login-container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['IniciarSesion'])) {
            $DNI_Cliente =  $_POST['DNI_Cliente'];
            $Contrasena_Cliente =  $_POST['Contrasena_Cliente'];

            $sql = "SELECT * FROM CLIENTES WHERE DNI_Cliente = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, 's', $DNI_Cliente);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if ($Contrasena_Cliente === $row['Contrasena_Cliente']) {
                    $_SESSION['DNI_Cliente'] = $row['DNI_Cliente'];
                    $_SESSION['Tipo'] = $row['Tipo'];
                    header("Location: ComoTrabajamos.php");
                    exit;
                } else {
                    echo "<script>alert('Contraseña incorrecta');</script>";
                }
            } else {
                echo "<script>alert('Usuario no encontrado');</script>";
            }
        }
        ?>
        <form action="" method="post">
            <h1>Iniciar Sesión</h1>
            <input type="text" name="DNI_Cliente" required placeholder="DNI">
            <input type="password" name="Contrasena_Cliente" required placeholder="Contraseña">
            <button type="submit" name="IniciarSesion">Iniciar Sesión</button>
        </form>
        <a href="inicioESPE.php">Iniciar Sesión Especialista</a>
    </div>
</div>
</body>
</html>
