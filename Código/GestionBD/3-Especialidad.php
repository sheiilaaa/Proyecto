<?php
    include ("conexion.php");

    $sql_ESPECIALIDAD = "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
        VALUES
            ('Coaching Empresarial');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
        VALUES
            ('Coaching Ontológico');";
    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
    ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";
            
    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $sql_ESPECIALIDAD .= "INSERT INTO ESPECIALIDAD (Especialidad_Especialista)
    VALUES
        ('Coaching Ontológico');";

    $Resultado= mysqli_multi_query($conn, $sql_ESPECIALIDAD);

    if ($Resultado)
    {
        echo "9 ESPECIALIDADES añadidas correctamente";
        
    } 
    else 
    {
        echo "Error: " . $sql_ESPECIALIDAD . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>