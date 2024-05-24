<?php

    include_once("conexion.php");

    $codigo_producto = $_POST["codigo_producto"];
    $existencia = $_POST["existencia"];
    $precio_compra = $_POST["precio_compra"];
    $precio_venta = $_POST["precio_venta"];

    $sql = "UPDATE productos SET existencia = '$existencia', precio_compra = '$precio_compra', precio_venta = '$precio_venta' WHERE codigo_barras = '$codigo_producto'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();

?>