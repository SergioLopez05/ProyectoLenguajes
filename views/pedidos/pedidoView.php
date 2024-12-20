<?php
require_once '../../models/PedidoModel.php';

// Obtener pedidos desde el modelo
$pedidoModel = new PedidoModel();
$pedidos = $pedidoModel->obtenerPedidos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Gestión de Pedidos</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Administracion-Cafeteria/css/style.css">
</head>

<body>

<a href="../../index.php" class="btn btn-success">Volver</a>

    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Gestión de Pedidos</h4>
                <h1 class="display-4">Lista de Pedidos</h1>
            </div>

            <div class="mb-3">
                <a href="insertarPedido.php" class="btn btn-success">Agregar Pedido</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Fecha Pedido</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Estado de Pago</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pedidos)): ?>
                        <?php foreach ($pedidos as $pedido): ?>
                            <tr>
                                <td><?= htmlspecialchars($pedido['IDPEDIDO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($pedido['FECHAPEDIDO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($pedido['TOTAL'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($pedido['ESTADO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($pedido['ESTADOPAGO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="actualizarPedido.php?id=<?= $pedido['IDPEDIDO'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                                    <a href="eliminarPedido.php?id=<?= $pedido['IDPEDIDO'] ?>"
                                        onclick="return confirm('¿Estás seguro de eliminar este pedido?')"
                                        class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay pedidos disponibles en este momento.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
