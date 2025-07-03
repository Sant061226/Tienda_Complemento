<?php
class Pedido
{
    private $usuario;
    private $producto;
    private $cantidad;
    private $fecha;

    public function __construct($usuario, $producto, $cantidad, $fecha)
    {
        $this->usuario = $usuario;
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->fecha = $fecha;
    }
    public function obtenerUsuario()
    {
        return $this->usuario;
    }
    public function obtenerProducto()
    {
        return $this->producto;
    }
    public function obtenerCantidad()
    {
        return $this->cantidad;
    }
    public function obtenerFecha()
    {
        return $this->fecha;
    }
}
