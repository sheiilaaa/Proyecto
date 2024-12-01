<!-- INICIO SESIÓN -->
<?php
//Esto deberas poner si quieres que todos vayan a la misma pagina
/**<?php
session_start(); // Asegúrate de que la sesión está iniciada

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['rol'])) {
    // Si no está logueado, redirigir a la página de login
    header("Location: login.php");
    exit;
}

// Mostrar contenido basado en el rol
if ($_SESSION['rol'] == 'cliente') {
    echo "<h1>Bienvenido, Cliente " . $_SESSION['nombre'] . "</h1>";
    // Aquí puedes agregar contenido específico para los clientes
    echo "<p>Contenido exclusivo para clientes...</p>";
} elseif ($_SESSION['rol'] == 'especialista') {
    echo "<h1>Bienvenido, Especialista " . $_SESSION['nombre'] . "</h1>";
    // Aquí puedes agregar contenido específico para los especialistas
    echo "<p>Contenido exclusivo para especialistas...</p>";
} elseif ($_SESSION['rol'] == 'admin') {
    echo "<h1>Hola admin</h1>";
}else {
    echo "<h1>Rol desconocido</h1>";
    // Opcional: Mensaje de error si el rol no es válido
}
?>*/ 


    session_start(); // Asegúrate de que la sesión está iniciada

    if (isset($_REQUEST['Iniciar'])) {
        // Obtener los datos del formulario
        $dni = htmlspecialchars(trim($_POST['DNI-login']));
        $pwd = trim($_POST['login-password']);

        // Conexión a la base de datos
        include('conexion.php');  // Asegúrate de incluir la conexión

        // Verificar si es un usuario CLIENTE
        $sql = "SELECT * FROM CLIENTES WHERE DNI = ?"; 
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $dni);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $dni_bd, $password_hash, $nombre);
            
            if (mysqli_stmt_fetch($stmt)) {
                if ($dni === "un dni") { //esto admin 
                    $_SESSION['rol'] = 'admin';
                    $_SESSION['DNI-login'] = $dni;
                    header("Location: ListadoEspecialistas.php");
                } else {
                    $_SESSION['rol'] = 'usuario'; // usuario normal 
                    $_SESSION['DNI-login'] = $dni;
                    header("Location: ComoTrabajamos.php")
                }
            }
        }
        // Verificar si es un especialista
        $sql = "SELECT * FROM ESPECIALISTAS WHERE DNI = ?"; 
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $dni);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $dni_bd, $password_hash, $nombre);
            
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($pwd, $password_hash)) {
                    $_SESSION['rol'] = 'especialista'; //especialistas
                    $_SESSION['nombre'] = $nombre;
                    header("Location: ListadoEspecialistas.php");
                    exit;
                }
            }
        }

        // Si no se encontró el usuario o la contraseña es incorrecta
        echo "Usuario o contraseña incorrectos.";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="titulo_pagina">COACHING SL | Iniciar Sesión</title>
    
    <link rel="stylesheet" href="CSS/marc.css">
    <link rel="shortcut icon" href="IMG/logo.png" type="image/x-icon"> <!--FAVICON-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    
