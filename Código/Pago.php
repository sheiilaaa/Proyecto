<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComoTrabajamos</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>

<!--CABECERA-->
<header id="header">
    <nav class="menu">
        <div class="logo">
            <img src="img/logo.png">
            <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars" aria-hidden="true"></i></a> 
        </div>
        <div id="enlaces" class="enlaces" >
            <a  href="Inicio.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
            <a  href="ComoTrabajamos.php"><i class="fa fa-info" aria-hidden="true"></i> Como trabajamos</a>
            <a  href="Contacto.php"><i class="fa fa-briefcase" aria-hidden="true"></i>Puesta en contacto</a>
            <a  href="ListadoEspecialista.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Listado especialista</a>
            <a  href="Calendario.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Calendario</a>
        </div>
    </nav>
</header>



    <form id="Pago.php" action="Calendario.php" method="post">

        <fieldset>
            <legend>Alta de usuario</legend>
            <div class="registro">                    
                </div>
                <div class="opciones">
                   
                    <label for="Nombre_Cliente">Nombre:</label>
                    <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre" value='<?php echo $row['Nombre_Cliente']?>' >

                    <label for="Apellido_Cliente">Apellidos:</label>
                    <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos" value='<?php echo $row['Apellido_Cliente']?>'>

                    <label for="DNI_Cliente">DNI:</label>
                    <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI" value='<?php echo $row['DNI']?>'>
   
                    <label for="Estado_Pago">Estado_Pago:</label>
                    <input type="text" id="Estado_Pago" name="Estado_Pago" class="caja" required placeholder="Estado_Pago" value='<?php echo $row['Estado_Pago']?>'>

                    <label for="Metodos_Pago">Metodos de Pago:</label>
                    <input type="text" id="Metodos_Pago" name="Metodos_Pago" class="caja" required placeholder="Metodos_Pago" value='<?php echo $row['Metodos_Pago']?>'>

                    <label for="Fecha_Pago">Fecha de Pago:</label>
                    <input type="date" id="Fecha_Pago" name="Fecha_Pago" class="caja" required placeholder="Fecha_Pago" value='<?php echo $row['Fecha_Pago']?>'>

                    <label for="Cantidad_Pago">Cantidad del Pago:</label>
                    <input type="value" id="Cantidad_Pago" name="Cantidad_Pago" class="caja" required placeholder="Cantidad_Pago" value='<?php echo $row['Cantidad_Pago']?>'>
                    
                    
                    
                    <label for="user">Contraseña:</label>
                    <input type="password" name="Contraseña" id="user">
        
                </div>

            
        
             </div>
        </fieldset>
        <br>
        <fieldset>
            <legend>Que tarifa quieres</legend>

            <input type="radio" name="user" value="standard">
            <label for="user">Standard</label>
            <input type="radio" name="user" value="Premium">
            <label for="user">Premium</label>
            <input type="radio" name="user" value="VIP">
            <label for="user">VIP</label>

        </fieldset>
        <br>
        <fieldset>
            <legend>Metodo de pago</legend>

            <select name="Metodo de pago" id="user">
                <optgroup label="Tarjeta">
                    <option value="VISA">VISA</option>
                    <option value="Bizum">Bizum</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="American Express">American Express</option>
                </optgroup>
                <optgroup label="Pasarela de Pago">
                    <option value="PayPal">PayPal</option>
                    <option value="Strype">Strype</option>
                    <option value="Global Payment">Global Payment</option>
                </optgroup>
            </select>
        </fieldset>
        <br>
        <input type="checkbox" name="user"  value="Acepto los terminos de la página">
        <label for="user">Acepto los terminos de la página</label>
        <br>
        <div class="button">
            <input type="submit" value="Enviar">
        </div>
    </form>


<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>
