<?php
class Usuario
{
    private $nombre;
    private $correo;
    private $contrasena;

    public function __construct($nombre, $correo, $contrasena)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }
    public function obtenerNombre()
    {
        return $this->nombre;
    }
    public function obtenerCorreo()
    {
        return $this->correo;
    }
    public function obtenerContrasena()
    {
        return $this->contrasena;
    }
}
