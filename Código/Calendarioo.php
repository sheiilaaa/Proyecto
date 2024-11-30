<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ComoTrabajamos</title>
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">

        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    </head>


    <body>
<!--CONEXIÓN-->
        <?php
            session_start();
            include("./GestionBD/1-conexion.php");
        ?>

<!--CABECERA-->
<div id="header">
        <div class="logo">
            <img src="img/logo.png" alt="COACHING SL">
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


    <hr> <!-- SEPARADOR-->

<?php
    
    if(isset($_REQUEST['Ingresar'])){
        $ID_Cita=$_REQUEST['ID_Cita'];/*PREGUNTAR COMO SE HARÍA A RAFA*/
        $FechaHora_Cita=$_REQUEST['FechaHora_Cita'];
        $Duracion=$_REQUEST['Duracion'];
        $Coste_Cita=$_REQUEST['Coste_Cita'];
       

        $insertarCi= "INSERT INTO CITAS (FechaHora_Cita, Duracion, Coste_Cita)
        VALUES ('$FechaHora_Cita','$Duracion', '$Coste_Cita';";
        /**/
       $Mostrar="SELECT E.Nombre_Especialista, E.Apellido_Especialista, E.Cuota_Especialista, DE.Fecha_Disponibilidad, DE.Hora_Disponibilidad, DE.Disponiblidad_Especialista, e.Especialidad_Especialista
                    FROM DISPONIBILIDAD_ESPECIALISTA DE
                JOIN Especialistas E ON E.ID_Especialista = DE.ID_Especialista
                JOIN Especialistas_Especialidad ES ON E.ID_Especialista = ES.ID_Especialista_EspeEspe
                JOIN Especilidad e ON  = ES.ID_Epecialidad_EspeEspe = e.ID_Especialidad"
    
    
        }

?>

    
   <!-- <title>Calendar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
        }
        .centrar_contenido {
            display: flex;
            width: 70%;
        }
        .calendario {
            display: flex;
            flex-wrap: wrap; 
            justify-content: space-between; 
        }
        .dias_calendario {
            margin: 5px;
            border: solid 1px #ccc;
            border-radius: 5px;
            width: calc(14.2857% - 10px);
            text-align: center; 
            padding: 20px; 
        }
    </style>
</head>

<body>
--CONEXIÓN--
</*?php 
    session_start();
    include("./GestionBD/conexion.php");
    */
?>

--CABECERA--
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

    <main class="centrar_contenido">
        <section class="calendario">
            </*?php
                $diasEnElMes = 31;
                $primerDiaDeLaSemana = 0; 


                for ($i = 0; $i < $primerDiaDeLaSemana; $i++) {
                    echo "<div class='dias_calendario'></div>";
                }

                for ($contador = 1; $contador <= $diasEnElMes; $contador++) {
                    echo "<div class='dias_calendario'>$contador</div>";
                }

                $totalDias = $primerDiaDeLaSemana + $diasEnElMes;
                for ($i = $totalDias; $i < 35; $i++) {
                    echo "<div class='dias_calendario'></div>";
                }
            ?*/>
        </section>
    </main>


    -->



<!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
    
</body>
</html>
