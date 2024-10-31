<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
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
=======
    <title>ComoTrabajamos</title>
    <link rel="stylesheet" href="css/estilo.css">
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
>>>>>>> 4887e5de1922603efd856299063bc1bc4fa30e0a
</head>

    -->



<body>
<<<<<<< HEAD
    <main class="centrar_contenido">
        <section class="calendario">
            <?php
                $diasEnElMes = 31;
                $primerDiaDeLaSemana = 0; 
=======
>>>>>>> 4887e5de1922603efd856299063bc1bc4fa30e0a

<<<<<<< HEAD

                for ($i = 0; $i < $primerDiaDeLaSemana; $i++) {
                    echo "<div class='dias_calendario'></div>";
=======
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

    <main class="centrar_contenido">
        <section class="calendario">
            <?php
                $diasEnElMes = 31;
                $primerDiaDeLaSemana = 0; 


                for ($i = 0; $i < $primerDiaDeLaSemana; $i++) {
                    echo "<div class='dias_calendario'></div>";
>>>>>>> 4887e5de1922603efd856299063bc1bc4fa30e0a
                }

                for ($contador = 1; $contador <= $diasEnElMes; $contador++) {
                    echo "<div class='dias_calendario'>$contador</div>";
                }

<<<<<<< HEAD
                $totalDias = $primerDiaDeLaSemana + $diasEnElMes;
                for ($i = $totalDias; $i < 35; $i++) {
                    echo "<div class='dias_calendario'></div>";
                }
            ?>
        </section>
    </main>
=======
                $totalDias = $primerDiaDeLaSemana + $diasEnElMes;
                for ($i = $totalDias; $i < 35; $i++) {
                    echo "<div class='dias_calendario'></div>";
                }
            ?>
        </section>
    </main>

    <!-- PIE DE PAGINA -->
    <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
    </footer>
    
>>>>>>> 4887e5de1922603efd856299063bc1bc4fa30e0a
</body>
</html>
