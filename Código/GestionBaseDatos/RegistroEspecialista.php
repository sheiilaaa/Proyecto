<?php
    include ("conexion.php");

    $sql = "INSERT INTO ESPECIALISTAS (DNI_Especialista, NumTelefono_Especialista,Correo_Especialista, Nombre_Especialista,
                Apellido_Especialista, 	NombreVia_Especialista, NumeroVia_Especialista, TipoVia_Especialista,FechaNacimiento_Especialista,
                CuentaBancaria_Especialista, Cuota_Especialista)
            VALUES
                ('35710210X','634973323','jgil@gmail.com','Jose', 'Gil', 'Tarragona','110','C/', '20/11/1997', 'ES1212341234120123456789', '90,85'),
                
                ('84276108A','649561795','slopez@gmail.com','Santiago', 'Lopez', 'del Carrilet','114','Av.', '12/04/1995', 'ES2476831095714658203076', '75,15'),

                ('55288172J','605403214','bmartinez@gmail.com','Blanca', 'Martinez', 'de Cantàbria','12','C/', '31/10/1986', 'ES8188358801246553965472', '87,35'),

                ('58507369S','678952037','asuarez@gmail.com','Antonio', 'Suárez', 'del Comte Borrell','307','C/', '17/10/1993', 'ES8501517856703099748789', '99,99'),

                ('61156217E','696187474','cfernandez@gmail.com','Cecilia', 'Fernandez', 'de Leonardo da Vinci','24','C/', '26/05/1985', 'ES0420902044318259662746', '120,05'),

                ('17801516E','668954318','vherrera@gmail.com','Víctor', 'Herrera', 'de les Roses','','Pl', '03/12/1991', 'ES6520565729624448284452', '97,00'),

                ('25899345B','668436584','ngutierrez@gmail.com','Natalia', 'Gutierrez', 'del Doctor Figarola','16','C/', '20/03/1987', 'ES3401043936410285983437', '88,88'),

                ('36987937G','665412001','atorres@gmail.com','Alicia', 'Torres', 'dels Pensaments','1','C/', '27/04/1995', 'ES3301313873110191038048', '92,15'),

                ('40441106E','651300210','sdiaz@gmail.com','Sergio', 'Diaz', 'de les Delicies','31','C/', '08/11/1983', 'ES7301087926891955150150', '110,28'),

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