<?php
class GestorSesion
{
    public function iniciarSesion(Sesion $sesion)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $correo = $sesion->obtenerUsuario();
        $clave = $sesion->obtenerContrasena();
        $usuario = false;
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$clave'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $usuario = $result->fetch_object();
        $conexion->cerrar();
        return $usuario;
    }
    public function iniciarSesionCli(Sesion $sesion, $rol)
    {
        $conexion = new Conexion();
        $conexion->abrir();
        $correo = $sesion->obtenerUsuario();
        $clave = $sesion->obtenerContrasena();
        $usuario = false;
        $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$clave' AND rol = '$rol'";
        $conexion->consulta($sql);
        $result = $conexion->obtenerResult();
        $usuario = $result->fetch_object();
        $conexion->cerrar();
        return $usuario;
    }
}
