<!DOCTYPE html>
<html lang="es">  
    <head>
        
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
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


        <!-- En este código relacionamos el usuario con la contraseña para que verifique si existe el usuario y coincide con la contraseña, 
        también si se muestran resultados asociados en la base de datos y son corectos, se dejará abierta la sesion del usuario (que pondremos en todos los php)-->


<!-- REGISTRO USUARIO -->
        <?php 
            if(isset($_REQUEST['AltaEspecialista'])){
                $DNI_Especialista=$_REQUEST['DNI_Especialista'];
                $NumTelefono_Especialista=$_REQUEST['NumTelefono_Especialista'];
                $Correo_Especialista=$_REQUEST['Correo_Especialista'];
                $Nombre_Especialista=$_REQUEST['Nombre_Especialista'];
                $Apellido_Especialista=$_REQUEST['Apellido_Especialista'];
                $Contrasena_Especialista=$_REQUEST['Contrasena_Especialista']; 
                $FechaNacimiento_Especialista=$_REQUEST['FechaNacimiento_Especialista'];
                $NombreVia_Especialista=$_REQUEST['NombreVia_Especialista'];
                $NumeroVia_Especialista=$_REQUEST['NumeroVia_Especialista'];
                $TipoVia_Especialista=$_REQUEST['TipoVia_Especialista'];
                $CuentaBancaria_Especialista=$_REQUEST['CuentaBancaria_Especialista'];
                $Cuota_Especialista=$_REQUEST['Cuota_Especialista'];
                

                $sql= "INSERT INTO especialistas(DNI_Especialista, Nombre_Especialista, Apellido_Especialista, FechaNacimiento_Especialista, NumTelefono_Especialista, Correo_Especialista, 
                TipoVia_Especialista, NombreVia_Especialista, NumeroVia_Especialista, CuentaBancaria_Especialista, Cuota_Especialista, Contrasena_Especialista)
                VALUES ('$DNI_Especialista','$Nombre_Especialista', '$Apellido_Especialista','$FechaNacimiento_Especialista', '$NumTelefono_Especialista', '$Correo_Especialista', '$TipoVia_Especialista', 
                '$NombreVia_Especialista','$NumeroVia_Especialista','$CuentaBancaria_Especialista','$Cuota_Especialista','$Contrasena_Especialista');";
             
            /*
            $sql_Es = "SELECT ID_Especialista FROM especialistas WHERE DNI_Especialista='$DNI_Especialista'";

            $row=ID_Especialista;*/

            $info= "$Nombre_Especialista,$Apellido_Especialista,$Cuota_Especialista";
            $id= "SELECT 'ID_Especialista' FROM especialistas WHERE ID_Especialista='$ID_Especialista';";
            
            if (mysqli_query($conn,$sql))
            {
                if(isset($_REQUEST['AltaEspecialista'])){
                    $Lunes=isset($_REQUEST['Lunes']) ? 1 : 0;
                    $Martes=isset($_REQUEST['Martes']) ? 1 : 0;
                    $Miercoles=isset($_REQUEST['Miercoles']) ? 1 : 0;
                    $Jueves=isset($_REQUEST['Jueves']) ? 1 : 0;
                    $Viernes=isset($_REQUEST['Viernes']) ? 1 : 0;
                
                    $sql="INSERT INTO DISPONIBILIDAD_ESPECIALISTA (Lunes, Martes, Miercoles, Jueves, Viernes, Hora_Dispo) VALUES ";

                }
            
                if(isset($_REQUEST['8:00-9:00'])){
                    $sql.= "( $Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'8:00-9:00'),";
                }
                if(isset($_REQUEST['9:00-10:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'9:00-10:00'),";
                }
                if(isset($_REQUEST['10:00-11:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'10:00-11:00'),";
                }
                if(isset($_REQUEST['11:00-12:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'11:00-12:00'),";
                }
                if(isset($_REQUEST['15:00-16:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'15:00-16:00'),";
                }
                if(isset($_REQUEST['16:00-17:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'16:00-17:00'),";
                }
                if(isset($_REQUEST['17:00-18:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'17:00-18:00'),";
                }
                if(isset($_REQUEST['18:00-19:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'18:00-19:00'),";
                }
                if(isset($_REQUEST['19:00-20:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'19:00-20:00'),";
                }
                if(isset($_REQUEST['20:00-21:00'])){
                    $sql.="($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'20:00-21:00');";
                }
                  
                    
                if (mysqli_query($conn,$sql))
                {
                    header("Location:Calendario.php?info=$info");
                }
            
                else 
                {
                    echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
                }
        
            } 
        }   
        else{
            ?>
            <div id="contenedor">
                <div id="central">
                    <div id="login">
                        <div class="titulo">Bienvenido Especialista</div>
                        <form id="AltaEspecialista" action="ConfAltaEspe.php" method="POST">
                            <label for="DNI_Especialista">DNI:</label>
                            <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">
                            
                            <label for="Nombre_Especialista">Nombre:</label>
                            <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre">

                            <label for="Apellido_Especialista">Apellidos:</label>
                            <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">

                            <label for="FechaNacimiento_Especialista">Fecha de Nacimiento:</label>
                            <input type="date" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" pattern="\[0-9]{4}\-[0-9]{2}\-[0-9]{2}"
                                                                                                                        placeholder="Año-Mes-Dia" title="Fecha Nacimiento">
    <!-- DEBE SER AÑO MES DIA, CON - PARA SEPARAR -->

                            <label for="NumTelefono_Especialista">Teléfono: </label>
                            <input type="tel" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" pattern="[0-9]{9}" required placeholder="Telefono">

                            <label for="Correo_Especialista">e-Mail:</label>
                            <input type="email" name="Correo_Especialista" id="Correo_Especialista" class="caja" required placeholder="email">

                            <label for="TipoVia_Especialista">Tipo de via:</label>
                            <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" pattern="^(C/|Paseo|Av\.)$" placeholder="Escribe el nombre de la via">

                            <label for="NombreVia_Especialista">Nombre de la via:</label>
                            <input type="text" class="caja" name="NombreVia_Especialista" id="NombreVia_Especialista" pattern="[a-zA-Z\s]+" placeholder="Escribe el nombre de la via">

                            <label for="NumeroVia_Especialista">Número de la via:</label>
                            <input type="number" class="caja" name="NumeroVia_Especialista" id="NumeroVia_Especialista" pattern="[0-9]{9}" placeholder="Escribe el número de la via">

                            <label for="CuentaBancaria_Especialista">Cuenta bancaria:</label>
                            <input type="number" class="caja" name="CuentaBancaria_Especialista" id="CuentaBancaria_Especialista" pattern="\ES\[0-9]{22}" placeholder="Escribe su cuenta bancaría">

                            <label for="Cuota_Especialista">Cuota:</label>
                            <input type="number" class="caja" name="Cuota_Especialista" id="Cuota_Especialista" pattern="[0-9]{4}\.[0-9]{2}" placeholder="Formato XXXX.XX">
    <!-- DEBE DE SEPARARSE POR . -->
                            
                            <label for="Contrasena_Especialista">Contraseña:</label>
                            <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Escribe tu contraseña">

                            <fieldset>
                                <legend>Disponibilidad Diaria</legend>
                                    <label for="Lunes">Lunes</label>
                                <input type="checkbox" id="Lunes" name="Lunes"  value="1" checked>
                                
                                    <label for="Martes">Martes</label>
                                <input type="checkbox" id="Martes" name="Martes" value="1" checked>
                                    
                                    <label for="Miércoles">Miércoles</label>
                                <input type="checkbox" id="Miércoles" name="Miércoles" value="1" checked>
                                    
                                    <label for="Jueves">Jueves</label>
                                <input type="checkbox" id="Jueves" name="Jueves" value="1" checked>
                                    
                                    <label for="Viernes">Viernes</label>
                                <input type="checkbox" id="Viernes" name="Viernes" value="1" checked>
                                    
                            </fieldset>
                            
                            <fieldset>
                                <legend>Horario Laboral</legend>
                                        <label for="8:00-9:00">8:00-9:00</label>
                                    <input type="checkbox" id="8:00-9:00" name="8:00-9:00" value="1">
                                        
                                        <label for="9:00-10:00">9:00-10:00</label>        
                                    <input type="checkbox" id="9:00-10:00" name="9:00-10:00" value="1">
                                    
                                        <label for="10:00-11:00">10:00-11:00</label>
                                    <input type="checkbox" id="10:00-11:00" name="10:00-11:00" value="1">
                                    
                                        <label for="11:00-12:00">11:00-12:00</label>
                                    <input type="checkbox" id="11:00-12:00" name="11:00-12:00" value="1">
                                    
                                        <label for="15:00-16:00">15:00-16:00</label>    
                                    <input type="checkbox" id="15:00-16:00" name="15:00-16:00" value="1">
                                    
                                        <label for="16:00-17:00">16:00-17:00</label>
                                    <input type="checkbox" id="16:00-17:00" name="16:00-17:00" value="1">
                                    
                                        <label for="17:00-18:00">17:00-18:00</label>
                                    <input type="checkbox" id="17:00-18:00" name="17:00-18:00" value="1">
                                    
                                        <label for="18:00-19:00">18:00-19:00</label>
                                    <input type="checkbox" id="18:00-19:00" name="18:00-19:00" value="1">
                                    
                                        <label for="19:00-20:00">19:00-20:00</label>
                                    <input type="checkbox" id="19:00-20:00" name="19:00-20:00" value="1">
                                    
                                        <label for="20:00-21:00">20:00-21:00</label>    
                                    <input type="checkbox" id="20:00-21:00" name="20:00-21:00" value="1">
                                        
                            </fieldset>
                            
                            <fieldset>
                                <legend>Especialidad</legend>
                                    <label for="Coaching Empresarial">Coaching Empresarial</label>
                                <input type="checkbox" id="Coaching Empresarial" name="Coaching Empresarial" value="1">
                                    
                                    <label for="Coaching Personal">Coaching Personal</label>        
                                <input type="checkbox" id="Coaching Personal" name="Coaching Personal" value="1">
                                
                                    <label for="Coaching con Inteligencia Emocional">Coaching con Inteligencia Emocional</label>
                                <input type="checkbox" id="Coaching con Inteligencia Emocional" name="Coaching con Inteligencia Emocional" value="1">
                                
                                    <label for="Coaching Deportivo">Coaching Deportivo</label>
                                <input type="checkbox" id="Coaching Deportivo" name="Coaching Deportivo" value="1">
                                
                                    <label for="Coaching Ontológico'">Coaching Ontológico</label>    
                                <input type="checkbox" id="Coaching Ontológico'" name="Coaching Ontológico'" value="1">
                                
                                    <label for="Coaching Cognitivo">Coaching Cognitivo</label>
                                <input type="checkbox" id="Coaching Cognitivo" name="Coaching Cognitivo" value="1">
                                
                                    <label for="Coaching PNL (Programación Neurolingüística)">Coaching PNL (Programación Neurolingüística)</label>
                                <input type="checkbox" id="Coaching PNL (Programación Neurolingüística)" name="Coaching PNL (Programación Neurolingüística)" value="1">
                                
                                    <label for="Coaching Coercitivo">Coaching Coercitivo</label>
                                <input type="checkbox" id="Coaching Coercitivo" name="Coaching Coercitivo" value="1">        
                            </fieldset>




                            <button type="submit" title="AltaEspecialista" name="AltaEspecialista">Alta Especialista</button>
                              
                        </form>
                        <div class="pie-form">
                            <a href="Inicio.php">Volver</a>
                        </div>
                    
   
<?php
        }
    ?>
    </div> <!-- LOGIN -->
    </div> <!-- CENTRAL -->
    </div> <!-- CONTENEDOR-->

<!-- PIE DE PAGINA -->
    <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
    </footer>

    <!-- Link a JavaScript 
    <script src="JS/traducciones.js"></script>-->

    
</body>
</html>