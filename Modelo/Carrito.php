<?php
class Carrito
{
    public $id_usuario;

    public $Fecha;
 
    public $estado;

    public function __construct($id_usuario, $Fecha, $estado)
    {
        $this->id_usuario = $id_usuario;
        $this->Fecha = $Fecha;
        $this->estado = $estado;
    }

    public function obtenerIdUsuario()
    {
        return $this->id_usuario;
    }

    public function obtenerFecha()
    {
        return $this->Fecha;
    }

    public function obtenerEstado()
    {
        return $this->estado;
    }

}

?>