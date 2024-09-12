<?php

$sql = "SELECT id, nombre_producto, seleccionado FROM productos_lista";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        $selected = $row["seleccionado"] ? "selected" : "";
        echo "<li class='$selected'>" . $row["nombre_producto"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No hay productos en la lista.";
}

?>