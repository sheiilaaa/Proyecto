<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>
    <!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
    <html lang="es">
        <head>
            <meta charset="utf-8">
            
            <title> Login </title>    
            
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
            <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
            
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

    <!-- Codigo inicio  -->
            <div id="contenedor">
                <div class="central">
                    <div class="titulo">
                    <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['DNI_Cliente'])) {
                            $DNI = mysqli_real_escape_string($conn, $_POST['DNI_Cliente']);

                            // Consultar la base de datos
                            $sql = "SELECT Nombre_Cliente, Apellido_Cliente FROM CLIENTES WHERE DNI_Cliente='$DNI';";
                            $resultado = mysqli_query($conn, $sql);

                            if ($resultado && mysqli_num_rows($resultado) > 0) {
                                // Obtener los datos del cliente
                                $row = mysqli_fetch_assoc($resultado);
                                $Nombre_Cliente = $row['Nombre_Cliente'];
                                $Apellido_Cliente = $row['Apellido_Cliente'];
                                
                                //Mensaje de confirmación
                                echo "$Nombre_Cliente $Apellido_Cliente se ha modificado correctamente tu contraseña";
                            }
                        }
                    ?>
                    </div>
                    <div class="pie-form">
                        <a href="Inicio.php">incio</a>
                    </div>   
                </div>
            </div>

    
    <!-- PIE DE PAGINA -->
    <footer>
                Todos los derechos reservados | Coaching SL Copyright © 2024
            </footer>   
            
                <!-- Link a JavaScript -->
    <script src="JS/traducciones.js"></script>
      
        </body>
    </html>