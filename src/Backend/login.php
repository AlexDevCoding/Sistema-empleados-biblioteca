<?php
header('Content-Type: application/json');
include 'conexión.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contraseña'];

    $sql = "SELECT id, usuario, contrasena FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $usuario_db, $contrasena_hash);
        $stmt->fetch();

        if (password_verify($contrasena, $contrasena_hash)) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $usuario_db;
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Usuario no encontrado']);
    }

    $stmt->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}

$conn->close();
?>
