<?php
    include ("conexion.php");
    
    $sql_Clientes = "CREATE TABLE IF NOT EXISTS CLIENTES (
        ID_Cliente INT AUTO_INCREMENT PRIMARY KEY,
        DNI_Cliente VARCHAR(9) UNIQUE NOT NULL,
        NumTelefono_Cliente INT(9) NOT NULL,
        Correo_Cliente VARCHAR(100) NOT NULL,
        Nombre_Cliente VARCHAR (100) NOT NULL,
        Apellido_Cliente VARCHAR (100) NOT NULL,

        NombreVia_Cliente VARCHAR(100) NULL,
        NumeroVia_Cliente INT (4) NULL,
        TipoVia_Cliente ENUM('C/', 'Paseo', 'Av.') NULL,
        FechaNacimiento_Cliente DATE NOT NULL
    );";

    $Resultado= mysqli_query($conn, $sql_Clientes);

    if ($Resultado)
    {
        echo "Tabla Clientes creada con exito";
    } else 
    {
        echo "Error creando la tabla: " . mysqli_error($conn);
    }
    
?>
