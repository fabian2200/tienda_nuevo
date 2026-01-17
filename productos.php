<?php

    include_once("conexion.php");

    $filtro = $_GET['filtro'];

    if($filtro == "inicial"){
        $sql = "SELECT * FROM productos limit 50";
    }else{
        $sql = "SELECT * FROM productos WHERE descripcion LIKE '%$filtro%' and existencia > 0";
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
