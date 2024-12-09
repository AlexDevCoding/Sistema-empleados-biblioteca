<?php
include('conexión.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);
    $rol = $_POST['tipo_usuario'];
    $fecha = date('Y-m-d H:i:s');

    // Verificar si el usuario ya existe
    $checkUsuario = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = mysqli_prepare($conn, $checkUsuario);
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['success' => false, 'message' => 'El usuario ya existe']);
    } else {
        // Insertar nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, contrasena, rol, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $apellido, $usuario, $correo, $contrasena, $rol, $fecha);
        
        if (mysqli_stmt_execute($stmt)) {
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
        }
    }
}

mysqli_close($conn);
?>