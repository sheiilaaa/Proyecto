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


<!--CABECERA-->
    <header id="header">
    <nav class="menu">
        <div class="logo">
            <img src="https://lh3.googleusercontent.com/rjTz7V4R1KdGInsOq-NBepU5OczhU6-YY4NLizB9umMtwSt4hfBGWW1oINd0bU70_1mv1reeU4a-ocGGKkhttU3TU8rIG6cvw86qx_O7kKYAeisbEeDSLvkEFz7Uxa12mlazQFH1XEiI2_iSYBXqgToZx9XVBUBhdpPp_cuo9RJQFVB1oXCo8jTpzfX5dVm4HXouLdVx-F_UumirlThyqQzkWbk9E-fXFaQzjBunMJVG4UhNi1wsBSomcGrGoiQI1rmVguEYt0k0P7Rf7KrMzgYgER263MeJ4C60g3zint3R-So6oj-gyfzLEx0BYTKHSoXSGWZhIjGCM7jchw0oDU_0FE-vu0v6NuSwsliKKQo7gi2R7V4-4x0cSB85jXhAxY5WbZDA89Dvm_2jtoM7b-ythQFUk9gOcI0bu8LN3uvtP8zfup5u8J88-mJTgsIYcxjdDY6L_YejQcu2jRY6fM5au6WgTIgs2t5uhyyqfdo_WQUh8i9GrdjwIw0EdskCOVK2Zqt2U9G_gySi9xHkN7KaVS6G56ngvU_Oxi8w2gg5_GC2_RCdCS5OLrbl2pe0fs2pyJLigMhuTT3oG7T8MZUvBWLDpPuapvEQwytMw35T1G9J7uHEybRjY_kzfqulc49rU5sHIF_ousSwiEu4379LH1e2uQSRhN4YNNAD4Q=w286-h69-no">
            <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars" aria-hidden="true"></i></a> 
        </div>
        <div id="enlaces" class="enlaces" >
            <a  href="#home"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
            <a  href="#about"><i class="fa fa-info" aria-hidden="true"></i> Como trabajamos</a>
            <a  href="#portafolio"><i class="fa fa-briefcase" aria-hidden="true"></i>Puesta en contacto</a>
            <a  href="#contact"><i class="fa fa-envelope-o" aria-hidden="true"></i>Listado especialista</a>
            <a  href="#horario"><i class="fa fa-envelope-o" aria-hidden="true"></i>Horario</a>
        </div>
    </nav>
</header>



        <!-- En este código relacionamos el usuario con la contraseña para que verifique si existe el usuario y coincide con la contraseña, 
        también si se muestran resultados asociados en la base de datos y son corectos, se dejará abierta la sesion del usuario (que pondremos en todos los php)-->


<!-- INICIO SESIÓN -->
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
    
<!-- REGISTRO USUARIO -->
<?php
 session_start();
 
    include("./GestionBD/conexion.php");
    if(isset($_REQUEST['Ingresar'])){
        $dni=$_REQUEST['DNI_Cliente'];
        $telefono=$_REQUEST['NumTelefono_Cliente'];
        $email=$_REQUEST['Correo_Cliente'];
        $usuario=$_REQUEST['Nombre_Cliente'];
        $apellidos=$_REQUEST['Apellido_Cliente'];
        $contraseña=$_REQUEST['Contraseña_Cliente']; 
        $Fecha_Nac=$_REQUEST['FechaNacimiento_Cliente'];
        $NombreVia_Cliente=$_REQUEST['Nombre_Via'];
        $NumeroVia_Cliente=$_REQUEST['Numero_Via'];
        $TipoVia_Cliente=$_REQUEST['TipoVia_Cliente'];



        $sql= "INSERT INTO Usuarios (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, Contraseña_Cliente, FechaNacimiento_Cliente,Nombre_Via,Numero_Via,TipoVia_Cliente)
        VALUES ('$dni','$telefono', '$email', $usuario, '$apellidos', '$contraseña', ' $Fecha_Nac', '$NombreVia_Cliente','$NumeroVia_Cliente','$TipoVia_Cliente';";
   
    if (mysqli_query($conn,$sql))
    {
        header("Location:Alta_Conf.php?nombre=$usuario");
        /*Los campos de $usuario $apellidos $Fecha_Nac $telefono $telefono $email $contraseña se han añadido correctamente*/
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

                        <label for="DNI_Cliente">DNI:</label>
                        <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" required placeholder="DNI">

                        <label for="NumTelefono_Cliente">Teléfono: </label>
                        <input type="tel" name="NumTelefono_Cliente"  id="NumTelefono_Cliente" class="caja" required placeholder="Telefono">

                        <label for="Correo_Cliente">e-Mail:</label>
                        <input type="email" name="Correo_Cliente" id="Correo_Cliente" class="caja" required placeholder="email">

                        <label for="Nombre_Cliente">Nombre:</label>
                        <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" autofocus required placeholder="Nombre">

                        <label for="Apellido_Cliente">Apellidos:</label>
                        <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">

                        <label for="Contraseña_Cliente">Contraseña:</label>
                        <input type="password" name="Contraseña_Cliente" id="Contraseña_Cliente" class="caja"required placeholder="Contraseña">

                        <label for="FechaNacimiento_Cliente">Fecha de Nacimiento:</label>
                        <input type="date" name="FechaNacimiento_Cliente" id="FechaNacimiento_Cliente" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">

                        <label for="NombreVia_Cliente">Nombre de la via:</label>
                        <input type="text" class="caja" name="NombreVia_Cliente" id="NombreVia_Cliente" placeholder="Escribe el nombre de la via">

                        <label for="NumeroVia_Cliente">Nombre de la via:</label>
                        <input type="text" class="caja" name="NumeroVia_Cliente" id="NumeroVia_Cliente" placeholder="Escribe el número de la via">

                        <label for="TipoVia_Cliente">Nombre de la via:</label>
                        <input type="text" class="caja" name="TipoVia_Cliente" id="TipoVia_Cliente" placeholder="Escribe el nombre de la via">

                        <button type="submit" title="AltaUsuario" name="Ingresar">Alta Usuario</button>
                    </form>
                    <div class="pie-form">
                        <a href="catalogo.php">Volver</a>
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





 
 
