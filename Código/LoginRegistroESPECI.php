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
        
    </head>
    
    <body >

<!-- CONEXION -->
<?php
    session_start();
    include("./GestionBD/1-conexion.php");
?>

<!--CABECERA-->
    <section class="photo" id="inicio">
        <div class="nav" id="sticker">
            <label for="toggle">&#9776</label>
            <input type="checkbox" id="toggle" />
            <div class="menu">
                <img src="IMG/logo.png" alt="" class="logo">
                <a href=""><i class="fa fa-home"> Inicio</i></a>
                <a href=""><i class="fa fa-info"> Como trabajar</i></a>
                <a href=""><i class="fa fa-briefcase"> Puesta en contacto</i></a>
                <a href=""><i class="fa fa-address-book"> Listado especialistas</i></a>
                <a href=""><i class="fa fa-calendar-o">Calendario</i></a>
            </div>
        </div>
        <div class="photo-text">
            <h4 data-ix="skype">Coaching sl</h4>
        </div>
        <div class="overlay"></div>
    </section>


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
                header("Location:Calendario.php"); //Una vez correcto el usuario y la contraseña nos manda al Calendario.
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
    
<!-- REGISTRO USUARIO -->
<?php 

    if(isset($_REQUEST['Ingresar2'])){
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
        '$NombreVia_Especialista','$NumeroVia_Especialista','$CuentaBancaria_Especialista','$Cuota_Especialista','$Contrasena_Especialista';";
   													
    $info= "$Nombre_Especialista,$Apellido_Especialista,$Cuota_Especialista";
    $id= "SELECT `ID_Especialista` FROM `especialistas` WHERE Nombre_Especialista='$Nombre_Especialista';";
    
    if (mysqli_query($conn,$sql))
    {
        header("Location:Calendario.php?info=$info");
    }
   
    else 
    {
        echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
    }

    if (mysqli_query($conn,$id)) 
    {
        header("Location:Calendario.php?info=$info");
    }
    else 
    {
        echo "Error:  "   . $id . "<br>" . mysqli_error($conn);
    }
  
}   
else{
    ?>
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Bienvenido Especialista
                    </div>
                    <form id="AltaEspecialista" action="ConfAltaEspe.php" method="post">

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
                        <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" pattern="[0-9]{9}" placeholder="Escribe el nombre de la via">

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


<!-- HABLAR CON RAFA como poner disponibilidad-->
                        <label for="Contrasena_Especialista">Contraseña:</label>
                        <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Contrasena">

                        
                        
                        <button type="submit" title="AltaEspecialista" name="AltaEspecialista">Alta Especialista</button>
                    </form>
                    <div class="pie-form">
                        <a href="Inicio.php">Volver</a>
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

</body>
</html>