<!--CABECERA-->
<div id="header">
        <div class="logo">
            <img src="img/logo.png" alt="COACHING SL">
        </div>
        <nav>
            <ul>
                <li><a href="Inicio.php"><i class="fa fa-home"></i> <span data-translate="inicio">Inicio</span></a></li>
                <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> <span data-translate="como_trabajar">¿Quiénes somos?</span></a></li>
                <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> <span data-translate="contacto">Puesta en contacto</span></a></li>
                <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> <span data-translate="especialistas">Especialistas</span></a></li>
                <li><a href="Calendario.html"><i class="fa fa-calendar"></i> <span data-translate="calendario">Calendario</span></a></li>
                <li>               
                    <div class="lenguage-selector">
                        <label for="lenguage"></label>
                        <select name="lenguage" id="lenguage">
                            <option value="es" data-translate="espanol">Español</option>
                            <option value="ca" data-translate="catalan">Catalan</option>
                            <option value="en" data-translate="ingles">Inglés</option>
                            <option value="fr" data-translate="frances">Francés</option>
                            <option value="it" data-translate="italiano">Italiano</option>
                            <option value="eu" data-translate="euskera">Euskera</option>
                            <option value="gl" data-translate="gallego">Gallego</option>
                            <option value="su" data-translate="sueco">Sueco</option>
                        </select>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container">
        <div class="tabs">
            <button class="tab-button active" onclick="openTab('login')" data-translate="iniciar_sesion">Iniciar Sesión</button>
            <button class="tab-button" onclick="openTab('register')" data-translate="registrar">Registrar</button>
        </div>      


        <div class="tab-content active" id="login">
            <form method="post">
                <h2 data-translate="iniciar_sesion_titulo">Iniciar Sesión</h2>
                <div class="form-group">
                    <!--! Esto se tiene que cambiar para que pida el DNI-->
                    <input type="text" name="dni" id="DNI-login" required placeholder="Introduce tu DNI" data-translate="DNI_placeholder">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="login-password" required placeholder="Introduce tu contraseña" data-translate="contrasena_placeholder">
                </div>
                <div class="form-group">
                    <button type="submit" data-translate="boton_iniciar_sesion" name="Iniciar">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    <!-- REGISTRO -->
   
        <?php
            if(isset($_REQUEST['Register'])){
                $DNI_Cliente=$_REQUEST['DNI_Cliente'];
                $NumTelefono_Cliente=$_REQUEST['NumTelefono_Cliente'];
                $Correo_Cliente=$_REQUEST['Correo_Cliente'];
                $Nombre_Cliente=$_REQUEST['Nombre_Cliente'];
                $Apellido_Cliente=$_REQUEST['Apellido_Cliente'];
                $Contrasena_Cliente=$_REQUEST['Contrasena_Cliente']; 
                $FechaNacimiento_Cliente=$_REQUEST['FechaNacimiento_Cliente'];
                $NombreVia_Cliente=$_REQUEST['NombreVia_Cliente'];
                $NumeroVia_Cliente=$_REQUEST['NumeroVia_Cliente'];
                $TipoVia_Cliente=$_REQUEST['TipoVia_Cliente'];
                $de= "INSERT INTO CLIENTES (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, Contrasena_Cliente, FechaNacimiento_Cliente,NombreVia_Cliente,NumeroVia_Cliente,TipoVia_Cliente)
                VALUES ('$DNI_Cliente','$NumTelefono_Cliente', '$Correo_Cliente', $Nombre_Cliente, '$Apellido_Cliente', '$Contrasena_Cliente', ' $FechaNacimiento_Cliente', '$NombreVia_Cliente','$NumeroVia_Cliente','$TipoVia_Cliente';";
            
                $pagos = "$Nombre_Cliente,$Apellido_Cliente,$DNI_Cliente"; 
                
                
                if (mysqli_query($conn,$de))
                {
                    header("Location:Pago.php?pagos=$pagos");
                }
            
                else 
                {
                    echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
                }

                    if (mysqli_query($conn,$de)){
                        header("Location:Inicio.php?Nombre_Cliente=$Nombre_Cliente");
                        /*Los campos de $https://www.citapreviadnie.es/citaPreviaDni/MantenimientoPagos.actionNombre_Cliente $apellidos $Fecha_Nac $telefono $telefono $email $contraseña se han añadido correctamente*/
                        
                        }
                        else {
                            echo "Error:  "   . $de . "<br>" . mysqli_error($conn);
                        }
                    }   
                else{
            ?>
        
        <div class="tab-content" id="register">
            <form action="" method="post">
                <h2 data-translate="registro_titulo">Registro</h2>
                <div class="form-group">
                    <input type="text" name="dni" id="DNI_Cliente" required placeholder="Introduce tu DNI" pattern="[0-9]{8}[a-zA-Z]{1}" data-translate="dni_placeholder">
                </div>
                <div class="form-group">
                    <input type="tel" name="telefono" id="Telefono_Cliente" required placeholder="Introduce tu telefono" minlength="9" maxlength="9" data-translate="telefono_placeholder">
                </div>
                <div class="form-group">
                    <input type="email" name="correo" id="Correo_Cliente" required placeholder="Introduce tu email" data-translate="correo_placeholder">
                </div>
                <div class="form-group">
                    <input type="text" name="nombre" id="Nombre_Cliente" required placeholder="Introduce tu nombre" data-translate="nombre_placeholder">
                </div>
                <div class="form-group">
                    <input type="text" name="apellidos" id="Apellidos_Cliente" required placeholder="Introduce tus apellidos" data-translate="apellidos_placeholder">
                </div>
                <div class="form-group">
                    <input type="date" name="nacimiento" id="Nacimiento_Cliente" required placeholder="Introduce tu fecha de nacimiento" data-translate="fecha_nacimiento_placeholder">
                </div>
                <div class="form-group">
                    <input type="text" name="via" id="Via_Cliente" required placeholder="Introduce tipo de via de su calle" data-translate="via_placeholder">
                </div>
                <div class="form-group">
                    <input type="text" name="calle" id="Calle_Cliente" required placeholder="Introduce el nombre de su calle" data-translate="calle_placeholder">
                </div>
                <div class="form-group">
                    <input type="text" name="numero" id="Numero_Cliente" required placeholder="Introduce el numero de su calle" data-translate="numero_placeholder">
                </div>
                <div class="form-group">
                    <input type="password" name="contrasena" id="Contrasena_Cliente" required placeholder="Introduce su contraseña" data-translate="contrasena_placeholder">
                </div>
                <div class="form-group">
                    <button type="submit" id="Register" name="Register" data-translate="boton_registrar">Registrarse</button>
                </div>
            </form>
        </div>
    </div>

    <?php
            }
    ?>
<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>


    <!-- Link a JavaScript -->
    <script src="JS/InicioMarc.js"></script>
    <script src="JS/traducciones.js"></script>

</body>
</html>