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

if(isset($_REQUEST['Modificar'])){
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

    $elimina="DELETE especialistas SET ID_Especialista= '$ID_Especialista', DNI_Especialista= '$DNI_Especialista', Descripcion='$Descripcion', Foto='$Foto', Precio='$Precio'  WHERE id_Articulo =$id_Articulo";
    DNI_Especialista	Nombre_Especialista	Apellido_Especialista	FechaNacimiento_Especialista	NumTelefono_Especialista	Correo_Especialista	TipoVia_Especialista	NombreVia_Especialista	NumeroVia_Especialista	CuentaBancaria_Especialista	Cuota_Especialista	Contrasena_Especialista	


}
//El siguiente bucle sirve para revisar si se ha modificado o no en la base de datos anterior, para luego mandarte a otro php para mostrarte un mensaje.
    if (mysqli_query($conn,$elimina))
        {
        header("Location:Confirmacion_Eliminar.php?nombre=$Nombre");
        }
    */

if (isset($_REQUEST['id_Articulo'])){ //que te envie aquí desde el boton de id, modificar 
    $id_Articulo=$_REQUEST['id_Articulo'];

    $sql="SELECT * FROM Articulos WHERE id_Articulo= $id_Articulo;";
    $resultado=mysql_query($conn,$sql);

    if(mysqli_num_rows($resultado)>0)
    {
?>
<div id="contenedor">
    <div id="central">
        <div id="login">
            <div class="titulo">
                Bienvenido
            </div>
            <form id="EliminarArticulos" action="catalogo.php" method="post">
                <label for="id_Articulo">Id_Articulo:</label>
                <input type="text" id="id_Articulo" name="id_Articulo" placeholder="id_Articulo" autofocus required value='<?php echo $row['id_Articulo']?>'>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="caja" autofocus required placeholder="Nombre" value='<?php echo $row['nombre']?>'>
                <label for="Descripcion">Descripcion:</label>
                <input type="text" name="Descripcion" id="Descripcion" required placeholder="Descripcion" value='<?php echo $row['Descripcion']?>'>
                <label for="Foto">Foto:</label>
                <input type="image" name="Foto" id="Foto" placeholder="Foto" value='<?php echo $row['Foto']?>'>
                <label for="Precio">Precio: </label>
                <input type="number" name="Precio"  id="Precio" placeholder="Precio" required value='<?php echo $row['Precio']?>'>

                <button type="submit" title="Eliminar" name="Modificar">Eliminar</button>
            </form>
            <div class="pie-form">
                <a href="catalogo.php">Volver</a>
            </div>
        </div>
    </div>    
</div>

<?php
}else{
    echo "Artículo no encontrado: " . $sql . "<br>" .mysqli_error($conn);
}

}

?>





<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>

</body>
</html>





 
 
