<?php
include('../../Backend/conexión.php');

if (isset($_GET['cedula'])) {
    $cedula = $_GET['cedula'];

    $query = "SELECT nombre_completo FROM empleados WHERE cedula_identidad = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $cedula);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $empleado = $result->fetch_assoc();
        echo json_encode(['nombre_completo' => $empleado['nombre_completo']]);
    } else {
        echo json_encode(['nombre_completo' => null]);
    }
} else {
    echo json_encode(['nombre_completo' => null]);
}
?>