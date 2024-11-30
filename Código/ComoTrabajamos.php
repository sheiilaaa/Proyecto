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

        <section class="apartados" id="apartados">
            <h1>Sobre nosotras</h1>
            <p class="centrado">Somos una empresa </p>
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

<!-- MAPA-->

        <section class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d3733.3836847970842!2d-103.39386822512469!3d20.653963595389975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e0!4m0!4m3!3m2!1d20.6544405!2d-103.391583!5e0!3m2!1ses!2smx!4v1460436070427" width="1600" height="552" frameborder="0" style="border:0" allowfullscreen></iframe>
        </section>

        <hr> <!-- SEPARADOR-->


<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    </body>
</html>