<?php
    include ("conexion.php");

    $sql = "INSERT INTO ESPECIALISTAS (DNI_Especialista, NumTelefono_Especialista,Correo_Especialista, Nombre_Especialista,
                Apellido_Especialista, 	NombreVia_Especialista, NumeroVia_Especialista, TipoVia_Especialista,FechaNacimiento_Especialista,
                CuentaBancaria_Especialista, Cuota_Especialista)
            VALUES
                ('35710210X','634973323','jgil@gmail.com','Jose', 'Gil', 'Tarragona','110','C/', '20/11/1997', 'ES1212341234120123456789', '90,85'),
                ('84276108A','649561795','sstone@gmail.com','Santiago', 'Stone', 'del Carrilet','114','Av.', '12/04/1995', 'ES2476831095714658203076', '75,15'),
    
                ('55288172J','645057456','bstone@gmail.com','Blanca', 'Stone', 'de Cantàbria','12','C/', '12/04/1995', 'ES8188358801246553965472', '87,35'),

                ('58507369S','678952037','asuarez@gmail.com','Antonio', 'Suárez', 'del Comte Borrell','307','C/', '12/04/1995', 'ES8501517856703099748789', '6'),


                ('61156217E','696187474','ofernandez@gmail.com','Ona', 'Fernandez', 'de Leonardo da Vinci','24','C/', '12/04/1995', 'ES0420902044318259662746', '6'),

                ('58507369S','649561795','asuarez@gmail.com','Antonio', 'Suárez', 'de les Roses','','Pl', '12/04/1995', 'ES8501517856703099748789', '6'),

                ('58507369S','649561795','asuarez@gmail.com','Antonio', 'Suárez', 'de les Roses','','Pl', '12/04/1995', 'ES8501517856703099748789', '6'),

                ('58507369S','649561795','asuarez@gmail.com','Antonio', 'Suárez', 'de les Roses','','Pl', '12/04/1995', 'ES8501517856703099748789', '6'),

                ('58507369S','649561795','asuarez@gmail.com','Antonio', 'Suárez', 'de les Roses','','Pl', '12/04/1995', 'ES8501517856703099748789', '6'),

    $Resultado= mysqli_multi_query($conn, $sql_ESPECIALISTAS);

    if ($Resultado)
    {
        echo "5 ESPECIALISTAS añadidos correctamente";
        
    } 
    else 
    {
        echo "Error: " . $sql_ESPECIALISTAS . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
?>