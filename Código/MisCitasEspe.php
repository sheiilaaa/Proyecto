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
                <li><a href="Inicio.php"><i class="fa fa-home"></i> <span data-translate="inicio">Inicio</span></a></li>
                <li><a href="ComoTrabajamos.php"><i class="fa fa-briefcase"></i> <span data-translate="como_trabajar">¿Quiénes somos?</span></a></li>
                <li><a href="Contacto.php"><i class="fa fa-phone-square"></i> <span data-translate="contacto">Puesta en contacto</span></a></li>
                <li><a href="ListadoEspecialistas.php"><i class="fa fa-address-book"></i> <span data-translate="especialistas">Especialistas</span></a></li>
                <li><a href="Calendario.html"><i class="fa fa-calendar"></i> <span data-translate="calendario">Calendario</span></a></li>
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
        $sql_todo="SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista, C.Fecha_Cita,
            C.Hora_Cita,C.Coste_Cita, Cl.Nombre_Cliente, Cl.Apellido_Cliente, Cl.DNI_Cliente, E.ID_Especialista
            FROM ESPECIALIDAD ES
            JOIN ESPECIALISTA_ESPECIALIDAD EE ON EE.ID_Especialidad_EspeEspe = ES.ID_Especialidad
            JOIN ESPECIALISTAS E ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
            JOIN CITAS C ON C.ID_Especialista_Cita = E.ID_Especialista
            JOIN CLIENTES Cl ON C.ID_Cliente_Cita = Cl.ID_Cliente WHERE DNI_Especialista = '" . $_SESSION['DNI_Especialista'] . "';";
   
        $result = mysqli_query($conn, $sql_todo);

        if (mysqli_num_rows($result) > 0) { // Si encuentra resultados
            $Final = 0;
            $row = mysqli_fetch_assoc($result);
    
            while ($row) { 
                $Esp_Anterior = $row['Nombre_Especialista'];
                echo '<div class="INFO">';
                    //Info especialista
                    echo '<h5>Especialista: '.$row['Nombre_Especialista'].' '.$row['Apellido_Especialista'].'</h5>';
                    echo '<p>Cuota: '.$row['Cuota_Especialista'].'€</p>';
                    echo '<ul>';
                        // Agrupar especialidades por especialista
                        $i = 1;
                        while ($row && $Esp_Anterior == $row['Nombre_Especialista']) {
                            echo '<li>Especialidad '.$i.': '.$row['Especialidad_Especialista'].'</li>';
                            $Final++;
                            $i++;
                            $row = mysqli_fetch_assoc($result); // Avanzar a la siguiente fila
                        }
                    echo '</ul>';
                    //Info usuario
                    echo '<h5>Cliente: '.$row['Nombre_Cliente'].' '.$row['Apellido_Cliente'].'</h5>';
                    echo '<h5>DNI: '.$row['DNI_Cliente'].'</h5>';
                    //Info cita
                    echo '<h5> Cita reservada para el dia: '.$row['Fecha_Cita'].' a las '.$row['Hora_Cita'].'</h5>';
                    echo '<p>Cuota: '.$row['Coste_Cita'].'€</p>';
                echo '</div>';
            }
            echo '<a href="FuncionesESPE.php"><input type="button" id="volver" name="volver" class="boton" value="">Volver</a>';

        } else {
            echo '<p>No tienes ninguna cita asignada.</p>';
        }
        ?>

<hr> <!-- SEPARADOR-->

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>

    </body>
</html>