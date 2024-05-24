<?php

    include_once("conexion.php");

    $celular = $_GET["celular"];

    $sql = "SELECT * FROM clientes where celular = ".$celular;
    $result = $conn->query($sql);

    $productos = array();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(["estado" => 1, "datos" => $row, "mensaje" => "Confirme los siguientes datos"]); 
    }else{
        echo json_encode(["estado" => 0, "datos" => null, "mensaje" => "Usted aun no esta registrado, por favor complete los siguientes datos"]);
    }
    $conn->close();
?>