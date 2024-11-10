<?php
header('Content-Type: application/json');
include 'conexión.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['Usuario'];
    $contrasena = $_POST['Contraseña'];

    $sql = "SELECT id, usuario, contrasena, rol FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $usuario_db, $contrasena_hash, $rol);
        $stmt->fetch();

        if (password_verify($contrasena, $contrasena_hash)) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $usuario_db;
            $_SESSION['rol'] = $rol;

          
            if ($rol == 'Administrador') {
                $redirect_url = '../templates/admin/tablero-admin.php';
            } elseif ($rol == 'Empleado') {
                $redirect_url = '../templates/empleado/tablero-empleados.php'; 
            }

            echo json_encode(['status' => 'success', 'rol' => $rol, 'redirect_url' => $redirect_url]);
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
