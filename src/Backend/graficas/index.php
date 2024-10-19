<?php
header('Content-Type: application/json');
include '../conexión.php'; 


$query = "SELECT departamento, COUNT(*) as total FROM empleados GROUP BY departamento";
$result = mysqli_query($conn, $query);

$departamentos = [];
$totales = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $departamentos[] = $row['departamento']; 
        $totales[] = (int)$row['total']; 
    }
}


echo json_encode([
    'departamentos' => $departamentos,
    'totales' => $totales
]);
?>