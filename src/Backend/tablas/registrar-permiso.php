<?php
include('../../Backend/conexión.php');

if (isset($_POST['cedula']) && isset($_POST['tipo_permiso']) && isset($_POST['start']) && isset($_POST['end'])) {
    
    $cedula = $_POST['cedula'];
    $tipo_permiso = $_POST['tipo_permiso'];
    $fecha_inicio = $_POST['start'];
    $fecha_fin = $_POST['end'];
    
    // Convertir fechas al formato correcto
    $fecha_inicio_obj = DateTime::createFromFormat('m/d/Y', $fecha_inicio);
    $fecha_fin_obj = DateTime::createFromFormat('m/d/Y', $fecha_fin);
    
    if (!$fecha_inicio_obj || !$fecha_fin_obj) {
        echo "Formato de fecha inválido. Use MM/DD/YYYY.";
        exit;
    }
    
    $fecha_inicio_convertida = $fecha_inicio_obj->format('Y-m-d');
    $fecha_fin_convertida = $fecha_fin_obj->format('Y-m-d');

    // Buscar el ID del empleado usando la cédula
    $queryEmpleado = "SELECT id FROM empleados WHERE cedula_identidad = ?";
    $stmtEmpleado = $conn->prepare($queryEmpleado);
    $stmtEmpleado->bind_param("s", $cedula);
    $stmtEmpleado->execute();
    $resultEmpleado = $stmtEmpleado->get_result();
    
    if ($resultEmpleado->num_rows > 0) {
        $empleado = $resultEmpleado->fetch_assoc();
        $empleado_id = $empleado['id'];

        // Insertar el permiso
        $queryPermiso = "INSERT INTO permisos (empleado_id, tipo_permiso, fecha_inicio, fecha_fin, estado) VALUES (?, ?, ?, ?, 'Pendiente')";
        $stmtPermiso = $conn->prepare($queryPermiso);
        $stmtPermiso->bind_param("isss", $empleado_id, $tipo_permiso, $fecha_inicio_convertida, $fecha_fin_convertida);
        
        if ($stmtPermiso->execute()) {
            echo "Permiso registrado correctamente";
        } else {
            echo "Error al registrar el permiso";
        }

    } else {
        echo "Empleado no encontrado con la cédula proporcionada";
    }

} else {
    echo "Todos los campos son obligatorios";
}
?>