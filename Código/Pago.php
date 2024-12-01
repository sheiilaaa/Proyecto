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
            include("./GestionBD/1-conexion.php");
        ?>

<!--CABECERA-->
<div id="header">
        <div class="logo">
            <img src="img/logo.png" alt="COACHING SL">
        </div>
        <nav>
            <ul>
                <li><a href=""><i class="fa fa-home"></i> <span data-translate="inicio">Inicio</span></a></li>
                <li><a href=""><i class="fa fa-briefcase"></i> <span data-translate="como_trabajar">Como Trabajar</span></a></li>
                <li><a href=""><i class="fa fa-phone-square"></i> <span data-translate="contacto">Puesta en contacto</span></a></li>
                <li><a href=""><i class="fa fa-address-book"></i> <span data-translate="especialistas">Especialistas</span></a></li>
                <li><a href=""><i class="fa fa-calendar"></i> <span data-translate="calendario">Calendario</span></a></li>
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


<!-- CODIGO -->        
        <?php


        if(isset($_REQUEST['Registro'])){
            $Estado_Pago=$_REQUEST['Estado_Pago']; 
            $Metodos_Pago=$_REQUEST['FechaNacimiento_Cliente'];
            $Fecha_Pago=$_REQUEST['NombreVia_Cliente'];
            $Cantidad_Pago=$_REQUEST['NumeroVia_Cliente'];
            
            $ins = "INSERT INTO pagos(Estado_Pago,Metodos_Pago,Fecha_Pago,Cantidad_Pago)
            VALUES ('$Estado_Pago', '$Metodos_Pago', '$Fecha_Pago', '$Cantidad_Pago')";
            
            $recibido="SELECT C.Nombre_Cliente, C.Apellido_Cliente, C.DNI_Cliente, E.Nombre_Especialista, E.Cuota_Especialista
                FROM CLIENTES C
                JOIN CITAS CI ON C.ID_Cliente = CI.ID_Cliente_Cita
                JOIN ESPECIALISTAS ES ON ES.ID_Especialistas = ID_Especialista_Cita";

            if (mysqli_query($conn,$ins)){   
                header("location:ConfirmacionPago.php");
            }else {
                echo "ERROR:".mysqli_error($conn);
                echo "ERROR:".mysqli_error($ins); 
            }
        }
        else{ 
        ?>
        <div class="Fondo_pago">
            <form id="Pago.php" action="" method="post"><!--CAMBIAR DEPENDIENDO DE DONDE VENGA-->
                <div class="infoespecialista">
                    <div class="registro">Especialista</div>
                    <div class="IzqInfo"></div>
                    <div class="TIT">Ha escogido a:</div>
                    <div class="SuNOMBRE">
                        <label for="Nombre_Especialista"></label>    
                        <input type="text" id="Nombre_Especialista" name="Nombre_Especialista" class="caja" value='<?php echo $row['Nombre_Especialista']?>'>
                    </div>
                    <hr>
                    <div class="IzqInfo"></div>
                    <div class="TIT">Cuota del Especialista</div>
                    <div class="MostrarCuota">
                        <label for="Cuota_Especialista"></label>    
                        <input type="number" id="Cuota_Especialista" name="Cuota_Especialista" class="caja" value='<?php echo $row['Cuota_Especialista']?>'>
                    </div> <!-- MostrarCuota -->       
                </div> <!-- infoespecialista -->
            </form>    

            <div class="TarPago">
                <form id="PagoS.php" action="" method="post">
                    <div class="TituloPAGO">Que método quieres</div>
                    <div class="metodoPAGO">
                        <button class="Tarjeta"> <!-- VISA -->
                            <i class="fa fa-cc-visa" aria-hidden="true"></i>
                        </button>

                        <button class="Tarjeta"> <!-- PayPal -->
                            <i class="fa fa-cc paypal"></i>
                        </button>

                        <button class="Tarjeta"> <!-- Bizum/Móvil -->
                            <i class="fa fa-mobile"></i>
                        </button>

                        <button class="Tarjeta"> <!-- American Express -->
                            <i class="fa fa-cc amex"></i>
                        </button>

                        <button class="Tarjeta"> <!-- MasterCard -->
                            <i class="fa fa-cc-mastercard"></i>
                        </button>
                        <!--   <input type="text" id="Metodos_Pago" name="Metodos_Pago" class="cajaPago"> -->
                    </div> <!-- metodoPAGO -->  
                </form>
            </div> <!-- TarPago -->
                    
                <div class="DatosCliente">
                    <form id="PClien.php" action="" method="post">
                        <div class="UsuarioPago">Datos de pago</div>
                        <label for="Nombre_Cliente">Nombre:</label>
                            <input type="text" id="Nombre_Cliente" name="Nombre_Cliente" class="cajaPago" value="<?php echo $row['Nombre_Cliente']; ?>">
                        
                        <label for="Apellido_Cliente">Apellidos:</label>
                            <input type="text" id="Apellido_Cliente" name="Apellido_Cliente" class="cajaPago" value="<?php echo $row['Apellido_Cliente']; ?>">
                        
                        <label for="DNI_Cliente">DNI:</label>
                            <input type="text" id="DNI_Cliente" name="DNI_Cliente" class="cajaPago" value="<?php echo $row['DNI_Cliente']; ?>">
                        
                        <label for="Estado_Pago">Estado_Pago:</label> 
                            <input type="text" id="Estado_Pago" name="Estado_Pago" class="cajaPago">
                        
                        <label for="Fecha_Pago">Fecha de Pago:</label>
                            <input type="date" id="Fecha_Pago" name="Fecha_Pago" class="cajaPago">
                        
                        <label for="Cantidad_Pago">Cantidad del Pago:</label> <!--puede dar la opcion de pagar todo tarjeta o efectivo -->
                            <input type="text" id="Cantidad_Pago" name="Cantidad_Pago" class="cajaPago">
                        <br>
                        <input type="checkbox" name="user" value="Acepto los terminos de la página" requiered>
                            <label for="user">Acepto los terminos de la página</label>
                        
                        <div class="button">
                            <input type="submit" value="Enviar"> 
                        </div>
                        </form>
 <!-- DIV DatosCliente -->
                

        <?php  
        }        
        ?>     
            </div><!-- Datos Cliente -->
        </div>  <!-- Fondo_pago -->
<!-- PIE DE PAGINA -->
        <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>

    </body>
</html>