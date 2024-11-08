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


<!-- QUE ES? -->
<div class="titulo2">Modificar Especialista </div>
<?php
	session_start();
    include ("./GestionBD/conexion.php");

    if(isset($_REQUEST['Modificar'])){
        $ID_Especialista=$_REQUEST['ID_Especialista'];
        
        $DNI_Especialista=$_REQUEST['DNI_Especialista'];
        $Nombre_Especialista=$_REQUEST['Nombre_Especialista'];
        $Apellido_Especialista=$_REQUEST['Apellido_Especialista'];
        $FechaNacimiento_Especialista=$_REQUEST['FechaNacimiento_Especialista'];
        $NumTelefono_Especialista=$_REQUEST['NumTelefono_Especialista'];
        $Correo_Especialista=$_REQUEST['Correo_Especialista'];
        $TipoVia_Especialista=$_REQUEST['TipoVia_Especialista'];
        $NombreVia_Especialista=$_REQUEST['NombreVia_Especialista'];
        $NumeroVia_Especialista=$_REQUEST['NumeroVia_Especialista'];
        $CuentaBancaria_Especialista=$_REQUEST['CuentaBancaria_Especialista'];
        $Cuota_Especialista=$_REQUEST['Cuota_Especialista'];
        $Contrasena_Especialista=$_REQUEST['Contrasena_Especialista'];

		$Actualizar = "UPDATE ESPECIALISTAS SET Nombre_Especialista='$Nombre_Especialista', Apellido_Especialista='$Apellido_Especialista',
                        FechaNacimiento_Especialista='$FechaNacimiento_Especialista', NumTelefono_Especialista='$NumTelefono_Especialista'
                        Correo_Especialista='$Correo_Especialista', TipoVia_Especialista='$TipoVia_Especialista', NombreVia_Especialista='$NombreVia_Especialista',
                        NumeroVia_Especialista='$NumeroVia_Especialista', CuentaBancaria_Especialista='$CuentaBancaria_Especialista', Cuota_Especialista='$Cuota_Especialista',
                        Contrasena_Especialista='$Contrasena_Especialista'
        WHERE DNI_Especialista='$DNI_Especialista';";
        
        if(mysqli_query($conn,$Actualizar)){
            header("Location:Modificar_Conf.php?Nombre_Especialista=$Nombre_Especialista");
         } else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
    }

	if(isset($_REQUEST['id'])){ 
        $DNI_Especialista=$_REQUEST['id'];     
        $sql= " SELECT * FROM ESPECIALISTAS WHERE DNI_Especialista= '$DNI_Especialista'; ";
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
                        <label for="DNI_Especialista">Id del Articulo:</label>
                            <input type="text" id="DNI_Especialista" readonly name="DNI_Especialista" class="caja" autofocus value = '<?php echo $row['DNI_Especialista'] ?>' placeholder="DNI_Especialista">
                        <label for="Nombre_Especialista">Nombre:</label>
                            <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" autofocus required value = '<?php echo $row['Nombre_Especialista'] ?>' placeholder="Nombre_Especialista">
                        <label for="Apellido_Especialista">Apellido:</label>
                            <input type="text" id="Apellido_Especialista" name="Apellido_Especialista" class="caja" required value = '<?php echo $row['Apellido_Especialista'] ?>' placeholder="Apellido_Especialista">
                        <label for="FechaNacimiento_Especialista">Fecha de nacimiento:</label>
                            <input type="image" name="FechaNacimiento_Especialista" id="FechaNacimiento_Especialista" class="caja" value = '<?php echo $row['FechaNacimiento_Especialista'] ?>' placeholder="FechaNacimiento_Especialista">
                        <label for="NumTelefono_Especialista">Numero de telefono: </label>
                            <input type="number" name="NumTelefono_Especialista"  id="NumTelefono_Especialista" class="caja" required value = '<?php echo $row['NumTelefono_Especialista'] ?>' placeholder="NumTelefono_Especialista">

                        <label for="Correo_Especialista">Correo electronico: </label>
                            <input type="number" name="Correo_Especialista"  id="Correo_Especialista" class="caja" required value = '<?php echo $row['Correo_Especialista'] ?>' placeholder="Correo_Especialista">

                        <label for="TipoVia_Especialista">Tipo de via: </label>
                            <input type="number" name="TipoVia_Especialista"  id="TipoVia_Especialista" class="caja" required value = '<?php echo $row['TipoVia_Especialista'] ?>' placeholder="TipoVia_Especialista">

                        <label for="NombreVia_Especialista">Nombre de la via: </label>
                            <input type="number" name="NombreVia_Especialista"  id="NombreVia_Especialista" class="caja" required value = '<?php echo $row['NombreVia_Especialista'] ?>' placeholder="NombreVia_Especialista">

                        <label for="NumeroVia_Especialista">Numero de la via: </label>
                            <input type="NumeroVia_Especialista" name="NumeroVia_Especialista"  id="NumeroVia_Especialista" class="caja" required value = '<?php echo $row['NumeroVia_Especialista'] ?>' placeholder="NumeroVia_Especialista">

                        <label for="CuentaBancaria_Especialista">Cuenta bancaria: </label>
                            <input type="number" name="CuentaBancaria_Especialista"  id="CuentaBancaria_Especialista" class="caja" required value = '<?php echo $row['CuentaBancaria_Especialista'] ?>' placeholder="CuentaBancaria_Especialista">

                        <label for="Cuota_Especialista">Cuota del especialista: </label>
                            <input type="number" name="Cuota_Especialista"  id="Cuota_Especialista" class="caja" required value = '<?php echo $row['Cuota_Especialista'] ?>' placeholder="Cuota_Especialista">

                        <label for="Contrasena_Especialista">Contraseña: </label>
                            <input type="number" name="Contrasena_Especialista"  id="Contrasena_Especialista" class="caja" required value = '<?php echo $row['Contrasena_Especialista'] ?>' placeholder="Contrasena_Especialista">
                        
                        <button type="submit" title="Modificar" name="Modificar">Modificar</button>
                    </form>
                    <div class="pie-form">
                        <a href="inicio.php">Volver</a>
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

<a href="ConfirmacionModificar.php">Confirmar registro</a>

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>
    
</body>
</html>
