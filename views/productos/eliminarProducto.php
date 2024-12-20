<?php
require_once '../../models/ProductoModel.php';

if (isset($_GET['id'])) {
    $productoModel = new ProductoModel();
    $productoModel->eliminarProducto($_GET['id']);
    header('Location: ProductoView.php');
}
?>
