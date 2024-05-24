<?php

    include_once("conexion.php");

    $productos = json_decode($_POST["productos"]);
    $id_pedido = $_POST["id_pedido"];

    
    if($id_pedido != null){
        $sql = "UPDATE domicilios SET estado = 'Despachado' WHERE id = '$id_pedido'";
        $conn->query($sql);
    }
    

    foreach ($productos as $producto) {
        $existencia_nueva = $producto->existencia;
        $codigo_barras = $producto->codigo_barras;

        $sql = "UPDATE productos SET existencia = '$existencia_nueva' WHERE codigo_barras = '$codigo_barras'";
        $conn->query($sql);
    }

    echo json_encode(["mensaje" => "ok"]);
    
    $conn->close();

?>