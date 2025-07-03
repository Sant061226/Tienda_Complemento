<?php
class Producto
{
    private $nombre;
    private $espicifaciones;
    private $marca;
    private $modelo;
    private $precio;
    private $categoria;

    public function __construct($nombre, $espicifaciones, $marca, $modelo, $precio, $categoria)
    {
        $this->nombre = $nombre;
        $this->espicifaciones = $espicifaciones;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->precio = $precio;
        $this->categoria = $categoria;
    }
    // public function obtenerId()
    // {
    //     return $this->id;
    // }
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerEspicifaciones()
    {
        return $this->espicifaciones;
    }
    public function obtenerMarca()
    {
        return $this->marca;
    }
    public function obtenerModelo()
    {
        return $this->modelo;
    }
    public function obtenerPrecio()
    {
        return $this->precio;
    }
    public function obtenerCategoria()
    {
        return $this->categoria;
    }
}
