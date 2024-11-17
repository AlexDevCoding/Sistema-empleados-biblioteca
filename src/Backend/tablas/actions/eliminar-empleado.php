<?php
include('../../conexión.php');

header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]);
    exit;
}

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    
    $conn->begin_transaction();
    
    try {
        // Eliminar permisos relacionados
        $sql_permisos = "DELETE FROM permisos WHERE empleado_id = ?";
        $stmt_permisos = $conn->prepare($sql_permisos);
        
        if (!$stmt_permisos) {
            throw new Exception('Error en la preparación de eliminación de permisos: ' . $conn->error);
        }
        
        $stmt_permisos->bind_param("i", $id);
        $stmt_permisos->execute();
        $stmt_permisos->close();
        
        // Eliminar asistencias relacionadas
        $sql_asistencias = "DELETE FROM asistencias WHERE empleado_id = ?";
        $stmt_asistencias = $conn->prepare($sql_asistencias);
        
        if (!$stmt_asistencias) {
            throw new Exception('Error en la preparación de eliminación de asistencias: ' . $conn->error);
        }
        
        $stmt_asistencias->bind_param("i", $id);
        $stmt_asistencias->execute();
        $stmt_asistencias->close();
        
        // Eliminar empleado
        $sql_empleado = "DELETE FROM empleados WHERE id = ?";
        $stmt_empleado = $conn->prepare($sql_empleado);
        
        if (!$stmt_empleado) {
            throw new Exception('Error en la preparación de eliminación de empleado: ' . $conn->error);
        }
        
        $stmt_empleado->bind_param("i", $id);
        
        if (!$stmt_empleado->execute()) {
            throw new Exception('Error al eliminar empleado: ' . $stmt_empleado->error);
        }
        
        if ($stmt_empleado->affected_rows > 0) {
            $conn->commit();
            echo json_encode(['success' => true, 'message' => 'Empleado y sus registros relacionados eliminados correctamente']);
        } else {
            throw new Exception('No se encontró el empleado');
        }
        
        $stmt_empleado->close();
        
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'ID no proporcionado']);
}

$conn->close();
?>