<?php

    include_once("conexion.php");

    $categoria = $_GET['categoria'];

    $sql = "SELECT * FROM productos WHERE categoria  = '$categoria' order by descripcion DESC";
   
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
