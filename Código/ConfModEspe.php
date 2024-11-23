<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>

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
                <a href=""><i class="fa fa-calendar-o">Calendario</i></a>
            </div>
        </div>
        <div class="photo-text">
            <h4 data-ix="skype">Coaching sl</h4>
        </div>
        <div class="overlay"></div>
    </section>


<!-- CONFIRMACION -->
    <div id="contenedor">
        <div class="central">
            <div class="titulo">
                <?php
                    $DNI_Especialista = $_REQUEST["DNI_Especialista"];
                    $Nombre_Especialista = $_REQUEST["Nombre_Especialista"];
                    $Apellido_Especialista = $_REQUEST["Apellido_Especialista"];

                    echo "Se ha modificado correctamente el especialista $Nombre_Especialista $Apellido_Especialista con DNI $DNI_Especialista"
                ?>
            </div>
                    
            <div class="pie-form">
                <a href="ListadoEspecialistas.php">Continuar</a>
            </div>   
        </div>
    </div>       

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
    
</body>
</html>
