<?php
require_once '../../models/ProductoModel.php';

$productoModel = new ProductoModel();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productoModel->actualizarProducto(
        $_POST['id'],
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

$producto = $productoModel->obtenerProductoPorId($_GET['id']);
?>

<form method="POST">
    <input type="hidden" name="id" value="<?= $producto['IDPRODUCTO'] ?>">
    <input type="text" name="nombre" value="<?= $producto['NOMBRE'] ?>" required>
    <textarea name="descripcion" required><?= $producto['DESCRIPCION'] ?></textarea>
    <input type="number" name="precio" value="<?= $producto['PRECIO'] ?>" required>
    <input type="number" name="stock" value="<?= $producto['STOCK'] ?>" required>
    <input type="text" name="talla" value="<?= $producto['TALLA'] ?>" required>
    <input type="text" name="color" value="<?= $producto['COLOR'] ?>" required>
    <input type="number" name="idCategoria" value="<?= $producto['IDCATEGORIA'] ?>" required>
    <button type="submit">Actualizar</button>
</form>
