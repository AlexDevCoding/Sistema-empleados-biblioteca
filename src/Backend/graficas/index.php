<?php
header('Content-Type: application/json');
include '../conexión.php'; 


function ejecutarConsulta($conn, $query) {
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo json_encode(['error' => 'Error en la consulta: ' . mysqli_error($conn)]);
        exit;
    }
    return $result;
}


$query = "SELECT departamento, COUNT(*) as total FROM empleados GROUP BY departamento";
$result = ejecutarConsulta($conn, $query);


$totalEmpleadosQuery = "SELECT COUNT(*) as total FROM empleados";
$totalResult = ejecutarConsulta($conn, $totalEmpleadosQuery);
$totalEmpleados = mysqli_fetch_assoc($totalResult)['total'];


$totalAsistenciasQuery = "SELECT COUNT(*) as total FROM asistencias";
$totalAsistenciasResult = ejecutarConsulta($conn, $totalAsistenciasQuery);
$totalAsistencias = mysqli_fetch_assoc($totalAsistenciasResult)['total'];


$tasaAsistencias = ($totalEmpleados > 0) ? ($totalAsistencias / $totalEmpleados) * 100 : 0;

$departamentos = [];
$totales = [];

while ($row = mysqli_fetch_assoc($result)) {
    $departamentos[] = $row['departamento']; 
    $totales[] = (int)$row['total']; 
}

echo json_encode([
    'departamentos' => $departamentos,
    'totales' => $totales,
    'totalEmpleados' => $totalEmpleados,
    'totalAsistencias' => $totalAsistencias,
    'tasaAsistencias' => round($tasaAsistencias, 2) // Redondear a 2 decimales
]);
?>