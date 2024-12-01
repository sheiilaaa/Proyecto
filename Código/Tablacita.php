ver cita, pasa href con el parametro que quieres mostrar hacia pago 
if pago va ser igual solo s viene de esat pantalla
Nunca va a ver el boton pagar en ReservarCita si vienes de Tabla cita

podemos hacer dos enlaces 1.que pueda ver y el 2.que pueda ir a pagar


Hacer un SELECT * FROM CITAS WHERE ID_Cliente=$_SESSION[ID_Cliente]

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

<!-- SOBRE EL TRABAJO-->



<?php

/*INFO ESPECIALISTA*/
            $ID_Especialista=$_REQUEST['ID_Especialista'];
            $Nombre_Especialista=$_REQUEST['Nombre_Especialista'];
            $Apellido_Especialista=$_REQUEST['Apellido_Especialista'];
            $Cuota_Especialista=$_REQUEST['Cuota_Especialista'];
        /*INFO CLIENTE*/
            $ID_Cliente=$_REQUEST['ID_Cliente'];
            $Nombre_Cliente=$_REQUEST['Nombre_Cliente'];
            $Apellido_Cliente=$_REQUEST['Apellido_Cliente'];

        /*INFO FORMULARIO*/
            $Espe_escogida=$_REQUEST['Espe_escogida'];

        /*RECOPILAR INFORMACION*/
            $sql_espe="SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista
                FROM ESPECIALISTAS E
                JOIN ESPECIALISTA_ESPECIALIDAD EE ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
                JOIN ESPECIALIDAD ES ON ES.ID_Especialista = E.ID_Especialidad_EspeEspe";

            $sql_dispo="SELECT DE.Fecha_Disponibilidad, DE.Hora_Disponibilidad, DE.Disponibilidad_Especialista
                FROM DISPONIBILIDAD_ESPECIALISTA DE
                JOIN ESPECIALISTAS E ON E.ID_Especialista = DE.ID_Especialista_DispoEspe";

            $sql_usr= " SELECT * FROM CLIENTES WHERE ID_Cliente= '$ID_Cliente'; ";

    ?>


<hr> <!-- SEPARADOR-->

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    </body>
</html>