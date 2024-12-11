<?php
include('../../conexión.php');

header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    try {
        // Eliminar usuario
        $sql_usuario = "DELETE FROM usuarios WHERE id = ?";
        $stmt_usuario = $conn->prepare($sql_usuario);
        
        if (!$stmt_usuario) {
            throw new Exception('Error en la preparación de eliminación de usuario: ' . $conn->error);
        }
        
        $stmt_usuario->bind_param("i", $id);
        
        if (!$stmt_usuario->execute()) {
            throw new Exception('Error al eliminar usuario: ' . $stmt_usuario->error);
        }
        
        if ($stmt_usuario->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Usuario eliminado correctamente']);
        } else {
            throw new Exception('No se encontró el usuario');
        }
        
        $stmt_usuario->close();
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}

$conn->close();
?>