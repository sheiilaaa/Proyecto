
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
        
    </head>
   
    <body>        
        
        <div id="contenedor">
            <div class="central">
                <div class="titulo">
                <?php
                 session_start();
                        $Nombre = $_REQUEST["Nombre_Cliente"];
                        echo "$Nombre se ha añadido la nueva contraseña modificada correctamente" //De la pantalla de recuperar contraseña, una vez guardada la información en la base de datos nos manda a esta pantalla donde nos dice que se ha guardado correctamente
                    ?>
                </div>
                <div class="pie-form">
                     <a href="Inicio.php">incio</a>
                </div>   
            </div>
        </div>
        
    </body>
</html>