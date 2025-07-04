<?php
class GestorUsuario
{
    public function registroUsuario(Usuario $usuario)
    { {
            $conexion = new Conexion();
            $conexion->abrir();
            $nombre = $usuario->obtenerNombre();
            $correo = $usuario->obtenerCorreo();
            $contrasena = $usuario->obtenerContrasena();
            $hash = password_hash($contrasena, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios (id, nombre, correo, contrasena, rol) VALUES (NULL, '$nombre', '$correo', '$hash', 2)";
            $conexion->consulta($sql);
            $filasAfectadas = $conexion->obtenerFilasAfectadas();
            $conexion->cerrar();
        }
    }
}
