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

        <!-- Link hacia el archivo de estilos css -->
       

    </head>
    
    <body >

<!--CONEXIÓN-->
<?php
session_start();
include("./GestionBD/1-conexion.php");?>

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
        <?php

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_POST['Ingresar'])) {
    // Escapar variables
    $DNI_Cliente = mysqli_real_escape_string($conn, $_POST['DNI_Cliente'] ?? '');
    $NumTelefono_Cliente = mysqli_real_escape_string($conn, $_POST['NumTelefono_Cliente'] ?? '');
    $Correo_Cliente = mysqli_real_escape_string($conn, $_POST['Correo_Cliente'] ?? '');
    $Nombre_Cliente = mysqli_real_escape_string($conn, $_POST['Nombre_Cliente'] ?? '');
    $Apellido_Cliente = mysqli_real_escape_string($conn, $_POST['Apellido_Cliente'] ?? '');
    $Contrasena_Cliente = mysqli_real_escape_string($conn, $_POST['Contrasena_Cliente'] ?? '');
    $FechaNacimiento_Cliente = mysqli_real_escape_string($conn, $_POST['FechaNacimiento_Cliente'] ?? '');
    $NombreVia_Cliente = mysqli_real_escape_string($conn, $_POST['NombreVia_Cliente'] ?? '');
    $NumeroVia_Cliente = mysqli_real_escape_string($conn, $_POST['NumeroVia_Cliente'] ?? '');
    $TipoVia_Cliente = mysqli_real_escape_string($conn, $_POST['TipoVia_Cliente'] ?? '');

    // Construir consulta
    $de = "INSERT INTO CLIENTES (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, Contrasena_Cliente, FechaNacimiento_Cliente, NombreVia_Cliente, NumeroVia_Cliente, TipoVia_Cliente)
            VALUES ('$DNI_Cliente','$NumTelefono_Cliente', '$Correo_Cliente', '$Nombre_Cliente', '$Apellido_Cliente', '$Contrasena_Cliente', '$FechaNacimiento_Cliente', '$NombreVia_Cliente','$NumeroVia_Cliente','$TipoVia_Cliente')";

    // Ejecutar consulta
    if (mysqli_query($conn, $de)) {
        header("Location: pago.php?Nombre_Cliente=$Nombre_Cliente");
        exit;
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

else{ 
?>

    <h2></h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form id="AltaUsuario" action="" method="post">
                <h1>Registrate</h1>
                <span>or use your email for registration</span>
                <label for="DNI_Cliente"></label>
                <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" autofocus required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI">
                
                <label for="NumTelefono_Cliente"></label>
                <input type="tel" name="NumTelefono_Cliente"  id="NumTelefono_Cliente" class="caja" required placeholder="Telefono">
                
                <label for="Correo_Cliente"></label>
                <input type="email" name="Correo_Cliente" id="Correo_Cliente" class="caja" required placeholder="email">
                
                <label for="Nombre_Cliente"></label>
                <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Nombre">
                
                <label for="Apellido_Cliente"></label>
                <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">
                
                <label for="Contrasena_Cliente"></label>
                <input type="password" name="Contrasena_Cliente" id="Contrasena_Cliente" class="caja"required placeholder="Contrasena">
                
                <label for="FechaNacimiento_Cliente"></label>
                <input type="date" name="FechaNacimiento_Cliente" id="FechaNacimiento_Cliente" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">
                
                <label for="NombreVia_Cliente"></label>
                <input type="text" class="caja" name="NombreVia_Cliente" id="NombreVia_Cliente" placeholder="Escribe el nombre de la via">
                
                <label for="NumeroVia_Cliente"></label>
                <input type="text" class="caja" name="NumeroVia_Cliente" id="NumeroVia_Cliente" placeholder="Escribe el número de la via">
                
                <label for="TipoVia_Cliente"></label>
                <input type="text" class="caja" name="TipoVia_Cliente" id="TipoVia_Cliente" placeholder="Escribe el tipo de la via">
                <button type="submit" title="AltaUsuario" name="Ingresar">Registrarse</button>
            </form>
        </div>
    <?php
    }
    ?>
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
            $_SESSION['Nom_cliente']=$row['Nombre_Cliente'];
            
            if ($Contra_Cliente == $row['Contrasena_Cliente']){
                header("ComoTrabajamos.php"); //Una vez correcto el cliente y la contraseña nos manda a la pantalla de como trabajamos.
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
       
        
        <?php
        }
        ?>
        
    </div>
</body>
</html>
