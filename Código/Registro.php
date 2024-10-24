<!DOCTYPE html>
<html lang="es">
     
    <head>
        
        <meta charset="utf-8">
        
        <title> Registro </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">
        
    </head>
    <body >

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
    <?php
    session_start();

    include("./GestionBD/conexion.php");
    if(isset($_REQUEST['Ingresar'])){
        $usuario=$_REQUEST['usuario'];
        $contraseña=$_REQUEST['password'];
        
        $sql= "SELECT * FROM usuarios WHERE Nombre ='$usuario';";

        $resultado = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($resultado)>0)
        {
            $row= mysqli_fetch_assoc($resultado);    
            $_SESSION['Usuario']=$row['Nombre'];
            
            if ($contraseña == $row['Contraseña']){
                header("Location:catalogo.php"); //Una vez correcto el usuario y la contraseña nos manda al catalago.
            }else{
                echo "Contraseña erronea";
            }
        } 
         
       else{
        echo "El usuario no existe"; 
        }

    }
    else{

            ?>

        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Acceso a la tienda
                    </div>
                    <form id="login" action="" method="post">
                        <input type="text" name="usuario" placeholder="Usuario" required>
                        <input type="password" placeholder="Contraseña" name="password" required>
                        <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                    </form>
                    <div class="pie-form">
                        <a href="recuperar.php">Recuperar contraseña</a>
                        <a href="AltaUsuario.php">Pulsa aquí para Registrate</a>
                    
   
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
