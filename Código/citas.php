<?php
$servername = getenv('DB_SERVER') ?: 'localhost';
$username = getenv('DB_USER') ?: 'Cache3815';
$password = getenv('DB_PASS') ?: 'z1fVrI&ZVfyonsZ';
$dbname = getenv('DB_NAME') ?: 'COACHING';

// Configuración de la conexión a la base de datos
$conn = new mysqli("localhost", "Cache3815", "z1fVrI&ZVfyonsZ", "COACHING");

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del cliente (usuario) desde la URL
$id_cliente = '1' ?? null;
$mes = $_GET['mes'] ?? date('n');  // Obtener el mes, por defecto es el mes actual
$año = $_GET['año'] ?? date('Y');  // Obtener el año, por defecto es el año actual

if (!$id_cliente) {
    die(json_encode(["error" => "No se proporcionó el ID del cliente."]));
}

// Consulta para obtener las citas ocupadas del cliente para el mes y año especificados
$sql = "SELECT c.Fecha_Cita, c.Hora_Cita, e.Nombre_Especialista, e.Apellido_Especialista
        FROM CITAS c
        JOIN ESPECIALISTAS e ON c.ID_Especialista_Cita = e.ID_Especialista
        WHERE c.ID_Cliente_Cita = ? AND MONTH(c.Fecha_Cita) = ? AND YEAR(c.Fecha_Cita) = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $id_cliente, $mes, $año);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Retornar el JSON
header('Content-Type: application/json');
echo json_encode($data);
$stmt->close();
$conn->close();
?>
