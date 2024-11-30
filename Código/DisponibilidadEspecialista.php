<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta id="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

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






<!-- CÓDIGO -->

<?php 

if(isset($_REQUEST['Ingresar2'])){
    $Fecha_Dispo=$_REQUEST['Fecha_Dispo'];
    $Hora_Dispo=$_REQUEST['Hora_Inicio'];
   
    
    $Disp= "INSERT INTO DISPONIBILIDAD_ESPECIALISTA(Fecha_Dispo, Hora_Dispo)
        VALUES ('$Fecha_Dispo','$Hora_Dispo';";
                                                    
    if (mysqli_query($conn,$Disp))
    {
        header("Location:LoginRegistroESPECI.php");
    }

    else 
    {
        echo "Error:  "   . $sql . "<br>" . mysqli_error($conn);
    }

}else{
    ?>
    <form action=""method="get">

    <div id="contenedor">
            <div class="central">
                <div class="DATOS_ESPECIALISTA">
                    <?php
                        $DNI_Especialista = $_REQUEST["DNI_Especialista"];
                        $Nombre_Especialista = $_REQUEST["Nombre_Especialista"];
                        $Apellido_Especialista = $_REQUEST["Apellido_Especialista"];

                        echo "Bienvenido $Nombre_Especialista $Apellido_Especialista aquí debes de registrar tu disponibilidad"
                    ?>

                </div>
            <fieldset>
                <legend>Disponibilidad Diaria</legend>
                <input type="checkbox" id="Fecha_Dispo" value="Lunes">
                    <label for="Fecha_Dispo">Lunes</label>

                <input type="checkbox" id="Fecha_Dispo" value="Martes">
                    <label for="Fecha_Dispo">Martes</label>

                <input type="checkbox" id="Fecha_Dispo" value="Miércoles">
                    <label for="Fecha_Dispo">Miércoles</label>
                   
                <input type="checkbox" id="Fecha_Dispo" value="Jueves">
                    <label for="Fecha_Dispo">Jueves</label>
                
                <input type="checkbox" id="Fecha_Dispo" value="Viernes">
                    <label for="Fecha_Dispo">Viernes</label>
                          
            </fieldset>
            
            <fieldset>
                <legend>Horario Laboral</legend>
                    <input type="checkbox" id="Hora_Dispo" value="8:00-9:00">
                        <label for="Hora_Dispo">8:00-9:00</label>
                        
                    <input type="checkbox" id="Hora_Dispo" value="9:00-10:00">
                        <label for="Hora_Dispo">9:00-10:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="10:00-11:00">
                        <label for="Hora_Dispo">10:00-11:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="11:00-12:00">
                        <label for="Hora_Dispo">11:00-12:00</label>
                        
                    <input type="checkbox" id="Hora_Dispo" value="15:00-16:00">
                        <label for="Hora_Dispo">15:00-16:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="16:00-17:00">
                        <label for="Hora_Dispo">16:00-17:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="17:00-18:00">
                        <label for="Hora_Dispo">17:00-18:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="18:00-19:00">
                        <label for="Hora_Dispo">18:00-19:00</label>

                    <input type="checkbox" id="Hora_Dispo" value="19:00-20:00">
                        <label for="Hora_Dispo">19:00-20:00</label>
                        
                    <input type="checkbox" id="Hora_Dispo" value="20:00-21:00">
                        <label for="Hora_Dispo">20:00-21:00</label>
            </fieldset>
            <input type="checkbox" id="user"  value="Acepto los terminos de la página" required>
            <label for="user">Acepto los terminos de la página</label>
            <br>

                        
                <div class="pie-form">
                    <a href="LoginRegistroESPECI.php">Continuar</a>
                </div>   
            </div>   
        </div>
    </form>

    <?php
    }  
    ?>      
</body>
</html>