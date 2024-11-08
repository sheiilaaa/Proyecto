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

<!--CONEXIÓN-->
<?php
session_start();
include("./GestionBD/conexion.php");?>

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

        $sql= "INSERT INTO ESPECIALISTAS (DNI_Especialista, NumTelefono_Especialista, Correo_Especialista, Nombre_Especialista, Apellido_Especialista, Contrasena_Especialista, FechaNacimiento_Especialista,NombreVia_Especialista,NumeroVia_Especialista,TipoVia_Especialista,CuentaBancaria_Especialista,Cuota_Especialista)
        VALUES ('$DNI_Especialista','$NumTelefono_Especialista', '$Correo_Especialista', $Nombre_Especialista, '$Apellido_Especialista', '$Contrasena_Especialista', ' $FechaNacimiento_Especialista', '$NombreVia_Especialista','$NumeroVia_Especialista','$TipoVia_Especialista','$CuentaBancaria_Especialista','$Cuota_Especialista';";
   
        $info= "$Nombre_Especialista,$Apellido_Especialista,$Cuota_Especialista"
        $id="SELECT ID_Especialista FROM ESPECIALISTAS WHERE Nombre_Especialista=".$Nombre_Especialista.";";
        
    if (mysqli_query($conn,$sql))
    {
        header("Location:Calendario.php?info=$info ?");
    }
   
    else 
    {
        echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
    }
  

}   
else{
    ?>
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <form id="AltaUsuario" action="" method="post">

                        <label for="DNI_Especialista">DNI:</label>
                        <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">

                        <label for="NumTelefono_Especialista">Teléfono: </label>
                        <input type="tel" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" required placeholder="Telefono">

                        <label for="Correo_Especialista">e-Mail:</label>
                        <input type="email" name="Correo_Especialista" id="Correo_Especialista" class="caja" required placeholder="email">

                        <label for="Nombre_Especialista">Nombre:</label>
                        <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre">

                        <label for="Apellido_Especialista">Apellidos:</label>
                        <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">

                        <label for="Contrasena_Especialista">Contraseña:</label>
                        <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Contrasena">

                        <label for="FechaNacimiento_Especialista">Fecha de Nacimiento:</label>
                        <input type="date" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">

                        <label for="NombreVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="NombreVia_Especialista" id="NombreVia_Especialista" placeholder="Escribe el nombre de la via">

                        <label for="NumeroVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="NumeroVia_Especialista" id="NumeroVia_Especialista" placeholder="Escribe el número de la via">

                        <label for="TipoVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" placeholder="Escribe el nombre de la via">

                        <label for="CuentaBancaria_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="CuentaBancaria_Especialista" id="CuentaBancaria_Especialista" placeholder="Escribe su cuenta bancaría">

                        <label for="Cuota_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="Cuota_Especialista" id="Cuota_Especialista" placeholder="Indica la couta del especialista">

                        <button type="submit" title="AltaUsuario" name="Ingresar">Alta Usuario</button>
                    </form>
                    <div class="pie-form">
                        <a href="inicio.php">Volver</a>
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