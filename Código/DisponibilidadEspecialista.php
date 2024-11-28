<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>

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
<?php 

if(isset($_REQUEST['Ingresar2'])){
    $Fecha_Dispo=$_REQUEST['Fecha_Dispo'];
    $Hora_Dispo=$_REQUEST['NumTelefono_Especialista'];
    
    $Disp= "INSERT INTO DISPONIBILIDAD_ESPECIALISTA(Fecha_Dispo, NumTelefono_Especialista)
        VALUES ('$Fecha_Dispo','$NumTelefono_Especialista';";
                                                    
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
    <form action="mensaje final.html" method="get">
        <br>
        <fieldset>
            <legend>Metodo de pago</legend>

            <select name="Metodo de pago" id="user">
                <optgroup label="Tarjeta">
                    <option value="VISA">VISA</option>
                    <option value="MasterCard">MasterCard</option>
                    <option value="American Express">American Express</option>
                </optgroup>
                <optgroup label="Pasarela de Pago">
                    <option value="PayPal">PayPal</option>
                    <option value="Strype">Strype</option>
                    <option value="Global Payment">Global Payment</option>
                </optgroup>
            </select>
        </fieldset>
     
        <br>
        <input type="checkbox" name="user"  value="Acepto los terminos de la página" required>
        <label for="user">Acepto los terminos de la página</label>
        <br>
        <div class="button">
            <input type="submit" value="Enviar">
        </div>
    </form>

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
                <legend>Lunes</legend>

                    <input type="radio" name="Hora_Dispo" value="8:00-9:00">
                        <label for="Hora_Dispo">8:00-9:00</label>
                        
                    <input type="radio" name="Hora_Dispo" value="9:00-10:00">
                        <label for="Hora_Dispo">9:00-10:00</label>

                    <input type="radio" name="Hora_Dispo" value="10:00-11:00">
                        <label for="Hora_Dispo">10:00-11:00</label>

                    <input type="radio" name="Hora_Dispo" value="11:00-12:00">
                        <label for="Hora_Dispo">11:00-12:00</label>
                        
                    <input type="radio" name="Hora_Dispo" value="15:00-16:00">
                        <label for="Hora_Dispo">15:00-16:00</label>

                    <input type="radio" name="Hora_Dispo" value="16:00-17:00">
                        <label for="Hora_Dispo">16:00-17:00</label>

                    <input type="radio" name="Hora_Dispo" value="17:00-18:00">
                        <label for="Hora_Dispo">17:00-18:00</label>

                    <input type="radio" name="Hora_Dispo" value="18:00-19:00">
                        <label for="Hora_Dispo">18:00-19:00</label>

                    <input type="radio" name="Hora_Dispo" value="19:00-20:00">
                        <label for="Hora_Dispo">19:00-20:00</label>
                        
                    <input type="radio" name="Hora_Dispo" value="20:00-21:00">
                        <label for="Hora_Dispo">20:00-21:00</label>

            </fieldset>
                        
                <div class="pie-form">
                    <a href="ListadoEspecialistas.php">Continuar</a>
                </div>   
            </div>   
        </div>
    <?php
    }  
    ?>      
</body>
</html>