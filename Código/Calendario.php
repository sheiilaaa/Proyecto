<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <main class="centrar_contenido">
        <section class="calendario">
            <?php
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
            ?>
        </section>
    </main>

    <!-- PIE DE PAGINA -->
    <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
    </footer>
    
</body>
</html>
