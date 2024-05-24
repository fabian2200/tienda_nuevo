<?php

    include_once("conexion.php");

    $producto = json_decode($_POST["producto"]);

    $sql = "UPDATE `productos` SET `descripcion`='$producto->descripcion',`categoria`='$producto->categoria',`precio_compra`=$producto->precio_compra,`precio_venta`=$producto->precio_venta,`existencia`=$producto->existencia,`unidad_medida`='$producto->unidad_medida',`imagen`='$producto->imagen' WHERE `codigo_barras` = '$producto->codigo_barras'";

    if ($conn->query($sql) === TRUE) {
        echo json_decode("Registro actualizado correctamente");
    } else {
        echo json_decode("Error al actualizar el registro: " . $conn->error);
    }

    $conn->close();

?>