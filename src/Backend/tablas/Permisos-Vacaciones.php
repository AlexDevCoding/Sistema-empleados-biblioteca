<?php
  include('../../Backend/conexión.php'); // Asegúrate de tener un archivo para la conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    // Validar los datos aquí si es necesario

    $sql = "INSERT INTO permisos_vacaciones (nombre, tipo_permiso, fecha_inicio, fecha_fin) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $category, $start, $end);

    if ($stmt->execute()) {
        echo "Permiso añadido exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>