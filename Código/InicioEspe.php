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

<!-- INICIO SESIÓN -->
        <?php

        if(isset($_REQUEST['Ingresar'])){
            $Nombre_Es=$_REQUEST['Nombre_Especialista'];
            $Contrasena_Es=$_REQUEST['Contrasena_Especialista'];
            
            $sql= "SELECT * FROM ESPECIALISTAS WHERE Nombre_Especialista ='$Nombre_Es';";

            $resultado = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($resultado)>0)
            {
                $row= mysqli_fetch_assoc($resultado);    
                $_SESSION['Nombre_Especialista']=$row['Nombre_Especialista'];
                
                if ($Contrasena_Es == $row['Contrasena_Especialista']){
                    header("Location:FuncionesESPE.php"); //Una vez correcto el usuario y la contraseña, irá a 
                }else{
                    echo "Contraseña erronea";
                }
            } 
            
        else{
            echo "El especialista no existe"; 
            }

        }
        else{
            ?>
            <div id="contenedor">
                <div id="central">
                    <div id="login">
                        <div class="titulo">
                            Acceso a la WEB
                        </div>
                        <form id="login" action="" method="post">
                            <input type="text" name="Nombre_Especialista" placeholder="Nombre_Especialista" required>
                            <input type="password" placeholder="Contrasena_Especialista" name="Contrasena_Especialista" required>
                            <button type="submit" title="Ingresar2" name="Ingresar2">Login</button>
                        </form>
                        <div class="pie-form">
                            <a href="recuperar.php">Recuperar contraseña</a> <!-- CREAMOS UN PHP DE RECUPERAR CONTRASEÑA,NO?-->
                            <a href="LoginRegistroESPECI.php">Pulsa aquí para Registrate</a>
                        
    
                            </div>
                    </div>
                </div>
            </div> 
        <?php
        }
        ?> 

<!-- PIE DE PAGINA -->
        <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>

    <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>

    </body>
</html>



<?php
 
if(isset('AltaEspecialista')){
    $Lunes=isset($_REQUEST['Lunes']) ? 1 : 0;
    $Martes=isset($_REQUEST['Martes']) ? 1 : 0;
    $Miercoles=isset($_REQUEST['Miercoles']) ? 1 : 0;
    $Jueves=isset($_REQUEST['Jueves']) ? 1 : 0;
    $Viernes=isset($_REQUEST['Viernes']) ? 1 : 0;
  

    $sql="INSERT INTO DISPONIBILIDAD_ESPECIALISTA (Lunes, Martes, Miercoles, Jueves, Viernes, Hora_Dispo) VALUES ";
    }

    if(isset($_REQUEST['8:00-9:00'])){
        $sql.= "($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,'8:00-9:00'),";
    }
    if(isset($_REQUEST['9:00-10:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"9:00-10:00"),
    }
    if(isset($_REQUEST['10:00-11:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"10:00-11:00")
    }
    if(isset($_REQUEST['11:00-12:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"11:00-12:00")
    }
    if(isset($_REQUEST['15:00-16:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"15:00-16:00")
    }
    if(isset($_REQUEST['16:00-17:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"16:00-17:00")
    }
    if(isset($_REQUEST['17:00-18:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"17:00-18:00")
    }
    if(isset($_REQUEST['18:00-19:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"18:00-19:00")
    }
    if(isset($_REQUEST['19:00-20:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"19:00-20:00")
    }
    if(isset($_REQUEST['20:00-21:00'])){
        $sql.=($Lunes,$Martes,$Miercoles,$Jueves,$Viernes,"20:00-21:00")
    }
    $result= mysqli_execute($conn, $sql)



?>