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
        $sql = "INSERT INTO `pedidos` (`id`, `id_usuario`, `id_producto`, `cantidad`, `fecha`, `estado`) VALUES (NULL, '$idus', '$producto', '$cantidad', '$fecha', NULL)";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
    }
    public function edit($id)
    {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "SELECT * FROM pedidos WHERE pedidos.id = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function editarPedido($idped, $editEst)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE pedidos SET estado = '$editEst' WHERE pedidos.id = $idped";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
}