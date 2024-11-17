<?php

include('../../Backend/conexión.php'); 

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql = "SELECT p.id, e.nombre_completo, p.tipo_permiso, p.fecha_inicio, p.fecha_fin, p.estado
        FROM permisos p
        JOIN empleados e ON p.empleado_id = e.id
        ORDER BY p.fecha_inicio DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<tr><td colspan='5'>Error en la consulta: " . mysqli_error($conn) . "</td></tr>";
    exit;
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td class='  px-4 py-2'>" . htmlspecialchars($row["nombre_completo"]) . "</td>";
        echo "<td class='  px-4 py-2'>" . htmlspecialchars($row["tipo_permiso"]) . "</td>";
        echo "<td class='  px-4 py-2'>" . date('Y-m-d', strtotime($row["fecha_inicio"])) . "</td>";
        echo "<td class='  px-4 py-2'>" . date('Y-m-d', strtotime($row["fecha_fin"])) . "</td>";
        echo "<td class='  px-4 py-2'>" . htmlspecialchars($row["estado"]) . "</td>";
        echo '<td class="celda">';
         
        echo '<button onclick="editarEmpleado(' . htmlspecialchars($row['id']) . ')" class="boton"><i class="ti ti-pencil "></i></button>';
        echo '<button onclick="if(confirm(\'¿Estás seguro de que deseas eliminar este empleado?\')) eliminarEmpleado(' . htmlspecialchars($row['id']) . ')" class="eliminar"><i class="ti ti-trash"></i></button>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros de permisos.</td></tr>";
}

mysqli_close($conn);
?>
