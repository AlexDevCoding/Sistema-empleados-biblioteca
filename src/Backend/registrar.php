<?php
include('conexión.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];
    $usuario = $_POST['Usuario'];
    $correo = $_POST['Correo'];
    $contrasena = password_hash($_POST['Contraseña'], PASSWORD_DEFAULT);
    $rol = $_POST['tipo_usuario'];

    
    $checkUsuario = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $checkUsuario);

    if (mysqli_num_rows($result) > 0) {
     
        echo json_encode(['success' => false, 'message' => 'El usuario ya existe.']);
    } else {
       
        $sql = "INSERT INTO usuarios (nombre, apellido, usuario, correo, contrasena, rol) 
                VALUES ('$nombre', '$apellido', '$usuario', '$correo', '$contrasena', '$rol')";

        if (mysqli_query($conn, $sql)) {
         
            echo json_encode(['success' => true, 'message' => 'Usuario registrado exitosamente.']);
        } else {
            
            echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
        }
    }
}

mysqli_close($conn);
?>
