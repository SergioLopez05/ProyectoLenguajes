<?php
include_once 'db_connection.php'; // Incluye la función connection()

class ProductoModel
{
    private $conn;

    public function __construct()
    {
        // Utiliza la conexión global
        $this->conn = connection();
    }

    public function obtenerProductos() {
        $productos = [];
        
        // Procedimiento almacenado a utilizar
        $query = "BEGIN SP_OBTENER_PRODUCTOS(:cursor); END;";
        $stmt = oci_parse($this->conn, $query);
    
        // Declaración del cursor
        $cursor = oci_new_cursor($this->conn);
        oci_bind_by_name($stmt, ":cursor", $cursor, -1, OCI_B_CURSOR);
    
        // Ejecutar el procedimiento almacenado
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar el procedimiento almacenado: " . $m['message'];
            return $productos;
        }
    
        // Ejecutar el cursor
        if (!oci_execute($cursor)) {
            $m = oci_error($cursor);
            echo "Error al ejecutar el cursor: " . $m['message'];
            return $productos;
        }
    
        // Recuperar los datos del cursor
        while ($row = oci_fetch_assoc($cursor)) {
            $productos[] = $row;
        }
    
        // Liberar recursos
        oci_free_statement($cursor);
        oci_free_statement($stmt);
    
        return $productos;
    }
    

    public function insertarProducto($nombre, $descripcion, $precio, $stock, $talla, $color, $idCategoria) {
        $query = "BEGIN SP_INSERTAR_PRODUCTO(:nombre, :descripcion, :precio, :stock, :talla, :color, :idCategoria); END;";
        $stmt = oci_parse($this->conn, $query);

        oci_bind_by_name($stmt, ":nombre", $nombre);
        oci_bind_by_name($stmt, ":descripcion", $descripcion);
        oci_bind_by_name($stmt, ":precio", $precio);
        oci_bind_by_name($stmt, ":stock", $stock);
        oci_bind_by_name($stmt, ":talla", $talla);
        oci_bind_by_name($stmt, ":color", $color);
        oci_bind_by_name($stmt, ":idCategoria", $idCategoria);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al insertar el producto: " . $m['message'];
        }

        oci_free_statement($stmt);
    }

    public function actualizarProducto($idProducto, $nombre, $descripcion, $precio, $stock, $talla, $color, $idCategoria) {
        $query = "BEGIN SP_ACTUALIZAR_PRODUCTO(:idProducto, :nombre, :descripcion, :precio, :stock, :talla, :color, :idCategoria); END;";
        $stmt = oci_parse($this->conn, $query);
    
        oci_bind_by_name($stmt, ":idProducto", $idProducto);
        oci_bind_by_name($stmt, ":nombre", $nombre);
        oci_bind_by_name($stmt, ":descripcion", $descripcion);
        oci_bind_by_name($stmt, ":precio", $precio);
        oci_bind_by_name($stmt, ":stock", $stock);
        oci_bind_by_name($stmt, ":talla", $talla);
        oci_bind_by_name($stmt, ":color", $color);
        oci_bind_by_name($stmt, ":idCategoria", $idCategoria);
    
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al actualizar el producto: " . $m['message'];
        }
    
        oci_free_statement($stmt);
    }
    
    public function eliminarProducto($idProducto) {
        $query = "BEGIN SP_ELIMINAR_PRODUCTO(:idProducto); END;";
        $stmt = oci_parse($this->conn, $query);
    
        oci_bind_by_name($stmt, ":idProducto", $idProducto);
    
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al eliminar el producto: " . $m['message'];
        }
    
        oci_free_statement($stmt);
    }
    
    
    public function obtenerProductoPorId($idProducto) {
        $query = "SELECT * FROM productos WHERE IDPRODUCTO = :idProducto";
        $stmt = oci_parse($this->conn, $query);
    
        oci_bind_by_name($stmt, ":idProducto", $idProducto);
    
        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al obtener el producto: " . $m['message'];
            return null;
        }
    
        $producto = oci_fetch_assoc($stmt);
        oci_free_statement($stmt);
        return $producto;
    }
    


   
    // Obtener camisas
    public function obtenerProductosCamisa()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
        FROM productos
        WHERE idcategoria = 1";
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Pantalones
    public function obtenerProductosPantalon()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 2"; // Asumiendo que la categoría de pantalones tiene ID = 2
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Vestidos
    public function obtenerProductosVestido()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 3"; // Asumiendo que la categoría de vestidos tiene ID = 3
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Zapatos
    public function obtenerProductosZapato()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 4"; // Asumiendo que la categoría de zapatos tiene ID = 4
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Accesorios
    public function obtenerProductosAccesorio()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 5"; // Asumiendo que la categoría de accesorios tiene ID = 5
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Abrigos
    public function obtenerProductosAbrigo()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 6"; // Asumiendo que la categoría de abrigos tiene ID = 6
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Ropa Deportiva
    public function obtenerProductosRopaDeportiva()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 7"; // Asumiendo que la categoría de ropa deportiva tiene ID = 7
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Ropa Interior
    public function obtenerProductosRopaInterior()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 8"; // Asumiendo que la categoría de ropa interior tiene ID = 8
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Sombreros
    public function obtenerProductosSombrero()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 9"; // Asumiendo que la categoría de sombreros tiene ID = 9
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
    }

    // Obtener productos de Trajes
    public function obtenerProductosTraje()
    {
        $productos = [];
        $query = "SELECT IDPRODUCTO, NOMBRE, DESCRIPCION, PRECIO 
                  FROM productos
                  WHERE idcategoria = 10"; // Asumiendo que la categoría de trajes tiene ID = 10
        $stmt = oci_parse($this->conn, $query);

        if (!oci_execute($stmt)) {
            $m = oci_error($stmt);
            echo "Error al ejecutar la consulta: " . $m['message'];
            return $productos;
        }

        while ($row = oci_fetch_assoc($stmt)) {
            $productos[] = $row;
        }

        oci_free_statement($stmt);
        return $productos;
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




