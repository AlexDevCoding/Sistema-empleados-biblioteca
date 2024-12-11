<?php
include '../conexión.php';
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 0);

try {
    $tipo_reporte = $_GET['tipo_reporte'] ?? '';
    $periodo = $_GET['periodo'] ?? '';

    if (empty($tipo_reporte) || empty($periodo)) {
        throw new Exception("Parámetros incompletos");
    }

    $fecha_inicio = '';
    $fecha_fin = '';

    if ($periodo == "Diario") {
        $fecha_inicio = date('Y-m-d');
        $fecha_fin = date('Y-m-d');
    } else if ($periodo == "Mensual") {
        $fecha_inicio = date('Y-m-01');
        $fecha_fin = date('Y-m-t');
    }

    $sql = "";
    switch ($tipo_reporte) {
        case "empleados":
            $sql = "SELECT nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado 
                   FROM empleados 
                   WHERE fecha_ingreso BETWEEN ? AND ?";
            break;
            
        case "asistencias":
            $sql = "SELECT e.nombre_completo, DATE_FORMAT(a.fecha, '%Y-%m-%d') as fecha, 
                    TIME_FORMAT(a.hora_entrada, '%H:%i') as hora_entrada, 
                    TIME_FORMAT(a.hora_salida, '%H:%i') as hora_salida, 
                    a.estado 
                    FROM asistencias a
                    JOIN empleados e ON a.empleado_id = e.id 
                    WHERE a.fecha BETWEEN ? AND ?";
            break;
                        
        case "permisos":
            $sql = "SELECT e.nombre_completo, p.tipo_permiso, 
                    DATE_FORMAT(p.fecha_inicio, '%Y-%m-%d') as fecha_inicio, 
                    DATE_FORMAT(p.fecha_fin, '%Y-%m-%d') as fecha_fin, 
                    p.estado 
                    FROM permisos p
                    JOIN empleados e ON p.empleado_id = e.id 
                    WHERE p.fecha_inicio BETWEEN ? AND ?";
            break;
            
        default:
            throw new Exception("Tipo de reporte no válido");
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $fecha_inicio, $fecha_fin);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    
    if (empty($data)) {
        echo json_encode(["mensaje" => "No hay datos para el período seleccionado"]);
    } else {
        echo json_encode($data);
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>