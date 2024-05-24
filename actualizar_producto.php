<?php

    include_once("conexion.php");

    $codigo_anterior = $_POST["codigo_anterior"];
    $codigo_nuevo = $_POST["codigo_nuevo"];

    $sql = "UPDATE productos SET codigo_barras = '$codigo_nuevo' WHERE codigo_barras = '$codigo_anterior'";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();

?>