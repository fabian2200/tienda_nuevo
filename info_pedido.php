<?php

    header("Access-Control-Allow-Origin: *");

    // Otros encabezados CORS opcionales
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");
    include_once("conexion.php");

    $id_pedido = $_GET["id_pedido"];

    $sql = "SELECT domicilios.*, clientes.nombre, clientes.direccion, clientes.celular FROM domicilios inner join clientes on clientes.id = domicilios.id_cliente where domicilios.id = $id_pedido";
    $result = $conn->query($sql);


    $row = $result->fetch_assoc();
        
    $id_domi = (int) $row['id'];
    
    $productos_array = array();
    $productos = $conn->query("SELECT * FROM productos_vendidos where id_domicilio = $id_domi");
    while($row2 = $productos->fetch_assoc()) {
        $productos_array[] = $row2;
    }

    $row["productos"] = $productos_array;
    
    echo json_encode($row);
    $conn->close();
?>