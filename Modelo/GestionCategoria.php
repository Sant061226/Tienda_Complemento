<?php 
class GestorCategoria{
    public function ingresarCategoria(Categoria $categoria){
        $conexion = new Conexion();
        $conexion->abrir();
        $nombre = $categoria->obtenerNombre();
        $sql = "INSERT INTO categorias (id, nombre) VALUES ( NULL, '$nombre')";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
    }
    public function borrarCategoria($id){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "DELETE FROM categorias WHERE id = $id";
        $conexion->consulta($sql);
        $conexion->cerrar();
    }
    public function edit($id)
    {
        $Conexion = new Conexion();
        $Conexion->abrir();
        $sql = "SELECT * FROM categorias WHERE id = $id";
        $Conexion->consulta($sql);
        $result = $Conexion->obtenerResult();
        $Conexion->cerrar();
        return $result;
    }
    public function editarCategoria($idcat, $editnomcat)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "UPDATE categorias SET nombre='$editnomcat' WHERE id = $idcat";
        $conexion->consulta($sql);
        $filasAfectadas = $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;
    }
}
?>