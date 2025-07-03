<?php
class GestorImagenesProducto{
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
    }

}

?>