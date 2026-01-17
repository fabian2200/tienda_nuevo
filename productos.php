<?php

    include_once("conexion.php");

    $conn->set_charset("utf8mb4");

    $filtro = trim($_GET['filtro']);

    if ($filtro == "inicial") {
        $sql = "SELECT * FROM productos LIMIT 50";
    } else {
        $filtro = $conn->real_escape_string($filtro);
        $sql = "
            SELECT * 
            FROM productos 
            WHERE LOWER(descripcion) LIKE '%" . strtolower($filtro) . "%'
            AND existencia > 0
        ";
    }

   
    $result = $conn->query($sql);
    $productos = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    $json = json_encode($productos);
    echo $json;
    $conn->close();
?>
