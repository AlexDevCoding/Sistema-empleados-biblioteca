<?php
include('../../Backend/conexión.php');

if (isset($_POST['cedula']) && isset($_POST['fecha']) && isset($_POST['hora_entrada']) && isset($_POST['hora_salida']) && isset($_POST['estado'])) {
    
    $cedula = $_POST['cedula'];
    $fecha = $_POST['fecha'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_salida = $_POST['hora_salida'];
    $estado = $_POST['estado'];
    
    $fecha_obj = DateTime::createFromFormat('d/m/Y', $fecha);
    if (!$fecha_obj) {
        echo "Formato de fecha inválido. Use DD/MM/YYYY.";
        exit;
    }
    $fecha_convertida = $fecha_obj->format('Y-m-d');
 
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
        $stmtAsistencia->bind_param("issss", $empleado_id, $fecha_convertida, $hora_entrada, $hora_salida, $estado);
        
        if ($stmtAsistencia->execute()) {
            echo "Asistencia registrada correctamente";
        } else {
            echo "Error al registrar la asistencia";
        }

    } else {
        echo "Empleado no encontrado con la cédula proporcionada";
    }

} else {
    echo "Todos los campos son obligatorios";
}
?>