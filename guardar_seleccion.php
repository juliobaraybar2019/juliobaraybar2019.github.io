<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Baby Shower</title>
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
        text-decoration: underline;
        /*text-align: center;*/
    }
    </style>
</head>
<body>


<div class="container mt-4">
    
    <div class="row">
        <div class="col"><center><img src="babygracias.jpg" ></center></div>
        <center><a href="http://mobileapp.induquimica.com.pe/randoms/babe/" class="btn btn-secondary">Regresar</a></center>
<?php
$servername = "192.168.8.248";
$dbname = "babe2";
$username = "julio";
$password = "julio$100";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productoId = $_POST["producto"];
        $nombre = $_POST["nombre"];

        $sql = "UPDATE productos_lista SET seleccionado = 1,nombre= '".$nombre."' WHERE id = $productoId";
        $conn->query($sql);
        //echo $sql;
        // if ($conn->query($sql) === TRUE) {
        //     echo "<center>Guardado Correctamente</center>";
        // } else {
        //     echo "Error al guardar la selección: " . $conn->error;
        // }
    }

    $conn= null;

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

        
    </div>
</div>

<!-- Incluir los archivos JavaScript de Bootstrap (jQuery y Popper.js son necesarios para algunos componentes) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
