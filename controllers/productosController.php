<?php
include_once '../models/ProductoModel.php'; // Asegúrate de ajustar la ruta según tu proyecto

class ProductoController {

    // Mostrar todos los productos
    public function mostrarProductos() {
        $productoModel = new ProductoModel();
        $productos = $productoModel->obtenerProductos();
        
        // Asegúrate de que la vista pueda recibir $productos
        include_once '../views/productosView.php'; // Vista que mostrará los productos
    }

    // Insertar un nuevo producto
    public function insertarProducto($nombre_producto, $precio, $stock, $id_categoria) {
        $productoModel = new ProductoModel();
        $productoModel->insertarProducto($nombre_producto, $precio, $stock, $id_categoria);
        
        // Redirige al menú principal después de insertar
        header('Location: ../views/menu.php'); 
    }

    // Actualizar un producto
    public function actualizarProducto($id_producto, $nombre_producto, $precio, $stock, $id_categoria) {
        $productoModel = new ProductoModel();
        $productoModel->actualizarProducto($id_producto, $nombre_producto, $precio, $stock, $id_categoria);
        
        // Redirige al menú principal después de actualizar
        header('Location: ../views/menu.php');
    }

    // Eliminar un producto
    public function eliminarProducto($id_producto) {
        $productoModel = new ProductoModel();
        $productoModel->eliminarProducto($id_producto);
        
        // Redirige al menú principal después de eliminar
        header('Location: ../views/menu.php');
    }

    // Mostrar un producto por ID
    public function mostrarProductoPorId($id_producto) {
        $productoModel = new ProductoModel();
        $producto = $productoModel->obtenerProductoPorId($id_producto);
        
        // Asegúrate de que la vista pueda recibir $producto
        include_once '../views/productoDetalleView.php'; // Vista para mostrar detalles del producto
    }
}
?>
