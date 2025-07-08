<?php
class GestorProducto
{
    public function ingresarProducto(Producto $producto)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $nombre = $producto->obtenerNombre();
        $especificaciones = $producto->obtenerEspicificaciones();
        $marca = $producto->obtenerMarca();
        $modelo = $producto->obtenerModelo();
        $precio = $producto->obtenerPrecio();
        $categoria = $producto->obtenerCategoria();
        $sql = "INSERT INTO productos (nombre, especificaciones, marca, modelo, precio, id_categoria) VALUES ('$nombre', '$especificaciones', '$marca', '$modelo', '$precio', '$categoria')";
        $conexion->consulta($sql);
        $idInsertado = $conexion->obtenerInsertId();
        $conexion->cerrar();
        return $idInsertado;
    }
    public function borrarProducto($id)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "DELETE FROM productos WHERE id = $id";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
    public function edit($id)
    {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.marca, productos.modelo, productos.precio, categorias.nombre as Categoria from productos join categorias on productos.id_categoria=categorias.id WHERE productos.id = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function editarProducto($idprod, $editnom, $editespeci, $editmarca, $editmodelo, $editprecio, $category)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE productos SET nombre='$editnom', especificaciones='$editespeci', marca='$editmarca', modelo='$editmodelo', precio='$editprecio', id_categoria='$category' WHERE productos.id = $idprod";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
    public function show($id)
    {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.marca, productos.modelo, productos.modelo, productos.precio, categorias.nombre as Categoria from productos join categorias on productos.id_categoria=categorias.id WHERE productos.id = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
}
