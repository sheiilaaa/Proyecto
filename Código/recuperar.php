<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Recuperar contraseña </title>    
        
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



<!-- Codigo --->
         <!-- Aquí comprueba si el usuario está asociado a la base de datos y de ser así se cambiará la contraseña por una nueva que tú introduzcas-->
        <?php
        if(isset($_POST['restablecer'])){
            $usuario=$_POST['Nombre_Cliente'];
            $contraseña=$_POST['Contrasena_Cliente'];
            
            $sql= "SELECT * FROM Clientes WHERE Nombre_Cliente ='$usuario';";

            $resultado = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultado)>0)
            {  
                $modificar= "UPDATE Clientes SET Contrasena_Cliente='$contraseña' WHERE Nombre_Cliente='$usuario';";
                $resultado=mysqli_query($conn,$modificar);
                header("Location:restablecer.php?Nombre_Cliente=$usuario");
            
            }else{
                echo "El usuario introducido no forma parte de la base de datos"; 
            }          
        }

        else{
        
        ?>
        <div id="contenedor">
            <div id="central">
                <div id="login">
                    <div class="titulo">
                        Recuperar contraseña
                    </div>
                    <form id="loginform" action ="restablecer.php"> 
                        <input type="text" name="Nombre_Cliente" placeholder="Nombre del cliente">
                        <input type="password" name="Contrasena_Cliente" placeholder="Contraseña modificada" autofocus requiered>
                        <button type="submit" title="restablecer" name="restablecer">Restablecer</button>
                    </form>
                    
                <div class="inferior">
                    <a href="Inicio.php">Volver</a>
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