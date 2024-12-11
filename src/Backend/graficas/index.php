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

// Consulta de cantidad de empleados por departamento
$query = "SELECT departamento, COUNT(*) as total FROM empleados GROUP BY departamento";
$result = ejecutarConsulta($conn, $query);

// Consulta de total de empleados
$totalEmpleadosQuery = "SELECT COUNT(*) as total FROM empleados";
$totalResult = ejecutarConsulta($conn, $totalEmpleadosQuery);
$totalEmpleados = mysqli_fetch_assoc($totalResult)['total'];

// Consulta de total de asistencias
$totalAsistenciasQuery = "SELECT COUNT(*) as total FROM asistencias";
$totalAsistenciasResult = ejecutarConsulta($conn, $totalAsistenciasQuery);
$totalAsistencias = mysqli_fetch_assoc($totalAsistenciasResult)['total'];

// Consulta de total de permisos
$totalPermisosQuery = "SELECT COUNT(*) as total FROM permisos";
$totalPermisosResult = ejecutarConsulta($conn, $totalPermisosQuery);
$totalPermisos = mysqli_fetch_assoc($totalPermisosResult)['total'];

// Calcular la tasa de asistencias
$tasaAsistencias = ($totalEmpleados > 0) ? ($totalAsistencias / $totalEmpleados) * 100 : 0;

// Consulta de cantidad de empleados activos
$empleadosActivosQuery = "SELECT COUNT(*) as total FROM empleados WHERE estado = 'Activo'";
$empleadosActivosResult = ejecutarConsulta($conn, $empleadosActivosQuery);
$empleadosActivos = mysqli_fetch_assoc($empleadosActivosResult)['total'];

$departamentos = [];
$totales = [];

// Almacenar los resultados por departamento
while ($row = mysqli_fetch_assoc($result)) {
    $departamentos[] = $row['departamento']; 
    $totales[] = (int)$row['total']; 
}

// Devolver todos los datos en formato JSON
echo json_encode([
    'departamentos' => $departamentos,
    'totales' => $totales,
    'totalEmpleados' => $totalEmpleados,
    'totalAsistencias' => $totalAsistencias,
    'tasaAsistencias' => round($tasaAsistencias, 2),
    'empleadosActivos' => $empleadosActivos,
    'totalPermisos' => $totalPermisos
]);
?>

