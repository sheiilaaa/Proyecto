<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar cita</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
<!-- CONEXION -->
<?php
    session_start();
    include("./GestionBD/1-conexion.php");
?>

<!--CABECERA-->
    <section class="photo" id="inicio">
        <div class="nav" id="sticker">
            <label for="toggle">&#9776</label>
            <input type="checkbox" id="toggle" />
            <div class="menu">
                <img src="IMG/logo.png" alt="" class="logo">
                <a href=""><i class="fa fa-home"> Inicio</i></a>
                <a href=""><i class="fa fa-info"> Como trabajar</i></a>
                <a href=""><i class="fa fa-briefcase"> Puesta en contacto</i></a>
                <a href=""><i class="fa fa-address-book"> Listado especialistas</i></a>
                <a href=""><i class="fa fa-calendar-o">Calendario</i></a>
            </div>
        </div>
        <div class="photo-text">
            <h4 data-ix="skype">Coaching sl</h4>
        </div>
        <div class="overlay"></div>
    </section>

<!--FORMULARIO-->

<form action="Pago.php" method="get">
    <fieldset>
        <legend>Reservar cita</legend>
        <div class="registro">                    
            </div>
            <div class="opciones">
                <h1>
                    <label for="user">Nombre:</label>
                    <input type="text" name="Nombre" id="user">
                </h1>
                <h1>
                    <label for="user">Apellido:</label>
                    <input type="text" name="Apellido" id="user">
                </h1>
                <h1>
                    <label for="user">Contraseña:</label>
                    <input type="password" name="Contraseña" id="user">
                </h1>
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset> <!-- CAJA GRANDE-->
        <legend>¿Qué horario quieres?</legend><!-- NOMBRE CAJA GRANDE-->

        <input type="radio" name="user" value="standard">
        <label for="user">Standard</label>
        <input type="radio" name="user" value="Premium">
        <label for="user">Premium</label>
        <input type="radio" name="user" value="VIP">
        <label for="user">VIP</label>

    </fieldset>
    <br>
    <fieldset>
        <legend>orgghtk n jm</legend>

        <select name="Metodo de pago" id="user">
            <optgroup label="Tarjeta">
                <option value="VISA">VISA</option>
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
    <div class="dni">
        <fieldset>
            <legend>Adjunte su DNI/NIF</legend>
            <input type="file" name="fileupload" accept="image/*" id="file"><br>
        </fieldset>
    </div>
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
