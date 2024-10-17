<?php
    include ("conexion.php");

    $sql = "INSERT INTO ESPECIALISTAS (DNI_Especialista, NumTelefono_Especialista,Correo_Especialista, Nombre_Especialista,
                Apellido_Especialista, 	NombreVia_Especialista, NumeroVia_Especialista, TipoVia_Especialista,FechaNacimiento_Especialista,
                CuentaBancaria_Especialista, Cuota_Especialista)
            VALUES
                ('35710210X','634973323','jfranco@gmail.com','Jose', 'Franco', 'Tarragona','110','C/', '20/11/1997', 'ES1212341234120123456789', '90,85');";
    
    $sql .= "INSERT INTO ESPECIALISTAS (DNI_Especialista, NumTelefono_Especialista,Correo_Especialista, Nombre_Especialista,
                Apellido_Especialista, 	NombreVia_Especialista, NumeroVia_Especialista, TipoVia_Especialista,FechaNacimiento_Especialista,
                CuentaBancaria_Especialista, Cuota_Especialista)
            VALUES
                ('84276108A','649561795','sstone@gmail.com','Santiago', 'Stone', 'del Carrilet','114','Av.', '12/04/1995', 'ES2476831095714658203076', '75,15');";
    



    $sql .= "INSERT INTO ESPECIALISTAS (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
        VALUES ('Lena', 'Stone', 2000-01-02, '+34.600.00.02', 'url2', 'usuario2@mail.com', 'pwd2');";
    
    $sql .= "INSERT INTO ESPECIALISTAS (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Franklin', 'Ford', 2000-01-03, '+34.600.00.03', 'url3', 'usuario3@mail.com', 'pwd3');";

    $sql .= "INSERT INTO ESPECIALISTAS (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Anthony', 'Summers', 2000-01-04, '+34.600.00.04', 'url4', 'usuario1@mail.com', 'pwd4');";
    
    $sql .= "INSERT INTO ESPECIALISTAS (Nombre, Apellidos, Fecha_Nac, Telefono, URL, email, Contraseña)
    VALUES ('Albert', 'Sullivan', 2000-01-05, '+34.600.00.05', 'url5', 'usuario1@mail.com', 'pwd5');";

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