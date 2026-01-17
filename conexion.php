<?php

    $servername = "localhost";
    $username = "provisio_root";
    $password = "domicilios2026@";
    $dbname = "provisio_domicilios_bd";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

?>