<?php
include('../../Backend/conexión.php');
header('Content-Type: application/json');

if (isset($_POST['cedula']) && isset($_POST['fecha']) && isset($_POST['hora_entrada']) && isset($_POST['hora_salida']) && isset($_POST['estado'])) {
    
    $cedula = $_POST['cedula'];
    $fecha = $_POST['fecha'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];
    $estado = $_POST['estado'];
    
    $queryEmpleado = "SELECT id FROM empleados WHERE cedula_identidad = ?";
    $stmtEmpleado = $conn->prepare($queryEmpleado);
    $stmtEmpleado->bind_param("s", $cedula);
    $stmtEmpleado->execute();
    $resultEmpleado = $stmtEmpleado->get_result();
    
    if ($resultEmpleado->num_rows > 0) {
        $empleado = $resultEmpleado->fetch_assoc();
        $empleado_id = $empleado['id'];

        $queryAsistencia = "INSERT INTO asistencias (empleado_id, fecha, hora_entrada, hora_salida, estado) VALUES (?, ?, ?, ?, ?)";
        $stmtAsistencia = $conn->prepare($queryAsistencia);
        $stmtAsistencia->bind_param("issss", $empleado_id, $fecha, $hora_entrada, $hora_salida, $estado);
        
        if ($stmtAsistencia->execute()) {
            echo json_encode(['success' => true, 'message' => 'Asistencia registrada correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al registrar la asistencia']);
        }

    } else {
        echo json_encode(['success' => false, 'message' => 'Empleado no encontrado con la cédula proporcionada']);
    }

} else {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
}
?>