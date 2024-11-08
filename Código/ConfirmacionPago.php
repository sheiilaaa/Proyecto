<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
        <div id="contenedor">
            <div class="central">
                <div class="titulo">
                  <?php
                   session_start();
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
