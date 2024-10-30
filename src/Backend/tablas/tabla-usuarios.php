<?php

include '../../Backend/conexión.php';


$query = "SELECT id, usuario, rol FROM usuarios";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['rol'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
        
        echo "<td>
                <a href='editar.php?id=" . $row['id'] . "'>Editar</a>
                <a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay usuarios registrados.</td></tr>";
}

// Cerrar la conexión
mysqli_close($conn);
?>