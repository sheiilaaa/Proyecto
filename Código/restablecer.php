
<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    <head>
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">
        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
                    <a href=""><i class="fa fa-calendar">Calendario</i></a>
                </div>
            </div>
            <div class="photo-text">
                <h4 data-ix="skype">Coaching sl</h4>
            </div>
            <div class="overlay"></div>
        </section>

<!-- Codigo inicio  -->
        <div id="contenedor">
            <div class="central">
                <div class="titulo">
                <?php
                    $Nombre = $_REQUEST["Nombre_Cliente"];
                    echo "$Nombre se ha modificado correctamente la contraseña" //De la pantalla de recuperar contraseña, una vez guardada la información en la base de datos nos manda a esta pantalla donde nos dice que se ha guardado correctamente
                ?>
                </div>
                <div class="pie-form">
                     <a href="Inicio.php">incio</a>
                </div>   
            </div>
        </div>

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>        
    </body> dame dos minutoos y lo miro valeeee
</html> mira como te queda el cabezado, vale