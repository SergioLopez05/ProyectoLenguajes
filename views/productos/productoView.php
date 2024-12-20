<?php
require_once '../../models/ProductoModel.php';

// Obtener productos desde el modelo
$productoModel = new ProductoModel();
$productos = $productoModel->obtenerProductos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tienda de Ropa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/Administracion-Cafeteria/css/style.css">
</head>

<body>

<a href="../../index.php" class="btn btn-success">volver</a>



    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Gestión de Productos</h4>
                <h1 class="display-4">Lista de Productos</h1>
            </div>

            <div class="mb-3">
                <a href="insertarProducto.php" class="btn btn-success">Agregar Producto</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Talla</th>
                        <th>Color</th>
                        <th>Categoría</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($productos)): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?= htmlspecialchars($producto['IDPRODUCTO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['NOMBRE'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['DESCRIPCION'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['PRECIO'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['STOCK'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['TALLA'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['COLOR'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($producto['IDCATEGORIA'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td>
                                    <a href="actualizarProducto.php?id=<?= $producto['IDPRODUCTO'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                                    <a href="eliminarProducto.php?id=<?= $producto['IDPRODUCTO'] ?>"
                                        onclick="return confirm('¿Estás seguro de eliminar este producto?')"
                                        class="btn btn-danger btn-sm">Eliminar</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No hay productos disponibles en este momento.</td>
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