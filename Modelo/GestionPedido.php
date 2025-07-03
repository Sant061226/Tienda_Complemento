<?php
class GestorPedido
{
    public function ingresarPedido(Pedido $pedido)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $idus = $pedido->obtenerUsuario();
        $producto = $pedido->obtenerProducto();
        $cantidad = $pedido->obtenerCantidad();
        $fecha = $pedido->obtenerFecha();
        $sql = "INSERT INTO `pedidos` (`id`, `id_usuario`, `id_producto`, `cantidad`, `fecha`, `estado`) VALUES (NULL, '$idus', '$producto', '$cantidad', '$fecha', 'solicitado')";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
    }
}