<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>

    <!-- Link hacia el archivo de estilos css -->
    <link rel="stylesheet" href="css/estilo.css">

    <!-- Link favicon -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

    <!-- Link para que funcionen los FA FA -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<!-- CONEXIÓN -->
<?php
session_start();
include("./GestionBD/1-conexion.php");

// Validar conexión a la base de datos
if (!$conn) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Validar que el DNI del cliente esté definido
if (!isset($_SESSION['DNI_Cliente'])) {
    die("Error: DNI_Cliente no está definido.");
}

// Consulta SQL para obtener los datos del cliente
$DNI_Cliente = $_SESSION['DNI_Cliente'];
$sql_cliente = "SELECT * FROM CLIENTES WHERE DNI_Cliente = '$DNI_Cliente'";
$resultado_cliente = mysqli_query($conn, $sql_cliente);

if (!$resultado_cliente || mysqli_num_rows($resultado_cliente) == 0) {
    die("Error: No se encontraron datos del cliente.");
}

$cliente = mysqli_fetch_assoc($resultado_cliente);

// Consulta SQL para obtener los datos del especialista seleccionado
$sql_especialista = "SELECT E.Nombre_Especialista, E.Apellido_Especialista, E.Cuota_Especialista
                    FROM CITAS C
                    JOIN ESPECIALISTAS E ON C.ID_Especialista_Cita = E.ID_Especialista
                    WHERE C.ID_Cliente_Cita = (SELECT ID_Cliente FROM CLIENTES WHERE DNI_Cliente = '$DNI_Cliente')
                    LIMIT 1;";

$resultado_especialista = mysqli_query($conn, $sql_especialista);

if (!$resultado_especialista || mysqli_num_rows($resultado_especialista) == 0) {
    die("Error: No se encontraron datos del especialista.");
}

$especialista = mysqli_fetch_assoc($resultado_especialista);
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

<!-- CONTENIDO -->
               
    <!-- Datos del cliente -->
    <div class="Fondo_pago">
            <form id="Pago.php" action="" method="POST"><!--CAMBIAR DEPENDIENDO DE DONDE VENGA-->
                <div class="infoespecialista">
                    <div class="registro">Especialista</div>
                    <div class="IzqInfo"></div>
                    <div class="TIT">Ha escogido a:</div>
                    <div class="SuNOMBRE">
                        <label for="Nombre_Especialista"></label>    
                        <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" value='<?php echo ($especialista['Nombre_Especialista']); ?>'>
                    </div>
                    <div class="SuApellido">
                        <label for="Apellido_Especialista"></label>    
                        <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" value='<?php echo ($especialista['Apellido_Especialista']); ?>'>
                    </div>

                    <br>
                    <div class="IzqInfo"></div>
                    <div class="TIT">Cuota del Especialista</div>
                    <div class="MostrarCuota">
                        <label for="Cuota_Especialista"></label>    
                        <input type="number" id="Cuota_Especialista" name="Cuota_Especialista" class="caja" value='<?php echo ($especialista['Cuota_Especialista']); ?>'>
                    </div> <!-- MostrarCuota -->       
                </div> <!-- infoespecialista -->
            </form> 

             <!-- Métodos de pago con FA FA -->
        <div class="TarPago">
            <form id="PagoS.php" action="" method="post">
                <div class="TituloPAGO">Elige tu método de pago</div>
                <div class="metodoPAGO">
                    <button class="Tarjeta" type="button">
                        <i class="fa fa-cc-visa" aria-hidden="true"></i> Visa
                    </button>

                    <button class="Tarjeta" type="button">
                        <i class="fa fa-cc-paypal" aria-hidden="true"></i> PayPal
                    </button>

                    <button class="Tarjeta" type="button">
                        <i class="fa fa-mobile-alt" aria-hidden="true"></i> Bizum
                    </button>

                    <button class="Tarjeta" type="button">
                        <i class="fa fa-cc-amex" aria-hidden="true"></i> American Express
                    </button>

                    <button class="Tarjeta" type="button">
                        <i class="fa fa-cc-mastercard" aria-hidden="true"></i> MasterCard
                    </button>
                </div>  
            </form>
        </div>

            <div class="DatosCliente">
                    <form id="PClien.php" action="" method="post">
                        <div class="UsuarioPago">Datos de pago</div>
                        <label for="Nombre_Cliente">Nombre:</label>
                            <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="cajaPago" value="<?php echo ($cliente['Nombre_Cliente']); ?>">
                        
                        <label for="Apellido_Cliente">Apellidos:</label>
                            <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="cajaPago" value="<?php echo ($cliente['Apellido_Cliente']); ?>">
                        
                        <label for="DNI_Cliente">DNI:</label>
                            <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="cajaPago" value="<?php echo ($cliente['DNI_Cliente']); ?>">
                        
                        <label for="Estado_Pago">Estado_Pago:</label> 
                            <input type="text" id="Estado_Pago" name="Estado_Pago" class="cajaPago">
                        
                        <label for="Fecha_Pago">Fecha de Pago:</label>
                            <input type="date" id="Fecha_Pago" name="Fecha_Pago" class="cajaPago">
                        
                        <label for="Cantidad_Pago">Cantidad del Pago:</label> <!--puede dar la opcion de pagar todo tarjeta o efectivo -->
                            <input type="text" id="Cantidad_Pago" name="Cantidad_Pago" class="cajaPago">
                        <br>
                        <input type="checkbox" name="user" value="Acepto los terminos de la página" requiered>
                            <label for="user">Acepto los terminos de la página</label>
                        
                        <div class="button">
                            <input type="submit" value="Enviar"> 
                        </div>
                    </form>
            </div> <!-- DatosCliente -->
    </div> <!-- Fondo_pago -->

<!-- PIE DE PÁGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

<!-- JavaScript -->
<script src="JS/traducciones.js"></script>
</body>
</html>
