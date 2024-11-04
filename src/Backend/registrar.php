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

    $checkUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $checkUsuario);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['success' => false, 'message' => 'El usuario ya existe.']);
    } else {
        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, contrasena, rol, fecha) 
                VALUES ('$nombre', '$apellido', '$usuario', '$correo', '$contrasena', '$rol', '$fecha')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
        }
    }
}

mysqli_close($conn);
?>