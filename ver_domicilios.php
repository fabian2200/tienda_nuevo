<?php
    header("Access-Control-Allow-Origin: *");

    // Otros encabezados CORS opcionales
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Origin, Content-Type, Accept");
    include_once("conexion.php");

    $sql = "SELECT domicilios.*, clientes.nombre, clientes.direccion, clientes.celular FROM domicilios inner join clientes on clientes.id = domicilios.id_cliente where estado = 'Registrado' order by domicilios.id ASC";
    $result = $conn->query($sql);

    $domicilios = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id_domi = (int) $row['id'];
            $productos_array = array();
            $productos = $conn->query("SELECT * FROM productos_vendidos where id_domicilio = $id_domi");
            while($row2 = $productos->fetch_assoc()) {
                $productos_array[] = $row2;
            }
            $row["productos"] = $productos_array;
            $domicilios[] = $row;
        }
    }

    $json = json_encode($domicilios);
    echo $json;
    $conn->close();
?>