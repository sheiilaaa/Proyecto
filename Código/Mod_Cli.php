<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ComoTrabajamos</title>

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
            // Asegúrate de que la ruta del archivo es segura y no se pueda manipular
            include(realpath(dirname(__FILE__) . "/GestionBD/1-conexion.php"));
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


<!-- Codigo -->
        <div class="titulo2">Modificar Especialista</div>
        <?php
        if(isset($_REQUEST['Modificar'])){
            // Sanear y validar las entradas del formulario
            $ID_Especialista = filter_input(INPUT_REQUEST, 'ID_Especialista', FILTER_SANITIZE_NUMBER_INT);
            $DNI_Especialista = filter_input(INPUT_REQUEST, 'DNI_Especialista', FILTER_SANITIZE_STRING);
            $Nombre_Especialista = filter_input(INPUT_REQUEST, 'Nombre_Especialista', FILTER_SANITIZE_STRING);
            $Apellido_Especialista = filter_input(INPUT_REQUEST, 'Apellido_Especialista', FILTER_SANITIZE_STRING);
            $FechaNacimiento_Especialista = filter_input(INPUT_REQUEST, 'FechaNacimiento_Especialista', FILTER_SANITIZE_STRING);
            $NumTelefono_Especialista = filter_input(INPUT_REQUEST, 'NumTelefono_Especialista', FILTER_SANITIZE_STRING);
            $Correo_Especialista = filter_input(INPUT_REQUEST, 'Correo_Especialista', FILTER_SANITIZE_EMAIL);
            $TipoVia_Especialista = filter_input(INPUT_REQUEST, 'TipoVia_Especialista', FILTER_SANITIZE_STRING);
            $NombreVia_Especialista = filter_input(INPUT_REQUEST, 'NombreVia_Especialista', FILTER_SANITIZE_STRING);
            $NumeroVia_Especialista = filter_input(INPUT_REQUEST, 'NumeroVia_Especialista', FILTER_SANITIZE_STRING);
            $CuentaBancaria_Especialista = filter_input(INPUT_REQUEST, 'CuentaBancaria_Especialista', FILTER_SANITIZE_STRING);
            $Cuota_Especialista = filter_input(INPUT_REQUEST, 'Cuota_Especialista', FILTER_SANITIZE_STRING);
            $Contrasena_Especialista = filter_input(INPUT_REQUEST, 'Contrasena_Especialista', FILTER_SANITIZE_STRING);

            $Contrasena_Especialista_EN = password_hash($Contrasena_Especialista, PASSWORD_DEFAULT);

            $sql = "UPDATE ESPECIALISTAS 
            SET Nombre_Especialista = ?, 
                Apellido_Especialista = ?, 
                FechaNacimiento_Especialista = ?, 
                NumTelefono_Especialista = ?, 
                Correo_Especialista = ?, 
                TipoVia_Especialista = ?, 
                NombreVia_Especialista = ?, 
                NumeroVia_Especialista = ?, 
                CuentaBancaria_Especialista = ?, 
                Cuota_Especialista = ?, 
                Contrasena_Especialista = ?
            WHERE ID_Cliente = ?";

            $stmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param($stmt, 'sssssssssssi', $Nombre_Especialista, $Apellido_Especialista, $FechaNacimiento_Especialista, 
            $NumTelefono_Especialista, $Correo_Especialista, $TipoVia_Especialista, $NombreVia_Especialista, $NumeroVia_Especialista, 
            $CuentaBancaria_Especialista, $Cuota_Especialista, $Contrasena_Especialista, $ID_Especialista);

            if ($stmt === false) {
                die("Error en la preparación de la consulta: " . mysqli_error($conn));
            }
            
            if(mysqli_query($conn,$Actualizar)){
                header("Location:ConfModCli.php?DNI_Cliente=$DNI_Cliente");
            }else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        
        }

        if(isset($_REQUEST['ID_Cliente'])){ /*Quizas el ID debe de ser id*/
            $ID_Cliente=$_REQUEST['ID_Cliente'];  /*El id de request, quizas debe ser id*/   
            $sql= " SELECT * FROM CLIENTES WHERE ID_Cliente= '$ID_Cliente'; ";
            $result= mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                ?>
                    <div id="contenedor">
                        <div id="central">
                            <div id="login">
                                <div class="titulo">Modifica el especialista con los siguientes datos:</div>
                                <form id="ModificaEspecialista" action="ConfModCli.php" method="post">
                                    <!--- ID readonly, ya que es el unico que no se podrá modificar --->
                                    <label for="ID_Cliente">ID:</label>
                                        <input type="text" id="ID_Cliente" readonly name="ID_Cliente" class="caja" value = '<?php echo $row['ID_Cliente'] ?>'>
                        
                                    <label for="DNI_Cliente">DNI:</label>
                                        <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="caja" value = '<?php echo $row['DNI_Cliente'] ?>'>
                                    
                                    <label for="Nombre_Cliente">Nombre:</label>
                                        <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="caja" value = '<?php echo $row['Nombre_Cliente'] ?>'>
                                    
                                    <label for="Apellido_Cliente">Apellido:</label>
                                        <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="caja" value = '<?php echo $row['Apellido_Cliente'] ?>'>
                                    
                                    <label for="FechaNacimiento_Cliente">Fecha de nacimiento:</label>
                                        <input type="image" name="FechaNacimiento_Cliente" id="FechaNacimiento_Cliente" class="caja" value = '<?php echo $row['FechaNacimiento_Cliente'] ?>'>
                                    
                                    <label for="NumTelefono_Cliente">Numero de telefono: </label>
                                        <input type="number" name="NumTelefono_Cliente"  id="NumTelefono_Cliente" class="caja" value = '<?php echo $row['NumTelefono_Cliente'] ?>'>

                                    <label for="Correo_Cliente">Correo electronico: </label>
                                        <input type="number" name="Correo_Cliente"  id="Correo_Cliente" class="caja" value = '<?php echo $row['Correo_Cliente'] ?>'>

                                    <label for="TipoVia_Cliente">Tipo de via: </label>
                                        <input type="number" name="TipoVia_Cliente"  id="TipoVia_Cliente" class="caja" value = '<?php echo $row['TipoVia_Cliente'] ?>'>

                                    <label for="NombreVia_Cliente">Nombre de la via: </label>
                                        <input type="number" name="NombreVia_Cliente"  id="NombreVia_Cliente" class="caja" value = '<?php echo $row['NombreVia_Cliente'] ?>'>

                                    <label for="NumeroVia_Cliente">Numero de la via: </label>
                                        <input type="NumeroVia_Cliente" name="NumeroVia_Cliente"  id="NumeroVia_Cliente" class="caja" value = '<?php echo $row['NumeroVia_Cliente'] ?>'>

                                    <label for="Contrasena_Cliente">Contraseña: </label>
                                        <input type="number" name="Contrasena_Cliente"  id="Contrasena_Cliente" class="caja" value = '<?php echo $row['Contrasena_Cliente'] ?>'>
                                    
                                    <button type="submit" title="Modificar" name="Modificar">Confirmar modificación</button>
                                </form>
                                <div class="pie-form">
                                    <a href="GestionCli.php">Volver</a>
                                </div>
                            </div> <!-- LOGIN -->
                        </div> <!-- CENTRAL -->
                    </div> <!-- CONTENDERO -->
        <?php
            }
            else{
                echo "Error especialista no encontrado: " . $sql . "<br>" . mysqli_error($conn);
            }
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