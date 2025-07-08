<?php
class GestorImagenesProducto
{
    public function ingresarProductoImg(imagenesProducto $productoImg)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $imagen = $productoImg->obtenerImagen();
        $id_producto = $productoImg->obtenerIdProducto();
        $sql = "INSERT INTO imagenes_producto VALUES (NULL, '$imagen', $id_producto)";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
    public function obtenerUltimoId()
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "SELECT MAX(id) as ultimo_id FROM imagenes_producto";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $conexion->cerrar();
        return $result[0]['ultimo_id'];
    }
}
