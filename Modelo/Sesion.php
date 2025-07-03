<?php 
class Sesion {
    private $usuario;
    private $contrasena;

    public function __construct($usuario, $contrasena) {
        $this->usuario = $usuario;
        $this->contrasena = $contrasena;
    }
    public function obtenerUsuario(){
        return $this->usuario;
    }
    public function obtenerContrasena(){
        return $this->contrasena;
    }
}
?>