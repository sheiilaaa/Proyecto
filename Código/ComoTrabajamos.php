
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

        <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />        
        
<!-- ESTILO del mapa-->
        <style>
            #mapa {
                width: 100%;
                height: 400px;
            }
        </style>

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
                <?php
                if ($_SESSION['Tipo'] == "admin") { // Si es Admin, mostrar opciones adicionales
                    echo "<li><a href='FuncionesAdmin.php'><i class='fa fa-address-book'></i><span data-translate='ADMIN'>Admin</span></a></li>";
                    echo '<br>';
                }
                if ($_SESSION['Tipo'] == "espe") { // Si es Especialista, mostrar opciones adicionales
                    echo "<li><a href='FuncionesEspe.php'><i class='fa fa-address-book'></i><span data-translate='espe'>espe</span></a></li>";
                    echo '<br>';
                }
                ?>
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


<!-- SOBRE EL TRABAJO-->

        <section class="apartados" id="apartados">
            <h1>Sobre nosotras</h1>
            <p class="centrado">Somos una empresa psofjòwiegjoap </p>
        </section>

        <section class="apartados" id="apartados">
            <div class="centrar_info">
                <h3 class="titulo_apartados"> Acerca de </h3>
                <div class="info_ubi">
                    <h4>¿Cómo trabajamos?</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                    <h4>Prácticas</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                </div>
                <div class="horarios">
                    <h4>¿Quiénes somos?</h4>
                    <p class="centrar_izquierda">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzar
                        tus metas más soñadas.
                    </p>

                    <h4>¿Cómo trabajamos?</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>
                </div>
            </div>
        </section>

    <hr> <!-- SEPARADOR-->

<!-- ESTILOS DE COACHING-->
        <section class="apartados" id="apartados">
            <div class="centrar_info">
                <h3 class="titulo_apartados"> Prácticas </h3>
                <div class="info_ubi">
                    <h4>Coaching Empresarial</h4>
                    <p class="centrar_derecha">Este estilo .
                    </p>

                    <h4>Coaching con Inteligencia Emocional</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                    <h4>Coaching Ontológico</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>


                    <h4>Coaching PNL</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                </div>
                <div class="horarios">
                    <h4>Coaching Personal</h4>
                    <p class="centrar_izquierda">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzar
                        tus metas más soñadas.
                    </p>

                    <h4>Coaching Deportivo</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                    <h4>Coaching Cognitivo</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                    <h4>Coaching PNL</h4>
                    <p class="centrar_derecha">Sabemos que existe servicio de coaching, los cuales
                        puedes encontrar por internet. Nosotras ofrecemos velocidad,
                        calidad y te brinda apoyo durante el proceso de estancia con nosotros. 
                        Brindamos novedades, como la máxima eficacia, desde la primera puesta en
                        contacto con nosotras hasta la primera visita, aprenderás a crecer,
                        desarrollar aquellas habilidades que todavía no conozcas y llegar a alcanzartus metas más soñadas.
                    </p>

                </div>
            </div>
        </section>

        <hr> <!-- SEPARADOR-->


<!-- DIRECCIÓN -->
        <section class="apartados" id="apartados">
                <div class="centrar_info">
                    <h3 class="titulo_apartados">Ubicación</h3>
                    <div class="info_ubi">
                        <p class="calle"> Carrer de Llança, 51<br /> L'Eixample, 08015, Barcelona</p>
                        <p class="calle"> Calle de Alcalá, 472<br /> San Blas-Canillejas, 28027 Madrid</p>
                        <p class="RRSS">INSTAGRAM</p>
                        <p class="correo">contacto: coachingslsants@gmail.com </p>
                    </div>
                    <div class="horarios">
                        <h4>Horario</h4>
                        <p class="entre-semana"> Lunes a Viernes <br/> 8:00 - 21:00 </p>
                        <p class="fin-semana"> Sabados y Domingos <br/> Cerrado </p>
                    </div>
                </div>
            </section>

        <hr> <!-- SEPARADOR-->


<!-- MAPA -->
    <h3 class="titulo mapa">Centro Coaching S.L en Barcelona</h3>

    <div id="mapa"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Para crear el mapa que este centrado en la ubicación que especificamos
        var mapa = L.map('mapa').setView([41.38052522449038, 2.144449785579248], 13);

        // Añadimos capa de mapa con OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        // Añadimos el marcador en la ubicación que queremos, en nuestro caso, donde estará la empresa
        L.marker([41.38052522449038, 2.144449785579248]).addTo(mapa)
            .bindPopup('Coaching S.L, Barcelona')
            .openPopup();
    </script>

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>

    </body>
</html>