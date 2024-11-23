
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
        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        
</head>
   
<body>

<!-- CONEXION -->
    <?php
        session_start();
        include("./GestionBD/1-conexion.php");
        ?>

<!-- CONFIRMACION -->
    <div id="contenedor">
        <div class="central">
            <div class="titulo">
                <?php
                    $Nombre_Cliente = $_REQUEST["Nombre_Cliente"];
                    echo "Bienvenido $Nombre_Cliente"
                ?>
            </div>
            
            <div class="pie-form">
                    <a href="ComoTrabajamos.php">Continuar</a>
            </div>   
        </div>
    </div>       

        <!-- PIE DE PAGINA -->
<footer>
    Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>



</body>
</html>

