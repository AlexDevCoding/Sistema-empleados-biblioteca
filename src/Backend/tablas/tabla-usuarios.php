<?php

include '../../Backend/conexión.php';


$query = "SELECT id, usuario, rol, fecha, nombre, apellido FROM usuarios";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['rol'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellido'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
       
     
    
  
      
       
       
        echo '<td class="celda">';
         
                    echo '<button onclick="editarEmpleado(' . htmlspecialchars($row['id']) . ')" class="boton"><i class="ti ti-pencil "></i></button>';
                    echo '<button onclick="if(confirm(\'¿Estás seguro de que deseas eliminar este empleado?\')) eliminarEmpleado(' . htmlspecialchars($row['id']) . ')" class="eliminar"><i class="ti ti-trash"></i></button>';
                    echo '</td>';
                    echo '</tr>';
    }
} else {
    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
}

// Cerrar la conexión
mysqli_close($conn);
?>