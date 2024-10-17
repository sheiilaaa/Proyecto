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
</body>
</html>





 
 
