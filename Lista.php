<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Quienes estan regalando</title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    ul {
        list-style-type: none;
    }

    li {
        margin-bottom: 10px;
    }

    .selected {
        text-decoration: line-through;
        /*text-align: center;*/
    }
    </style>
</head>
<body>


<div class="container mt-4">
    <center><h1>Lista de Regalitos</h1> <b>(Amigos que regalaron)</b></center>
    <div class="row">
        <div class="col"><center><img src="mibabyshower.png" width="430"></center></div>
        <div class="col" >
<?php
$servername = "192.168.8.248";
$dbname = "babe2";
$username = "julio";
$password = "julio$100";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ?>
    

    <?php

    $sql = "SELECT id, nombre_producto, seleccionado ,nombre FROM productos_lista";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $selected = $row["seleccionado"] ? "selected" : "";
            echo  "<li class='$selected'>" .$row["id"].' - '.$row["nombre_producto"]." (".$row["nombre"].")</li>";
        }
        echo "</ul>";
    } else {
        echo "No hay productos en la lista.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

        </div>
    </div>
</div>

<!-- Incluir los archivos JavaScript de Bootstrap (jQuery y Popper.js son necesarios para algunos componentes) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
