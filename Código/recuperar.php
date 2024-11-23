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


<!-- Codigo --->
         <!-- Aquí comprueba si el usuario está asociado a la base de datos y de ser así se cambiará la contraseña por una nueva que tú introduzcas-->
    <?php
    if(isset($_REQUEST['restablecer'])){
        $usuario=$_REQUEST['Nombre_Cliente'];
        $contraseña=$_REQUEST['Contrasena_Cliente'];
        
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

    </body>
</html>
