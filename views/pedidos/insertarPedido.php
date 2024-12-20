<?php
require_once '../../models/PedidoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Instanciar el modelo de pedidos
    $pedidoModel = new PedidoModel();
    // Insertar el nuevo pedido con los datos proporcionados en el formulario
    $pedidoModel->insertarPedido(
        $_POST['fechaPedido'],
        $_POST['total'],
        $_POST['estado'],
        $_POST['estadoPago']
    );
    // Redirigir a la vista de pedidos después de insertar
    header('Location: PedidoView.php');
}
?>

<form method="POST">
    <label for="fechaPedido">Fecha de Pedido:</label>
    <input type="date" name="fechaPedido" placeholder="Fecha de Pedido" required>

    <label for="total">Total:</label>
    <input type="number" name="total" placeholder="Total" required>

    <label for="estado">Estado:</label>
    <select name="estado" required>
        <option value="Pendiente">Pendiente</option>
        <option value="Enviado">Enviado</option>
        <option value="Entregado">Entregado</option>
    </select>

    <label for="estadoPago">Estado de Pago:</label>
    <select name="estadoPago" required>
        <option value="Pendiente">Pendiente</option>
        <option value="Pagado">Pagado</option>
    </select>

    <button type="submit">Agregar Pedido</button>
</form>
