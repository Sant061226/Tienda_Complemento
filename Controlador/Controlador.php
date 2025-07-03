<?php
class Controlador
{
    // Carga una vista
    public function verPagina($ruta)
    {
        require_once $ruta;
    }

    // Inicia sesión de administrador
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

    // Cierra la sesión actual
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

    // Registra un nuevo producto
    public function nuevoProducto($nomprod, $especificaiones, $marca, $modelo, $precio, $category)
    {
        $gestionproducto = new GestorProducto();
        $producto = new Producto($nomprod, $especificaiones, $marca, $modelo, $precio, $category);
        $nuevoProd = $gestionproducto->ingresarProducto($producto);
        if ($nuevoProd) {
            echo "<script>alert('Error al registrar producto');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Producto registrado con exito');window.location='index.php?accion=panelAdmin'</script>";
        }
    }

    // Registra la imagen de un producto
    public function nuevoProductoImg($cover, $id_producto)
    {
        $gestionproducto = new GestorImagenesProducto();
        $productoImg = new imagenesProducto($cover, $id_producto);
        $nuevoProdImg = $gestionproducto->ingresarProductoImg($productoImg);
        if ($nuevoProdImg) {
            echo "<script>alert('Error al registrar imagen del producto');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Imagen del producto registrada con exito');window.location='index.php?accion=panelAdmin'</script>";
        }
    }

    // Edita la imagen de un producto
    public function editProductoImg($cover, $idpro)
    {
        $gestionproducto = new GestorImagenesProducto();
        $productoImg = new imagenesProducto($cover, $idpro);
        $nuevoProdImg = $gestionproducto->ingresarProductoImg($productoImg);
        if ($nuevoProdImg) {
            echo "<script>alert('Error al registrar imagen del producto');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Imagen del producto registrada con exito');window.location='index.php?accion=panelAdmin'</script>";
        }
    }

    // Edita un producto existente
    public function editarProducto($idprod, $editnom, $editespeci, $editmarca, $editmodelo, $editprecio, $category)
    {
        $gestionproducto = new GestorProducto();
        $filasAfectadas = $gestionproducto->editarProducto($idprod, $editnom, $editespeci, $editmarca, $editmodelo, $editprecio, $category);
        if ($filasAfectadas > 0) {
            echo "<script>alert('Producto editado con éxito');window.location='index.php?accion=panelAdmin'</script>";
        } else {
            echo "<script>alert('Error al editar el producto');window.location='index.php?accion=panelAdmin'</script>";
        }
    }

    // Carga la vista de edición de producto
    public function edit($id)
    {
        $gestionproducto = new GestorProducto();
        $result = $gestionproducto->edit($id);
        require_once "Vista/html/editarProducto.php";
    }

    // Carga la vista de edición de categoría
    public function editcat($id)
    {
        $gestioncategoria = new GestorCategoria();
        $result = $gestioncategoria->edit($id);
        require_once "Vista/html/editarCategoria.php";
    }

    // Muestra detalles de un producto para compra simulada
    public function ver($id)
    {
        $gestionproducto = new GestorProducto();
        $result = $gestionproducto->show($id);
        require_once "Vista/html/simcomp.php";
    }

    // Elimina un producto
    public function eliminarProducto($id)
    {
        $gestionproducto = new GestorProducto();
        $gestionproducto->borrarProducto($id);
    }

    // Registra una nueva categoría
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

    // Elimina una categoría
    public function eliminarCategoria($id)
    {
        $gestionproducto = new GestorCategoria();
        $gestionproducto->borrarCategoria($id);
    }

    // Simula la compra de un producto
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

    // Edita una categoría existente
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

    // Registra un nuevo usuario
    public function registroUsuario($nombre, $correo, $contrasena)
    {
        $gestion = new GestorUsuario();
        $usuario = new Usuario($nombre, $correo, $contrasena);
        $nuevoUs = $gestion->registroUsuario($usuario);
        if ($nuevoUs) {
            echo "<script>alert('Error al registrar usuario');window.location='index.php?accion=catalogo'</script>";
        } else {
            echo "<script>alert('Usuario registrado con exito');window.location='index.php?accion=catalogo'</script>";
        }
    }
}
