<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include 'conexión.php';

try {
    // Verificar si el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // Filtrar y sanitizar los datos del formulario
        $nombre_completo = filter_var(trim($_POST['nombre_completo']), FILTER_SANITIZE_STRING);
        $cedula_identidad = filter_var(trim($_POST['cedula_identidad']), FILTER_SANITIZE_STRING);
        $puesto = filter_var(trim($_POST['puesto']), FILTER_SANITIZE_STRING);
        $departamento = filter_var(trim($_POST['departamento']), FILTER_SANITIZE_STRING);
        $fecha_ingreso = trim($_POST['fecha_ingreso']); // Fecha en formato DD/MM/YYYY
        $estado = filter_var(trim($_POST['estado']), FILTER_SANITIZE_STRING);
        $telefono = !empty($_POST['telefono']) ? filter_var(trim($_POST['telefono']), FILTER_SANITIZE_STRING) : NULL;

        // Validar que todos los campos requeridos estén presentes
        if (empty($nombre_completo) || empty($cedula_identidad) || empty($puesto) || empty($departamento) || empty($fecha_ingreso) || empty($estado)) {
            throw new Exception("Todos los campos son obligatorios.");
        }

        // Validar y convertir la fecha de DD/MM/YYYY a YYYY-MM-DD
        $fecha_obj = DateTime::createFromFormat('d/m/Y', $fecha_ingreso);
        if (!$fecha_obj) {
            throw new Exception("Formato de fecha inválido. Use DD/MM/YYYY.");
        }
        $fecha_convertida = $fecha_obj->format('Y-m-d');

        // Preparar la consulta SQL para insertar los datos en la tabla "empleados"
        $sql = "INSERT INTO empleados (nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Preparar la declaración
        if ($stmt = $conn->prepare($sql)) {

            // Enlazar los parámetros
            $stmt->bind_param("sssssss", $nombre_completo, $cedula_identidad, $puesto, $departamento, $fecha_convertida, $estado, $telefono);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Empleado añadido exitosamente.";
            } else {
                throw new Exception("Error al añadir el empleado: " . $stmt->error);
            }

            // Cerrar la declaración
            $stmt->close();
        } else {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
    }
} catch (Exception $e) {
    // Manejar excepciones y mostrar mensajes de error
    echo "Error: " . $e->getMessage();
} finally {
    // Cerrar la conexión
    if (isset($conn)) {
        $conn->close();
    }
}
?>
