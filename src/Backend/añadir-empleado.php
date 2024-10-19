<?php

include 'conexión.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
        $campos = [
            'nombre_completo',
            'cedula_identidad',
            'puesto',
            'departamento',
            'estado'
        ];

   
        $data = array_map(function($campo) {
            return trim($_POST[$campo]);
        }, $campos);

    
        [$nombre_completo, $cedula_identidad, $puesto, $departamento, $estado] = $data;
        $fecha_ingreso = trim($_POST['fecha_ingreso']); 
        $telefono = !empty($_POST['telefono']) ? trim($_POST['telefono']) : NULL;


        if (empty($nombre_completo) || empty($cedula_identidad) || empty($puesto) || empty($departamento) || empty($fecha_ingreso) || empty($estado)) {
            throw new Exception("Todos los campos son obligatorios.");
        }

      
        $fecha_obj = DateTime::createFromFormat('d/m/Y', $fecha_ingreso);
        if (!$fecha_obj) {
            throw new Exception("Formato de fecha inválido. Use DD/MM/YYYY.");
        }
        $fecha_convertida = $fecha_obj->format('Y-m-d');

    
        $sql = "INSERT INTO empleados (nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssssss", $nombre_completo, $cedula_identidad, $puesto, $departamento, $fecha_convertida, $estado, $telefono);
            if ($stmt->execute()) {
                echo "Empleado añadido exitosamente.";
            } else {
                throw new Exception("Error al añadir el empleado: " . $stmt->error);
            }
            $stmt->close();
        } else {
            throw new Exception("Error al preparar la consulta: " . $conn->error);
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
   
    if (isset($conn)) {
        $conn->close();
    }
}
?>
