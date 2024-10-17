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
        $contraseña=$_REQUEST['contraseña']; /*PREGUNTAR RAFA*/
        $Fecha_Nac=$_REQUEST['FechaNacimiento_Cliente'];

        $NombreVia_Cliente=$_/*PREGUNTAR RAFA*/['Nombre_Via'];
        $NumeroVia_Cliente=$_/*PREGUNTAR RAFA*/['Numero_Via'];
        $TipoVia_Cliente=/*PREGUNTAR RAFA*/['TipoVia_Cliente'];



        $sql= "INSERT INTO Usuarios (DNI_Cliente, NumTelefono_Cliente, Correo_Cliente, Nombre_Cliente, Apellido_Cliente, contraseña, FechaNacimiento_Cliente,Nombre_Via,Numero_Via,TipoVia_Cliente)
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
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="caja" autofocus required placeholder="Nombre">
                        <label for="apellidos">Apellidos:</label>
                        <input type="text" id="apellidos" name="apellidos" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" name="contraseña" id="contraseña" class="caja"required placeholder="Contraseña">
                        <label for="Fecha_Nac">Fecha de Nacimiento:</label>
                        <input type="date" name="Fecha_Nac" id="Fecha_Nac" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento">
                        <label for="telefono">Teléfono: </label>
                        <input type="tel" name="telefono"  id="telefono" class="caja"  placeholder="Telefono" required>
                        <label for="email">e-Mail:</label>
                        <input type="email" name="email" id="email" required class="caja" placeholder="email">
                        <label for="url">URL:</label>
                        <input type="url" class="caja" name="url" id="url" placeholder="Escribe la URL de tu página web personal">
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
</body>
</html>





 
 
