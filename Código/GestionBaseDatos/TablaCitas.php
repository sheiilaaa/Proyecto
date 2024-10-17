<?php
    include ("conexion.php");
    
    $sql_Clientes = "CREATE TABLE IF NOT EXISTS CITAS (
	ID_Cita INT AUTO_INCREMENT PRIMARY KEY,
	FechaHora_Cita DATETIME NOT NULL,
	Duracion INT NOT NULL,
	Coste_Cita DECIMAL NOT NULL,

	/*Claves Foráneas*/
	ID_Especialista_Cita INT,
    ID_Cliente_Cita INT
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
