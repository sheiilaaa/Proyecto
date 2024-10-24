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

