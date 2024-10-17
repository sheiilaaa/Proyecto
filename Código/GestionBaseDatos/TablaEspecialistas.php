<?php
    include ("conexion.php");
    
     $sql_Especialistas = "CREATE TABLE IF NOT EXISTS Especialistas (
    ID_Especialista INT AUTO_INCREMENT PRIMARY KEY, 
    DNI_Especialista VARCHAR(9) UNIQUE NOT NULL,
	Nombre_Especialista VARCHAR (100) NOT NULL,
	Apellido_Especialista VARCHAR (100) NOT NULL,
	NumTelefono_Especialista INT(9) NOT NULL,
	Correo_Especialista VARCHAR(100) NOT NULL,

	NombreVia_Especialista VARCHAR(100) NOT NULL,
	NumeroVia_Especialista INT (4) NOT NULL,
	TipoVia_Especialista ENUM('C/', 'Paseo', 'Av.') NOT NULL,

    FechaNacimiento_Especialista INT(8) NOT NULL,

	CuentaBancaria_Especialista INT(20) NOT NULL,/*ENCRIPTAR*/
	Cuota_Especialista DECIMAL NOT NULL

    );";

    $Resultado= mysqli_query($conn, $sql_Especialistas);

    if ($Resultado)
    {
        echo "Tabla Especialistas creada con exito";
    } else 
    {
        echo "Error creando la tabla: " . mysqli_error($conn);
    }
    
?>
