<?php
include_once 'db_connection.php'; // Incluye la función de conexión

class PedidoModel {
    private $conn;

    public function __construct() {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    // Obtener todos los pedidos
    public function obtenerPedidos() {
        $pedidos = [];
        $query = "SELECT * FROM pedidos";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al obtener los pedidos: " . $m['message'];
            return $pedidos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $pedidos[] = $row;
        }

        oci_free_statement($stmt);
        return $pedidos;
    }

    // Insertar un nuevo pedido
    public function insertarPedido($fechaPedido, $total, $estado, $metodoPago, $estadoPago) {
        $query = "BEGIN SP_INSERTAR_PEDIDO(:fechaPedido, :total, :estado, :metodoPago, :estadoPago); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":fechaPedido", $fechaPedido);
        oci_bind_by_name($stmt, ":total", $total);
        oci_bind_by_name($stmt, ":estado", $estado);
        oci_bind_by_name($stmt, ":metodoPago", $metodoPago);
        oci_bind_by_name($stmt, ":estadoPago", $estadoPago);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el pedido: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Actualizar un pedido
    public function actualizarPedido($idPedido, $estado, $estadoPago) {
        $query = "BEGIN SP_ACTUALIZAR_PEDIDO(:idPedido, :estado, :estadoPago); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":idPedido", $idPedido);
        oci_bind_by_name($stmt, ":estado", $estado);
        oci_bind_by_name($stmt, ":estadoPago", $estadoPago);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el pedido: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    // Obtener pedido por ID
    public function obtenerPedidoPorId($idPedido) {
        $query = "SELECT * FROM pedidos WHERE idPedido = :idPedido";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":idPedido", $idPedido);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al obtener el pedido: " . $m['message'];
            return null;
        }

        $pedido = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $pedido;
    }


    // Eliminar un pedido
public function eliminarPedido($idPedido) {
    $query = "BEGIN SP_ELIMINAR_PEDIDO(:idPedido); END;";
    $stmt = oci_parse($this->conn, $query);

    oci_bind_by_name($stmt, ":idPedido", $idPedido);

    if (!oci_execute($stmt)) {
        $m = oci_error($stmt);
        echo "Error al eliminar el pedido: " . $m['message'];
    }

    oci_free_statement($stmt);
}

}
?>
