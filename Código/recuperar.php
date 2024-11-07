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
        <link rel="stylesheet" href="css/login.css">
    
    </head>
    <body>
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
         <!-- Aquí comprueba si el usuario está asociado a la base de datos y de ser así se cambiará la contraseña por una nueva que tú introduzcas-->
    <?php
    session_start();

    include("./GestionBD/conexion.php");
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
        echo "El usuario introduucido no forma parte de la base de datos"; 
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
                    <form id="loginform" action =""> 
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
    </body>
</html>
