<?php
include('conexión.php');

$sql = "SELECT id, nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono FROM empleados";
$result = $conn->query($sql);

$empleados = []; // Array para almacenar los datos de los empleados

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row; // Agregar cada empleado al array
    }
}

// Establecer el encabezado para JSON
header('Content-Type: application/json');
echo json_encode($empleados); // Devolver los datos como JSON

$conn->close();
?>
