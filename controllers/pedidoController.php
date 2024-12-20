<?php
include_once '../models/PedidoModel.php'; // Asegúrate de ajustar la ruta según tu proyecto

class PedidoController {

    // Mostrar todos los pedidos
    public function mostrarPedidos() {
        $pedidoModel = new PedidoModel();
        $pedidos = $pedidoModel->obtenerPedidos();
        
        // Asegúrate de que la vista pueda recibir $pedidos
        include_once '../views/pedidosView.php'; // Vista que mostrará los pedidos
    }

    // Insertar un nuevo pedido
    public function insertarPedido($fechaPedido, $total, $estado, $metodoPago, $estadoPago) {
        $pedidoModel = new PedidoModel();
        $pedidoModel->insertarPedido($fechaPedido, $total, $estado, $metodoPago, $estadoPago);
        
        // Redirige después de insertar
        header('Location: ../views/menu.php'); 
    }

    // Actualizar un pedido
    public function actualizarPedido($idPedido, $estado, $estadoPago) {
        $pedidoModel = new PedidoModel();
        $pedidoModel->actualizarPedido($idPedido, $estado, $estadoPago);
        
        // Redirige después de actualizar
        header('Location: ../views/menu.php');
    }

    // Mostrar un pedido por ID
    public function mostrarPedidoPorId($idPedido) {
        $pedidoModel = new PedidoModel();
        $pedido = $pedidoModel->obtenerPedidoPorId($idPedido);
        
        // Asegúrate de que la vista pueda recibir $pedido
        include_once '../views/pedidoDetalleView.php'; // Vista para mostrar detalles del pedido
    }

    // Eliminar un pedido
public function eliminarPedido($idPedido) {
    $pedidoModel = new PedidoModel();
    $pedidoModel->eliminarPedido($idPedido);

    // Redirige después de eliminar
    header('Location: ../views/menu.php');
}

}
?>
