<!DOCTYPE html>
<html lang="es">
</h1>  
    <head>
        
        <meta charset="utf-8">
        
        <title> Login </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">

        <!-- Link hacia el archivo de estilos css -->
        <script src="./Inicio.js"></script>

    </head>
    
    <body >


<!--CABECERA-->
<?php
session_start();

include("./GestionBD/conexion.php");?>

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
       $Nom_cliente=$_REQUEST['Nombre_Cliente'];
       $Contra_Cliente=$_REQUEST['Contrasena_Cliente'];
       
       $sql= "SELECT * FROM CLIENTES WHERE Nombre_Cliente ='$Nom_cliente';";

       $resultado = mysqli_query($conn, $sql);
       
       if(mysqli_num_rows($resultado)>0)
       {
           $row= mysqli_fetch_assoc($resultado);    
           
           if ($Contra_Cliente == $row['Contrasena_Cliente']){
               header("ComoTrabajamos.php"); //Una vez correcto el cliente y la contraseña nos manda a la pantalla de como trabajamos.
               $_SESSION['Nom_cliente']=$row['Nombre_Cliente'];
               
           }else{
               echo "Contraseña erronea";
           }
       } 
        
      else{
       echo "El cliente no existe"; 
       }

   }
   else{

   ?>
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        <h1>Iniciar Sesión</h1>
                    </div>
                    <form id="login" action="" method="post">
                        <input type="text" name="Nombre_Cliente" placeholder="Nombre_Cliente" required>
                        <input type="password" placeholder="Contrasena_Cliente" name="Contrasena_Cliente" required>
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="recuperar.php">Recuperar contraseña</a>  
                        <a href="Inicio.php">Pulsa aquí para Registrate</a>
                    
   
                        </div>
                </div>
            </div>
        </div> 
    <?php
    }
    ?> 
    

<!-- REGISTRO CLIENTES -->
<?php
    
   
  if ($conn) {
    if(isset($_REQUEST['Registro'])){
        $DNI_Cliente=$_REQUEST['DNI_Cliente'];
        $NumTelefono_Cliente=$_REQUEST['NumTelefono_Cliente'];
        $Correo_Cliente=$_REQUEST['Correo_Cliente'];
        $Nombre_Cliente=$_REQUEST['Nombre_Cliente'];
        $Apellido_Cliente=$_REQUEST['Apellido_Cliente'];
        $Contrasena_Cliente=$_REQUEST['Contrasena_Cliente']; 
        $FechaNacimiento_Cliente=$_REQUEST['FechaNacimiento_Cliente'];
        $NombreVia_Cliente=$_REQUEST['NombreVia_Cliente'];
        $NumeroVia_Cliente=$_REQUEST['NumeroVia_Cliente'];
        $TipoVia_Cliente=$_REQUEST['TipoVia_Cliente'];
    
  
        $de = "INSERT INTO clientes(DNI_Cliente,Nombre_Cliente,Apellido_Cliente,FechaNacimiento_Cliente,NumTelefono_Cliente,Correo_Cliente,TipoVia_Cliente,NombreVia_Cliente,NumeroVia_Cliente,Contrasena_Cliente)
       VALUES ('$DNI_Cliente', '$Nombre_Cliente', '$Apellido_Cliente', '$FechaNacimiento_Cliente', '$NumTelefono_Cliente', '$Correo_Cliente', '$TipoVia_Cliente', '$NombreVia_Cliente', '$NumeroVia_Cliente', '$Contrasena_Cliente')";

        if (mysqli_query($conn,$de)){   
                header("location:Inicio.php");
            }
            else {
                echo "ERROR:".mysqli_error($conn);
                echo "ERROR:".mysqli_error($de); 
            }
        }
    else{ 
?>
    <div id="contenedor">
        <div id="central">
            <div id="login">
                <div class="titulo"> Bienvenido </div>
                    <span> Create una cuenta para acceder a nuestra pagina </span>
                <form id="AltaUsuario" action="" method="post">

                    <label for="DNI_Cliente">DNI:</label>
                    <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" autofocus required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">

                    <label for="NumTelefono_Cliente">Teléfono: </label>
                    <input type="tel" name="NumTelefono_Cliente"  id="NumTelefono_Cliente" class="caja" required placeholder="Telefono">

                    <label for="Correo_Cliente">e-Mail:</label>
                    <input type="email" name="Correo_Cliente" id="Correo_Cliente" class="caja" required placeholder="email">

                    <label for="Nombre_Cliente">Nombre:</label>
                    <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Nombre">

                    <label for="Apellido_Cliente">Apellidos:</label>
                    <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">

                    <label for="Contrasena_Cliente">Contraseña:</label>
                    <input type="password" name="Contrasena_Cliente" id="Contrasena_Cliente" class="caja"required placeholder="Contrasena">

                    <label for="FechaNacimiento_Cliente">Fecha de Nacimiento:</label>
                    <input type="date" name="FechaNacimiento_Cliente" id="FechaNacimiento_Cliente" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">

                    <label for="NombreVia_Cliente">Nombre de la via:</label>
                    <input type="text" class="caja" name="NombreVia_Cliente" id="NombreVia_Cliente" placeholder="Escribe el nombre de la via">

                    <label for="NumeroVia_Cliente">Nombre de la via:</label>
                    <input type="text" class="caja" name="NumeroVia_Cliente" id="NumeroVia_Cliente" placeholder="Escribe el número de la via">

                    <label for="TipoVia_Cliente">Nombre de la via:</label>
                    <input type="text" class="caja" name="TipoVia_Cliente" id="TipoVia_Cliente" placeholder="Escribe el tipo de la via">

                    <button type="submit" title="AltaUsuario" name="Ingresar">Registrarse</button>
                </form>
                <!--<div class="pie-form">
                    <a href="catalogo.php">Volver</a>
                </div> -->
            </div>
        </div>    
    </div>
    <?php
}
}
   
?>
   

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>
