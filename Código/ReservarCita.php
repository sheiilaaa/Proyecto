<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reservar cita</title>

        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link favicon -->
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">


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


        <?php

        if(isset($_REQUEST['reservarcita'])){
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
            $Espe_escogeida=$_REQUEST['Espe_escogeida'];

        /*RECOPILAR INFORMACION*/
            $sql_espe="SELECT E.Cuota_Especialista, E.Nombre_Especialista, E.Apellido_Especialista, ES.Especialidad_Especialista
                FROM ESPECIALISTAS E
                JOIN ESPECIALISTA_ESPECIALIDAD EE ON E.ID_Especialista = EE.ID_Especialista_EspeEspe
                JOIN ESPECIALIDAD ES ON ES.ID_Especialista = E.ID_Especialidad_EspeEspe";

            $sql_dispo="SELECT DE.Fecha_Disponibilidad, DE.Hora_Disponibilidad, DE.Disponibilidad_Especialista
                FROM DISPONIBILIDAD_ESPECIALISTA DE
                JOIN ESPECIALISTAS E ON E.ID_Especialista = DE.ID_Especialista_DispoEspe";

            $sql_usr= " SELECT * FROM CLIENTES WHERE ID_Cliente= '$ID_Cliente'; ";

            if (mysqli_query($conn,$Eliminar))
                {
                    header("Location:Pago.php");
                }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        if (isset($_REQUEST['ID_Especialista'])){
            
            $ID_Especialista=$_REQUEST['ID_Especialista'];

            $sql="SELECT * FROM especialistas WHERE ID_Especialista= $ID_Especialista;";

/* HACER CONTROL AQUI DE SI EXISTE O NO LA ESPECIALIDAD*/

            $resultado=mysql_query($conn,$sql);
            
            if(mysqli_num_rows($resultado)>0)
            {     
            ?>
<!--FORMULARIO HTML-->
            <form action="Pago.php" method="get">
                <fieldset> <!-- INFO ESPECIALISTA--->
                    <legend>Especialista escogido</legend>
                    <div class="registro"></div>
                    <div class="opciones">
                        <label for="Nombre_Especialista">Nombre:</label>
                            <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" value='<?php echo $row['Nombre_Especialista'] ?>'>
                        <label for="Apellido_Especialista">Apellido:</label>
                            <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" value='<?php echo $row['Apellido_Especialista'] ?>'>
                        <label for="Cuota_Especialista">Cuota del especialista: </label>
                            <input type="number" name="Cuota_Especialista"  id="Cuota_Especialista" class="caja" value='<?php echo $row['Cuota_Especialista'] ?>'>
                        </div>
                    </div>
                </fieldset>

                <fieldset> <!-- INFO CLIENTE--->
                    <legend>Información personal</legend>
                    <div class="registro">                    
                        </div>
                        <div class="opciones">
                            <label for="Nombre_Cliente">Nombre:</label>
                                <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" value='<?php echo $row['Nombre_Cliente'] ?>'>
                            <label for="Apellido_Especialista">Apellido:</label>
                                <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" value='<?php echo $row['Apellido_Cliente'] ?>'>
                        </div>
                    </div>
                </fieldset>

                <br>
                <fieldset> <!-- CAJA GRANDE-->
                    <legend>¿Qué horario deseas hacer?</legend><!-- NOMBRE CAJA GRANDE-->
                        <div required> <!-- Como hacer que sea obligatorio-->
                            <input type="radio" name="user" value="Manana">
                                <label for="user">Manana</label>
                            <input type="radio" name="user" value="Mediodia">
                                <label for="user">Mediodia</label>
                            <input type="radio" name="user" value="Tarde">
                                <label for="user">Tarde</label>
                        </div>

                </fieldset>
                <br>
                <br>
                <fieldset>
                    <legend>¿Qué especialidad deseas escoger?</legend>
                    <select name="Especialidad" id="user" required>
                        <optgroup label="Tipos de coaching que ofrecemos">
                            <option value="Espe_escogeida">Coaching Empresarial</option>
                            <option value="Espe_escogeida">Coaching Personal</option>
                            <option value="Espe_escogeida">Coaching con Inteligencia Emocional</option>
                            <option value="Espe_escogeida">Coaching Deportivo</option>
                            <option value="Espe_escogeida">Coaching Ontológico</option>
                            <option value="Espe_escogeida">Coaching Cognitivo</option>
                            <option value="Espe_escogeida">Coaching PNL (Programación Neurolingüística)</option>
                            <option value="Espe_escogeida">Coaching Coercitivo</option>
                        </optgroup>
                    </select>
                </fieldset>
                <br>
                <input type="checkbox" name="user" required value="Acepto los terminos de la página">
                    <label for="user">Acepto los terminos de la página</label>
                <br>
                <button type="submit" title="reservarcita" name="reservarcita">Enviar</button>
            </form>
        <?php
            }else{
                echo "Especialista no encontrado: " . $sql . "<br>" .mysqli_error($conn);
            }
        }
        ?>

<!-- PIE DE PAGINA -->
        <footer>
            Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>

    </body>
</html>