<?php
    include ("conexion.php");

    $sql = "INSERT INTO ESPECIALISTAS (DNI_Especialista, Nombre_Especialista, Apellido_Especialista, FechaNacimiento_Especialista, NumTelefono_Especialista, Correo_Especialista,
        TipoVia_Especialista, NombreVia_Especialista, NumeroVia_Especialista, CuentaBancaria_Especialista, Cuota_Especialista, Contrasena_Especialista)
        VALUES
            ('35710210X', 'Jose', 'Gil', '20/11/1997', '634973323', 'jgil@gmail.com', 'C/','Tarragona', '110', 'ES1212341234120123456789', '90,85'),

            ('84276108A', 'Santiago', 'Lopez', '12/04/1995', '649561795', 'slopez@gmail.com', 'Av.', 'del Carrilet', '114', 'ES2476831095714658203076', '75,15'),

            ('55288172J', 'Blanca', 'Martinez', '31/10/1986', '605403214','bmartinez@gmail.com', 'C/', 'de Cantàbria', '12', 'ES8188358801246553965472', '87,35'),

            ('58507369S', 'Antonio', 'Suárez', '17/10/1993', '678952037','asuarez@gmail.com', 'C/', 'del Comte Borrell', '307', 'ES8501517856703099748789', '99,99'),

            ('61156217E', 'Cecilia', 'Fernandez', '26/05/1985', '696187474', 'cfernandez@gmail.com', 'C/', 'de Leonardo da Vinci', '24', 'ES0420902044318259662746', '120,05'),

            ('17801516E','Víctor', 'Herrera', '03/12/1991', '668954318', 'vherrera@gmail.com', 'Pl', 'de les Roses', '', 'ES6520565729624448284452', '97,00'),

            ('25899345B', 'Natalia', 'Gutierrez', '20/03/1987', '668436584', 'ngutierrez@gmail.com', 'C/', 'del Doctor Figarola', '16', 'ES3401043936410285983437', '88,88'),

            ('36987937G', 'Alicia', 'Torres', '27/04/1995', '665412001', 'atorres@gmail.com', 'C/', 'dels Pensaments', '1', 'ES3301313873110191038048', '92,15'),

            ('40441106E', 'Sergio', 'Diaz', '08/11/1983', '651300210', 'sdiaz@gmail.com', 'C/', 'de les Delicies', '31', 'C/', 'ES7301087926891955150150', '110,28');";

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