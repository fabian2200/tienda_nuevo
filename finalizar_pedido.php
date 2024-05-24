<?php
    include_once("conexion.php");

    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $registrado = $_POST["registrado"];
    $celular = $_POST["celular"];
    $total_pagar = $_POST["total_pagar"];
    $metodo_pago = $_POST["metodo_pago"];
    $carrito = json_decode($_POST["carrito"], true);

    if($registrado == 0){
        $sql = "INSERT INTO clientes (nombre, celular, direccion) VALUES ('$nombre','$celular','$direccion')";
    }else{
        $sql = "UPDATE clientes SET nombre = '$nombre', direccion = '$direccion' where celular = $celular";
    }

    $conn->query($sql);
    
    $sql = "SELECT * FROM clientes where celular = ".$celular;
    $result = $conn->query($sql);
    $cliente = $result->fetch_assoc();

    $fecha = date('d/m/Y');
    $id_cliente = $cliente["id"];

    $sql = "INSERT INTO `domicilios`(`id_cliente`, `total_pagar`, `fecha_domi`, `metodo_pago`) VALUES ('$id_cliente','$total_pagar','$fecha', '$metodo_pago')";
    $conn->query($sql);

    
    $id_pedido = $conn->insert_id;

    foreach ($carrito as $item) {
        $descripcion = $item["descripcion"];
        $codigo_barras = $item["codigo_barras"];
        $precio = $item["precio"];
        $cantidad = $item["cantidad"];
        $unidad = $item["unidad"];

        $sql = "INSERT INTO `productos_vendidos`(`id_domicilio`, `descripcion`, `codigo_barras`, `precio`, `cantidad`,  `unidad`) VALUES ('$id_pedido','$descripcion','$codigo_barras', '$precio', '$cantidad', '$unidad')";
        $conn->query($sql);
    }
    
    echo "¡Pedido realizado correctamente!";
?>