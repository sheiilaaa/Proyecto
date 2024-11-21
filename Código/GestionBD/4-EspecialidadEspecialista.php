<?php
    include ("1-conexion.php");
    
    $sql_EspEsp = "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
        VALUES
            ('1', '1');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('2', '2');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('3', '3');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('4', '4');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('5', '5');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('6', '6');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('7', '7');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('8', '8');";

    $sql_EspEsp .= "INSERT INTO ESPECIALISTA_ESPECIALIDAD (ID_Especialista_EspeEspe, ID_Especialidad_EspeEspe)
    VALUES
        ('9', '9');";

    $Resultado= mysqli_multi_query($conn, $sql_ESPECIALISTAS);

    if ($Resultado)
    {
        echo "9 ESPECIALISTAS añadidos correctamente";
        
    } 
    else 
    {
        echo "Error: " . $sql_ESPECIALISTAS . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>