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
        $fecha = $_POST['fecha'] ?? null;
        $hora_entrada = $_POST['hora_entrada'] ?? null;
        $hora_salida = $_POST['hora_salida'] ?? null;
        $estado = $_POST['estado'] ?? null;

        // Validar fecha
        if ($fecha) {
            $fecha = date('Y-m-d', strtotime($fecha));
        }

        // Validar horas
        if ($hora_entrada) {
            $hora_entrada = date('H:i:s', strtotime($hora_entrada));
        }
        if ($hora_salida) {
            $hora_salida = date('H:i:s', strtotime($hora_salida));
        }

        // Validar estado
        $estadosPermitidos = ['A tiempo', 'Tardanza', 'Ausente'];
        if ($estado && !in_array($estado, $estadosPermitidos)) {
            throw new Exception("Estado no válido. Los estados permitidos son: A tiempo, Tardanza, Ausente");
        }

        // Construir la consulta SQL
        $sql = "UPDATE asistencias SET ";
        $updateFields = [];
        $params = [];
        $types = '';

        if ($fecha) {
            $updateFields[] = "fecha = ?";
            $params[] = $fecha;
            $types .= 's';
        }
        if ($hora_entrada) {
            $updateFields[] = "hora_entrada = ?";
            $params[] = $hora_entrada;
            $types .= 's';
        }
        if ($hora_salida) {
            $updateFields[] = "hora_salida = ?";
            $params[] = $hora_salida;
            $types .= 's';
        }
        if ($estado) {
            $updateFields[] = "estado = ?";
            $params[] = $estado;
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
            $response['message'] = "Asistencia actualizada correctamente.";
        } else {
            throw new Exception("Error al actualizar la asistencia: " . $stmt->error);
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