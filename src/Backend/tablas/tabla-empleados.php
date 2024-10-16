<?php
            include('../Backend/conexión.php');

            $sql = "SELECT id, nombre_completo, cedula_identidad, puesto, departamento, fecha_ingreso, estado, telefono FROM empleados";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Iterar sobre los resultados y crear filas en el tbody de la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['nombre_completo']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['cedula_identidad']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['puesto']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['departamento']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['fecha_ingreso']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['telefono']) . '</td>';
                    echo '<td class="celda">';
                    // Botones de acción con iconos
                    echo '<button onclick="editarEmpleado(' . htmlspecialchars($row['id']) . ')" class="boton"><i class="ti ti-pencil "></i></button>';
                    echo '<button onclick="if(confirm(\'¿Estás seguro de que deseas eliminar este empleado?\')) eliminarEmpleado(' . htmlspecialchars($row['id']) . ')" class="eliminar"><i class="ti ti-trash"></i></button>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="8">No se encontraron empleados.</td></tr>'; // Mensaje si no hay resultados
            }

            $conn->close();
            ?>