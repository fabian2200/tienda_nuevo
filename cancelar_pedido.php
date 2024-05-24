<?php
    header("Access-Control-Allow-Origin: *");

    // Otros encabezados CORS opcionales
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");
    
    include_once("conexion.php");

    $id = $_GET["id"];

    $sql = "UPDATE domicilios SET estado = 'Cancelado' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => 1, "mensaje" => "Pedido cancelado correctamente"]);
    } else {
        echo json_encode(["status" => 0, "mensaje" => "Error al actualizar el registro: " . $conn->error]);
    }
?>