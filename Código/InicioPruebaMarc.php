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
    <div id="header">
        <div class="logo">
            <img src="IMG/logo.png" alt="COACHING SL">
        </div>
        <nav>
            <ul>
                <li><a href=""><i class="fa fa-home"></i> <span data-translate="inicio">Inicio</span></a></li>
                <li><a href=""><i class="fa fa-briefcase"></i> <span data-translate="como_trabajar">Como Trabajar</span></a></li>
                <li><a href=""><i class="fa fa-phone-square"></i> <span data-translate="contacto">Puesta en contacto</span></a></li>
                <li><a href=""><i class="fa fa-address-book"></i> <span data-translate="especialistas">Especialistas</span></a></li>
                <li><a href=""><i class="fa fa-calendar"></i> <span data-translate="calendario">Calendario</span></a></li>
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
                    <input type="email" name="email" id="login-email" required placeholder="Introduce tu correo" data-translate="correo_placeholder">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="login-password" required placeholder="Introduce tu contraseña" data-translate="contrasena_placeholder">
                </div>
                <div class="form-group">
                    <button type="submit" data-translate="boton_iniciar_sesion">Iniciar Sesión</button>
                </div>
            </form>
        </div>

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

    <script src="JS/InicioMarc.js"></script>
    <script src="JS/traducciones.js"></script>

</body>
</html>




<?php
$sql = "SELECT DNI, contraseña FROM clientes WHERE DNI=$DNI"

if(mysqli_query($conn,$sql)){
    header("Location:ConfModEspe.php?DNI_Especialista=$DNI_Especialista");
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

else{
    "<script >"
}

else{
    error_log("Error al preparar la consulta: " . mysqli_error($conn));
    echo ""
}

?>
