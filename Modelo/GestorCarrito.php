<?php
class GestorCarrito
{
    public function crearCarrito($carrito)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $id_usuario = $carrito->obtenerIdUsuario();
        $fecha = $carrito->obtenerFecha();
        $estado = $carrito->obtenerEstado();
        $sql = "INSERT INTO carritos (usuario_id, fecha_creacion, estado) VALUES (" . ($id_usuario !== null ? "'$id_usuario'" : "NULL") . ", '$fecha', '$estado')";
        $conexion->consulta($sql);
        $carrito_id = $conexion->obtenerInsertId(); // Debes tener este método en tu clase Conexion
        $conexion->cerrar();
        return $carrito_id;
    }
    public function agregarProducto($carrito_id, $producto_id, $cantidad, $precio_unitario)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "INSERT INTO carrito_items (carrito_id, producto_id, cantidad, precio_unitario) 
            VALUES ('$carrito_id', '$producto_id', '$cantidad', '$precio_unitario')";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
    public function obtenerProductosCarrito($carrito_id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT productos.nombre, carrito_items.cantidad, carrito_items.precio_unitario
            FROM carrito_items
            JOIN productos ON carrito_items.producto_id = productos.id
            WHERE carrito_items.carrito_id = '$carrito_id'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $productos = [];
        while ($item = $result->fetch_assoc()) {
            $productos[] = $item;
        }
        $conexion->cerrar();
        return $productos;
    }

    
}

?>