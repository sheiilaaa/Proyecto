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

    <?php
session_start();
include("./GestionBD/conexion.php");

if(isset($_REQUEST['Eliminar'])){
    $ID_Especialista=$_REQUEST['ID_Especialista'];
    $DNI_Especialista=$_REQUEST['DNI_Especialista'];
    $NumTelefono_Especialista=$_REQUEST['NumTelefono_Especialista'];
    $Correo_Especialista=$_REQUEST['Correo_Especialista'];
    $Nombre_Especialista=$_REQUEST['Nombre_Especialista'];
    $Apellido_Especialista=$_REQUEST['Apellido_Especialista'];
    $Contrasena_Especialista=$_REQUEST['Contrasena_Especialista']; 
    $FechaNacimiento_Especialista=$_REQUEST['FechaNacimiento_Especialista'];
    $NombreVia_Especialista=$_REQUEST['NombreVia_Especialista'];
    $NumeroVia_Especialista=$_REQUEST['NumeroVia_Especialista'];
    $TipoVia_Especialista=$_REQUEST['TipoVia_Especialista'];
    $CuentaBancaria_Especialista=$_REQUEST['CuentaBancaria_Especialista'];
    $Cuota_Especialista=$_REQUEST['Cuota_Especialista'];

    $elimina="DELETE FROM especialistas SET ID_Especialista= '', DNI_Especialista= '$DNI_Especialista', Nombre_Especialista='$Nombre_Especialista', Apellido_Especialista='$Apellido_Especialista', FechaNacimiento_Especialista='$FechaNacimiento_Especialista', NumTelefono_Especialista='$NumTelefono_Especialista', Correo_Especialista='$Correo_Especialista', TipoVia_Especialista='$TipoVia_Especialista', NombreVia_Especialista='$NombreVia_Especialista', NumeroVia_Especialista='$NumeroVia_Especialista', CuentaBancaria_Especialista='$CuentaBancaria_Especialista', Cuota_Especialista='$Cuota_Especialista', Contrasena_Especialista='$Contrasena_Especialista' WHERE id_Articulo =$id_Articulo";	/*?*/
    
    if (mysqli_query($conn,$elimina))
        {
        header("Location:ConfEliminarEspe.php");
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_REQUEST['ID_Especialista'])){ //que te envie aquí desde el boton de id, modificar 
    
    $id_Articulo=$_REQUEST['id_Articulo'];

    $sql="SELECT * FROM especialistas WHERE ID_Especialista= $ID_Especialista;";
    $resultat=mysql_query($conn,$elimina);

    if(mysqli_num_rows($resultat)>0)
    {
?>
<div id="contenedor">
    <div id="central">
        <div id="login">
            <div class="titulo">
                Bienvenido
            </div>
            <form id="EliminarArticulos" action="catalogo.php" method="post">

                        <label for="id_Articulo">DNI:</label>
                        <input type="text" id="id_Articulo" name="id_Articulo" class="caja" placeholder="ID">

                        <label for="DNI_Especialista">DNI:</label>
                        <input type="text" id="DNI_Especialista" name="DNI_Especialista" class="caja" required pattern="[0-9]{8}[A-Za-z]{1}" placeholder="DNI" value='<?php echo $row['DNI_Especialista']?>'>

                        <label for="NumTelefono_Especialista">Teléfono: </label>
                        <input type="tel" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" required placeholder="Telefono" value='<?php echo $row['NumTelefono_Especialista']?>'>

                        <label for="Correo_Especialista">e-Mail:</label>
                        <input type="email" name="Correo_Especialista" id="Correo_Especialista" class="caja" required placeholder="email" value='<?php echo $row['Correo_Especialista']?>'>

                        <label for="Nombre_Especialista">Nombre:</label>
                        <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required pattern="[a-zA-Z\s]+" placeholder="Nombre" value='<?php echo $row['Nombre_Especialista']?>'>

                        <label for="Apellido_Especialista">Apellidos:</label>
                        <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required pattern="[a-zA-Z\s]+" placeholder="Apellidos" value='<?php echo $row['Apellido_Especialista']?>'>

                        <label for="Contrasena_Especialista">Contraseña:</label>
                        <input type="password" name="Contrasena_Especialista" id="Contrasena_Especialista" class="caja"required placeholder="Contrasena" value='<?php echo $row['Contrasena_Especialista']?>'>

                        <label for="FechaNacimiento_Especialista">Fecha de Nacimiento:</label>
                        <input type="date" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" placeholder="Fecha Nacimiento" title="Fecha Nacimiento" value='<?php echo $row['FechaNacimiento_Especialista']?>'>

                        <label for="NombreVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="NombreVia_Especialista" id="NombreVia_Especialista" placeholder="Escribe el nombre de la via" value='<?php echo $row['NombreVia_Especialista']?>'>

                        <label for="NumeroVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="NumeroVia_Especialista" id="NumeroVia_Especialista" placeholder="Escribe el número de la via" value='<?php echo $row['NumeroVia_Especialista']?>'>

                        <label for="TipoVia_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="TipoVia_Especialista" id="TipoVia_Especialista" placeholder="Escribe el nombre de la via" value='<?php echo $row['TipoVia_Especialista']?>'>

                        <label for="CuentaBancaria_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="CuentaBancaria_Especialista" id="CuentaBancaria_Especialista" placeholder="Escribe su cuenta bancaría" value='<?php echo $row['CuentaBancaria_Especialista']?>'>

                        <label for="Cuota_Especialista">Nombre de la via:</label>
                        <input type="text" class="caja" name="Cuota_Especialista" id="Cuota_Especialista" placeholder="Indica la couta del especialista" value='<?php echo $row['Cuota_Especialista']?>'>


                <button type="submit" title="Eliminar" name="Eliminar">Eliminar</button>
            </form>
            <div class="pie-form">
                <a href="Inicio.php">Volver</a>
            </div>
        </div>
    </div>    
</div>

<?php
}else{
    echo "Artículo no encontrado: " . $elimina . "<br>" .mysqli_error($conn);
}

}

?>





<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>
