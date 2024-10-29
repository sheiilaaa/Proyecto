<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <title> Confirmacion Eliminar </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
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
                        include ("./GestionBD/conexion.php");
                        echo "Se ha eliminado correctamente el especialista"
                    ?>
                </div>
                
                <div class="pie-form">
                     <a href="Inicio.php">Inicio</a>
                </div>   
            </div>
        </div>       
        
        <div class="pie-form">
                <a href="Inicio.php">Inicio</a>
         </div>   
    </body>
</html>

