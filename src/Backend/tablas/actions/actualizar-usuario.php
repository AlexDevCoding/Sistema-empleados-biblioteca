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
        $nombre = $_POST['nombre'] ?? null;
        $apellido = $_POST['apellido'] ?? null;
        $usuario = $_POST['usuario'] ?? null;
        $nueva_contraseña = $_POST['nueva_contraseña'] ?? null;
        $rol = $_POST['tipo_usuario'] ?? null;

        // Construir la consulta SQL
        $sql = "UPDATE usuarios SET ";
        $updateFields = [];
        $params = [];
        $types = '';

        if ($nombre) {
            $updateFields[] = "nombre = ?";
            $params[] = $nombre;
            $types .= 's';
        }
        if ($apellido) {
            $updateFields[] = "apellido = ?";
            $params[] = $apellido;
            $types .= 's';
        }
        if ($usuario) {
            $updateFields[] = "usuario = ?";
            $params[] = $usuario;
            $types .= 's';
        }
        if ($nueva_contraseña) {
            $updateFields[] = "contrasena = ?";
            $params[] = password_hash($nueva_contraseña, PASSWORD_DEFAULT);
            $types .= 's';
        }
        if ($rol) {
            $updateFields[] = "rol = ?";
            $params[] = $rol;
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
            $response['message'] = "Usuario actualizado correctamente.";
        } else {
            throw new Exception("Error al actualizar el usuario: " . $stmt->error);
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