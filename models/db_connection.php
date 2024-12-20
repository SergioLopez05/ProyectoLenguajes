<?php
function connection() {


    $conn = oci_connect("tienda_ventas", "tienda_ventas", "localhost/orcl","AL32UTF8");

    if (!$conn) {
        $m = oci_error();
        echo "Error al conectar a la base de datos: " . $m['message'];
        exit;
    }

    return $conn;
}
?>
