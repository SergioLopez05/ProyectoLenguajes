<?php
require_once '../../models/ProductoModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoModel = new ProductoModel();
    $productoModel->insertarProducto(
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['precio'],
        $_POST['stock'],
        $_POST['talla'],
        $_POST['color'],
        $_POST['idCategoria']
    );
    header('Location: ProductoView.php');
}

?>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <textarea name="descripcion" placeholder="Descripción" required></textarea>
    <input type="number" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <input type="text" name="talla" placeholder="Talla" required>
    <input type="text" name="color" placeholder="Color" required>
    <input type="number" name="idCategoria" placeholder="ID Categoría" required>
    <button type="submit">Agregar</button>
</form>
