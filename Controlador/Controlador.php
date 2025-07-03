<?php
class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }
    public function inicioSesion($email, $password)
    {
        $gestionusuario = new GestorSesion();
        $sesion = new Sesion($email, $password);
        $usuario = $gestionusuario->iniciarSesion($sesion);
        if ($usuario) {
            $_SESSION["usuario"] = ($usuario->nombre);
            $_SESSION["correo"] = ($usuario->correo);
            $_SESSION["rol"] = ($usuario->rol);
            header("Location: index.php?accion=panelAdmin");
            exit();
        } else {
            echo "<script>alert('Correo o contraseña incorrecta');window.location='index.php?accion=logAdmin'</script>";
        }
    }
    public function cerrarSesion()
    {
        if (isset($_SESSION['usuario']) && isset($_SESSION['correo']) && isset($_SESSION['rol'])) {
            unset($_SESSION['usuario']);
            unset($_SESSION['correo']);
            unset($_SESSION['rol']);
        }
        session_destroy();
        header("Location:index.php");
        exit();
    }
    public function nuevoProducto($nomprod, $especificaiones, $marca, $modelo, $precio, $category)
    {
        $gestionproducto = new GestorProducto();
        $producto = new Producto($nomprod, $especificaiones, $marca, $modelo, $precio, $category);
        $nuevoProd = $gestionproducto->ingresarProducto($producto);
        return $nuevoProd;
    }
    public function nuevoProductoImg($cover, $id_producto)
    {
        $gestionproducto = new GestorImagenesProducto();
        $productoImg = new imagenesProducto($cover, $id_producto);
        $nuevoProdImg = $gestionproducto->ingresarProductoImg($productoImg);
        if ($nuevoProdImg) {
            echo "<script>alert('Producto registrado con exito');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Error al registrar producto');window.location='index.php?accion=panelAdmin'</script>";
            
        }
    }

    public function edit($id)
    {
        $gestionproducto = new GestorProducto();
        $result = $gestionproducto->edit($id);
        require_once "Vista/html/editarProducto.php";
    }
    public function editcat($id)
    {
        $gestioncategoria= new GestorCategoria();
        $result = $gestioncategoria->edit($id);
        require_once "Vista/html/editarCategoria.php";
    }
    public function ver($id){
        $gestionproducto = new GestorProducto();
        $result = $gestionproducto->show($id);
        require_once "Vista/html/simcomp.php";
    }
    public function eliminarProducto($id)
    {
        $gestionproducto = new GestorProducto();
        $gestionproducto->borrarProducto($id);
    }
    public function ingresarCategoria($nomcat)
    {
        $gestioncategoria = new GestorCategoria();
        $categoria = new Categoria($nomcat);
        $nuevaCat = $gestioncategoria->ingresarCategoria($categoria);
        if ($nuevaCat) {
            echo "<script>alert('Error al registrar categoria');window.location='index.php?accion=panelAdmin1'</script>";
        } else {
            echo "<script>alert('Categoria registrada con exito');window.location='index.php?accion=panelAdmin1'</script>";
        }
    }
    public function eliminarCategoria($id)
    {
        $gestionproducto = new GestorCategoria();
        $gestionproducto->borrarCategoria($id);
    }
    public function compraSimulada($idusuario, $idproducto, $fechaped, $cantiped)
    {
        $gestionpedido = new GestorPedido();
        $pedido = new Pedido($idusuario, $idproducto, $cantiped, $fechaped);
        $nuevoPed = $gestionpedido->ingresarPedido($pedido);
        if ($nuevoPed) {
            echo "<script>alert('Error al registrar el pedido');window.location='index.php?accion=catalogo'</script>";
        } else {
            echo "<script>alert('Pedido registrado con exito');window.location='index.php?accion=catalogo'</script>";
        }
    }
    public function editarProducto($idprod, $editnom, $editprecio, $edittalla, $category, $edcover)
    {
        $gestionproducto = new GestorProducto();
        $filasAfectadas = $gestionproducto->editarProducto($idprod, $editnom, $editprecio, $edittalla, $category, $edcover);
        if ($filasAfectadas > 0) {
            echo "<script>alert('Producto editado con éxito');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Error al editar el producto');window.location='index.php?accion=panelAdmin'</script>";
        }
    }
    public function editarCategoria($idcat, $editnomcat)
    {
        $gestioncategoria = new GestorCategoria();
        $filasAfectadas = $gestioncategoria->editarCategoria($idcat, $editnomcat);
        if ($filasAfectadas > 0) {
            echo "<script>alert('Categoria editada con éxito');window.location='index.php?accion=panelAdmin1'</script>";
        } else {
            echo "<script>alert('Error al editar la categoria');window.location='index.php?accion=panelAdmin1'</script>";
        }
    }
    public function registroUsuario($nombre, $correo, $contrasena)
    {
        $gestion = new GestorUsuario();
        $usuario = new Usuario ($nombre, $correo, $contrasena);
        $nuevoUs = $gestion->registroUsuario($usuario);
        if ($nuevoUs) {
            echo "<script>alert('Error al registrar usuario');window.location='index.php?accion=catalogo'</script>";
        } else {
            echo "<script>alert('Usuario registrado con exito');window.location='index.php?accion=catalogo'</script>";
        }
    }
    public function obtenerUltimoId()
    {
        $gestionproducto = new GestorImagenesProducto();
        return $gestionproducto->obtenerUltimoId();
    }
}
