<?php
header('Content-Type: application/json');
include('../../conexión.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();
    
    try {
        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            throw new Exception("ID inválido o no proporcionado.");
        }

        $id = $_POST['id'];
        $tipo = $_POST['tipo_permiso'] ?? null;
        $estado = $_POST['estado'] ?? null;
        $fechaInicio = $_POST['start'] ?? null;
        $fechaFin = $_POST['end'] ?? null;

        // Validar fechas
        if ($fechaInicio) {
            $fechaInicio = date('Y-m-d', strtotime($fechaInicio));
        }
        if ($fechaFin) {
            $fechaFin = date('Y-m-d', strtotime($fechaFin));
        }

        // Validar tipo de permiso
        $tiposPermitidos = ['Vacaciones', 'Permiso medico', 'Permiso personal'];
        if ($tipo && !in_array($tipo, $tiposPermitidos)) {
            throw new Exception("Tipo de permiso no válido");
        }

        // Validar estado
        $estadosPermitidos = ['Aprobado', 'Pendiente', 'Rechazado'];
        if ($estado && !in_array($estado, $estadosPermitidos)) {
            throw new Exception("Estado no válido");
        }

        // Construir la consulta SQL
        $sql = "UPDATE permisos SET ";
        $updateFields = [];
        $params = [];
        $types = '';

        if ($tipo) {
            $updateFields[] = "tipo_permiso = ?";
            $params[] = $tipo;
            $types .= 's';
        }
        if ($estado) {
            $updateFields[] = "estado = ?";
            $params[] = $estado;
            $types .= 's';
        }
        if ($fechaInicio) {
            $updateFields[] = "fecha_inicio = ?";
            $params[] = $fechaInicio;
            $types .= 's';
        }
        if ($fechaFin) {
            $updateFields[] = "fecha_fin = ?";
            $params[] = $fechaFin;
            $types .= 's';
        }

        if (empty($updateFields)) {
            throw new Exception("No hay campos para actualizar.");
        }

        $sql .= implode(', ', $updateFields);
        $sql .= " WHERE id = ?";
        $params[] = $id;
        $types .= 'i';

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            throw new Exception("Error en la preparación de la consulta: " . $conn->error);
        }

        $stmt->bind_param($types, ...$params);

        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Permiso actualizado correctamente.";
        } else {
            throw new Exception("Error al actualizar el permiso: " . $stmt->error);
        }

        $stmt->close();
        
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = $e->getMessage();
    }
    
    echo json_encode($response);
    exit;
}

// Si no es una petición POST
echo json_encode([
    'success' => false,
    'message' => "Método no permitido"
]);
exit;
?>