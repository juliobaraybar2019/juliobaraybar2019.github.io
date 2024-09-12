<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Regalitos - Baby Shower</title>
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
    <center><h1>Bienvenido a mi Lista de Regalitos</h1> <b>(Selecciona tu regalito en la parte de abajo)</b></center>
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
    <form method="POST" action="guardar_seleccion.php">
      <div class="row mt-2">
        <div class="col-6 mb-2"><label for="producto">Selecciona mi regalito:</label></div>
        <div class="col-6 mb-2">
    
    <select name="producto" id="producto" style="width:210px; height: 40px;" required>
      <option selected value="">Selecciona...</option>
        <?php
        $sql1 = "SELECT id, nombre_producto FROM productos_lista where seleccionado = 0";
        $stmt1 = $conn->query($sql1);


        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $selected = $row["seleccionado"] ? "selected" : "";
            echo "<option value='" . $row["id"] . "'>"  .$row["id"].' - '. $row["nombre_producto"] . "</option>";
        }
        ?>
    </select>
        </div>
        <div class="col-6 mb-2"><label for="nombre">Tu nombre:</label></div>
        <div class="col-6 mb-2"><input type="text" name="nombre" id="nombre"  style="width:210px; height: 40px;" required></div>
        <div class="col-6 mb-2"></div>
        <div class="col-6 mb-2"><input type="submit" value="Guardar selección"  style="width:210px; height: 40px;"></div>
      </div>
    
</form>

    <?php

    $sql = "SELECT id, nombre_producto, seleccionado FROM productos_lista";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $selected = $row["seleccionado"] ? "selected" : "";
            echo  "<li class='$selected'>" .$row["id"].' - '.$row["nombre_producto"]. "</li>";
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
