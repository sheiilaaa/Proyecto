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
    
<!-- CODIGO -->
        <?php
        if ($conn){/* HE AÑADIDO ESTO */

        if(isset($_REQUEST['Ingresar'])){
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

            $de= "INSERT INTO CLIENTES (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, Contrasena_Cliente, FechaNacimiento_Cliente,NombreVia_Cliente,NumeroVia_Cliente,TipoVia_Cliente)
            VALUES ('$DNI_Cliente','$NumTelefono_Cliente', '$Correo_Cliente', $Nombre_Cliente, '$Apellido_Cliente', '$Contrasena_Cliente', ' $FechaNacimiento_Cliente', '$NombreVia_Cliente','$NumeroVia_Cliente','$TipoVia_Cliente';";
        
            $pagos = "$Nombre_Cliente,$Apellido_Cliente,$DNI_Cliente"; 
            
            
            if (mysqli_query($conn,$de))
            {
                header("Location:Pago.php?ID_Cliente=$ID_Cliente");
            
            }  else{
                echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
                }

                if (mysqli_query($conn,$de)){
                    header("Location:Inicio.php?Nombre_Cliente=$Nombre_Cliente");
                    /*Los campos de $https://www.citapreviadnie.es/citaPreviaDni/MantenimientoPagos.actionNombre_Cliente $apellidos $Fecha_Nac $telefono $telefono $email $contraseña se han añadido correctamente*/
                    
                    }
                    else {
                        echo "Error:  "   . $de . "<br>" . mysqli_error($conn);
                        
                        /* PORÍA AÑADIR ESTO, 
                        echo "ERROR:".mysqli_error($conn);
                        echo "ERROR:".mysqli_error($de); */
                    }
                }   
            else{
        ?>
    <h2></h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form id="AltaUsuario" action="" method="POST">
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
                <input type="number" class="caja" name="NumeroVia_Cliente" id="NumeroVia_Cliente" placeholder="Escribe el número de la via">
                
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

}
    else{
    ?>
        <div class="form-container sign-in-container">
            <form id="login" action="" method="post">
                <h1>Iniciar Sesión</h1>
                <input type="text" name="Nombre_Cliente" placeholder="Nombre_Cliente" required>
                <input type="password" placeholder="Contrasena_Cliente" name="Contrasena_Cliente" required>        
                <div>
                    <a href="recuperar.php">Te has olvidado la contraseña?</a>
                    <br>
                    <a href="LoginRegistroESPECI.php">Campo para Especialistas</a>
                </div>
                <button type="submit" title="Ingresar" name="Ingresar">Login</button>
            </form>
            <div class="pie-form"> 
                <a href="Inicio.php">Pulsa aquí para Registrate</a>
            </div>
        
        </div>
        
        <?php
        }
        ?>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Quieres iniciar sesión para poder acceder a la pagina web</p>
                    <button class="ghost" id="signIn">Iniciar sesión</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>¿Eres nuevo?</h1>
                    <p>Haz clic y registrate en nuestra pagina para poder acceder</p>
                    <button class="ghost" id="signUp">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
            - Read how I created this and how you can join the challenge
            <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
        </p>
    </footer>
    <script src="js/Inicio.js"></script>


<!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>