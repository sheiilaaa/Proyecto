<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- CONEXION -->
<?php
    session_start();
    include ("./GestionBD/conexion.php");
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

<!--Confirmación Pago-->
        <div id="contenedor">
            <div class="central">
                <div class="titulo">
                  <?php

                        $Estado_Pago = $_REQUEST["Estado_Pago"];
                        echo "El articulo $nombre se ha modificado correctamente"; //Actualizamos en la página de ModificarArticulos, y aquí see muestra por pantalla el nombre del articulo que fue modificado
                    ?>
                </div>
                
                <div class="pie-form">
                     <a href="login.php">incio</a>
                </div>   
            </div>
        </div>       
        
        <div class="pie-form">
                <a href="login.php">incio</a>
         </div>   

<h3>El pago se ha realizado de manera correcta</h3>


<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
    
</body>
</html>
