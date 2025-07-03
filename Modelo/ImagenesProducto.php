<?php 

class imagenesProducto{
    // private $id;
    private $imagen;
    private $id_producto;

    public function __construct($imagen, $id_producto){
        // $this->id = $id;
        $this->imagen = $imagen;
        $this->id_producto = $id_producto;
    }

    // public function obtenerId()
    // {
    //     return $this->id;
    // }

    public function obtenerImagen()
    {
        return $this->imagen;
    }

    public function obtenerIdProducto()
    {
        return $this->id_producto;
    }
}

?>