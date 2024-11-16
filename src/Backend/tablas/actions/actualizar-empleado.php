<?php
include('../../conexión.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = array();
    
    $id = $_GET['id'];
    $nombre = $_POST['nombre_completo'];
    $cedula = $_POST['cedula_identidad'];
    $puesto = $_POST['puesto'];
    $departamento = $_POST['departamento'];
    $fecha_ingreso = $_POST['fecha_ingreso'];
    $estado = $_POST['estado'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE empleados 
            SET nombre_completo = ?, cedula_identidad = ?, puesto = ?, departamento = ?, fecha_ingreso = ?, estado = ?, telefono = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssi', $nombre, $cedula, $puesto, $departamento, $fecha_ingreso, $estado, $telefono, $id);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = "Empleado actualizado correctamente";
    } else {
        $response['success'] = false;
        $response['message'] = "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>