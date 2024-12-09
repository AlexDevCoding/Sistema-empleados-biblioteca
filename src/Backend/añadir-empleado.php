<?php
include 'conexión.php';
header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validar campos requeridos
        $campos = [
            'nombre_completo',
            'cedula_identidad',
            'puesto',
            'departamento',
            'estado'
        ];

        $data = array_map(function($campo) {
            return isset($_POST[$campo]) ? trim($_POST[$campo]) : '';
        }, $campos);

        [$nombre_completo, $cedula_identidad, $puesto, $departamento, $estado] = $data;
        $fecha_ingreso = isset($_POST['fecha_ingreso']) ? trim($_POST['fecha_ingreso']) : '';
        $telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : NULL;

        // Validación de campos vacíos
        if (empty($nombre_completo) || empty($cedula_identidad) || empty($puesto) || 
            empty($departamento) || empty($fecha_ingreso) || empty($estado)) {
            throw new Exception("Todos los campos son obligatorios.");
        }

        // Convertir formato de fecha
        $fecha_obj = DateTime::createFromFormat('m/d/Y', $fecha_ingreso);
        if (!$fecha_obj) {
            throw new Exception("Formato de fecha inválido.");
        }
        $fecha_convertida = $fecha_obj->format('Y-m-d');

        // Verificar empleado existente
        $check_sql = "SELECT COUNT(*) FROM empleados WHERE cedula_identidad = ?";
        $check_stmt = $conn->prepare($check_sql);
        $check_stmt->bind_param("s", $cedula_identidad);
        $check_stmt->execute();
        $check_stmt->bind_result($count);
        $check_stmt->fetch();
        $check_stmt->close();

        if ($count > 0) {
            echo json_encode([
                'success' => false, 
                'message' => 'El empleado ya existe en el sistema',
                'error_type' => 'duplicate'
            ]);
            exit;
        }

        // Insertar nuevo empleado
        $sql = "INSERT INTO empleados (nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $nombre_completo, $cedula_identidad, $puesto, $departamento, $fecha_convertida, $estado, $telefono);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Empleado registrado exitosamente'
            ]);
        } else {
            throw new Exception("Error al registrar el empleado: " . $stmt->error);
        }
        
        $stmt->close();
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'error_type' => 'general'
    ]);
} finally {
    if (isset($conn)) {
        $conn->close();
    }
}
?>