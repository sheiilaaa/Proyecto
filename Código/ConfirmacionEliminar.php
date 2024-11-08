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

