<?php
session_start();
include("./GestionBD/1-conexion.php");
?>

<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="utf-8">
    <title>Listado Especialista</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!--<script src="script_listado.js" defer></script>-->
</head>

<body class="fondo">
<!--CABECERA-->
<section class="photo" id="inicio">
    <div class="nav" id="sticker">
        <label for="toggle">&#9776</label>
        <input type="checkbox" id="toggle" />
        <div class="menu">
            <img src="IMG/logo.png" alt="" class="logo">
            <a href=""><i class="fa fa-home"> Inicio</i></a>
            <a href=""><i class="fa fa-info"> Cómo trabajar</i></a>
            <a href=""><i class="fa fa-briefcase"> Puesta en contacto</i></a>
            <a href=""><i class="fa fa-address-book"> Listado especialistas</i></a>
            <a href=""><i class="fa fa-calendar"> Calendario</i></a>
        </div>
    </div>
    <div class="photo-text">
        <h4 data-ix="skype">Coaching SL</h4>
    </div>
    <div class="overlay"></div>
</section>

<!-- Listado de especialistas -->
<div class="titulos">Listado de especialistas</div>
<div id="fondo_listado">
    <?php
    $sql = "SELECT E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista, E.Cuota_Especialista
            FROM ESPECIALISTAS E
            JOIN ESPECIALISTA_ESPECIALIDAD EE ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
            JOIN ESPECIALIDAD ES ON EE.ID_Especialidad_EspeEspe = ES.ID_Especialidad";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { // Si encuentra resultados
        $Final = 0;
        $row = mysqli_fetch_assoc($result);

        while ($row) { 
            $Esp_Anterior = $row['Nombre_Especialista'];
            echo '<div class="especialista-contenedor">';
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
            echo '<a href="PedirCita.php"><input type="button" id="cantidad4" name="Añadir4" class="boton" value="Pedir Cita"></a>';

            /*if ($_SESSION['usuario'] == "Admin") { // Si es Admin, mostrar opciones adicionales
                echo '<br><a href="ModificarEspecialista.php?id='.$Esp_Anterior.'">Modificar</a>';
                echo '<br><a href="EliminarEspecialista.php?id='.$Esp_Anterior.'">Eliminar</a>';
            }
            echo '</div>';
            echo '<br>';*/
        }
    } else {
        echo '<p>No se encontraron especialistas.</p>';
    }
    ?>
</div>

<!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
</body>
</html>