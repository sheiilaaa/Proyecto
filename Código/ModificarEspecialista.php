<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComoTrabajamos</title>
    <link rel="stylesheet" href="css/estilo.css">
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


<div class="titulo2">Modificar Especialista </div>
<?php
	session_start();
    include ("./GestionBD/conexion.php");

    if(isset($_REQUEST['Modificar'])){
        $id_Art=$_REQUEST['id_Articulo'];
        $Nombre=$_REQUEST['Nombre'];
        $Descripcion=$_REQUEST['Descripcion'];
        $Foto=$_REQUEST['Foto'];
        $Precio=$_REQUEST['Precio'];
		$Actualizar = "UPDATE Articulos SET Nombre='$Nombre', Descripcion='$Descripcion', Foto='$Foto', Precio='$Precio'
        WHERE id_Articulo='$id_Art';";
        
        if(mysqli_query($conn,$Actualizar)){
            header("Location:Modificar_Conf.php?Nombre=$Nombre");
         } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }

	if(isset($_REQUEST['id'])){ 
        $id_Articulo=$_REQUEST['id'];     
        $sql= " SELECT * FROM Articulos WHERE id_Articulo= '$id_Articulo'; ";
		$result= mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0)
			{
?>
              <div id="contenedor">
				<div id="central">
                <div id="login">
                    <div class="titulo">
                        Modifica el Articulo:
                    </div>
                    <form id="ModificaArticulo" action="" method="post">
                        <!--- ID readonly, ya que es el unico que no se podrá modificar --->
                        <label for="id_Articulo">Id del Articulo:</label>
                            <input type="text" id="id_Articulo" readonly name="id_Articulo" class="caja" autofocus value = '<?php echo $row['id_Articulo'] ?>' placeholder="id_Articulo">
                        <label for="Nombre">Nombre:</label>
                            <input type="text" id="Nombre" name="Nombre" class="caja" autofocus required value = '<?php echo $row['Nombre'] ?>' placeholder="Nombre">
                        <label for="Descripcion">Descripcion:</label>
                            <input type="text" id="Descripcion" name="Descripcion" class="caja" required value = '<?php echo $row['Descripcion'] ?>' placeholder="Descripcion">
                        <label for="Foto">Foto:</label>
                            <input type="image" name="Foto" id="Foto" class="caja" value = '<?php echo $row['Foto'] ?>' placeholder="Foto">
                        <label for="Precio">Precio: </label>
                            <input type="number" name="Precio"  id="Precio" class="caja" required value = '<?php echo $row['Precio'] ?>' placeholder="Precio">
                        
                        <button type="submit" title="Modificar" name="Modificar">Modificar</button>
                    </form>
                    <div class="pie-form">
                        <a href="catalogo.php">Volver</a>
                    </div>
                </div>
            </div>    
        </div>
<?php
            }
            else{
                echo "Error articulo no encontrado: " . $sql . "<br>" . mysqli_error($conn);
            }
      }
?>





ConfirmacionModificar.php
<button><>

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
    
</body>
</html>
