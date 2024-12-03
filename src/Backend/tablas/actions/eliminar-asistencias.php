<?php
include('../../conexión.php');

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $permisoId = intval($_POST['id']); // Sanitiza el ID recibido

    if ($permisoId) {
        $sql = "DELETE FROM asistencias WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $permisoId);
            $success = mysqli_stmt_execute($stmt);

            if ($success) {
                    echo json_encode(["success" => true, "message" => "Asistencia eliminada correctamente."]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al eliminar la asistencia: " . mysqli_error($conn)]);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo json_encode(["success" => false, "message" => "Error al preparar la consulta: " . mysqli_error($conn)]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "ID de asistencia inválido."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido."]);
}

mysqli_close($conn);
?>
