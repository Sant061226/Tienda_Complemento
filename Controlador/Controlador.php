<?php
class Controlador
{
    // Carga una vista
    public function verPagina($ruta)
    {
        require_once $ruta;
    }

    // Inicia sesión de administrador
    public function inicioSesion($email, $password, $rol)
    {
        $gestionusuario = new GestorSesion();
        $sesion = new Sesion($email, $password);
        $usuario = $gestionusuario->iniciarSesion($sesion, $rol);
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
    public function inicioSesionCli($email, $password, $rolCli)
    {
        $gestionusuario = new GestorSesion();
        $sesion = new Sesion($email, $password);
        $usuario = $gestionusuario->iniciarSesionCli($sesion, $rolCli);
        if ($usuario) {
            $_SESSION["idusuario"] = $usuario->id;
            $_SESSION["usuario"] = ($usuario->nombre);
            $_SESSION["correo"] = ($usuario->correo);
            $_SESSION["rol"] = ($usuario->rol);
            // MODIFIQUE
            if (isset($_GET['redirigir']) && $_GET['redirigir'] == 'carrito') {
                header("Location: index.php?accion=verCarrito");
                exit();
            }



            header("Location: index.php?accion=catalogo");
            exit();

        } else {
            echo "<script>alert('Correo o contraseña incorrecta');window.location='index.php?accion=catalogo'</script>";
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

    // Edita la imagen de un producto
    public function editProductoImg($cover, $idpro)
    {
        $gestionproducto = new GestorImagenesProducto();
        $productoImg = new imagenesProducto($cover, $idpro);
        $gestionproducto->ingresarProductoImg($productoImg);
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

    // Carga la vista de edición de Estado Pedido
    public function editEsta($id)
    {
        $gestionPedido = new GestorPedido();
        $result = $gestionPedido->edit($id);
        require_once "Vista/html/editarEstado.php";
    }

    public function editarEstado($idped, $editEst)
    {
        $gestionpedido = new GestorPedido();
        $filasAfectadas = $gestionpedido->editarPedido($idped, $editEst);
        if ($filasAfectadas > 0) {
            echo "<script>alert('Estado editado con éxito');window.location='index.php?accion=panelAdmin2'</script>";
        } else {
            echo "<script>alert('Error al editar el estado');window.location='index.php?accion=panelAdmin2'</script>";
        }
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
    public function compraSimulada($idusuario, $idproducto, $cantiped, $fechaped, )
    {
        if (!$idusuario && isset($_SESSION['idusuario'])) {
            $idusuario = $_SESSION['idusuario'];
        }
        $gestionpedido = new GestorPedido();
        $pedido = new Pedido($idusuario, $idproducto, $cantiped, $fechaped);
        $nuevoPed = $gestionpedido->ingresarPedido($pedido);
        if ($nuevoPed) {
            echo "<script>alert('Error al cargar el pedido');window.location='index.php?accion=catalogo'</script>";
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
    public function obtenerUltimoId()
    {
        $gestionproducto = new GestorImagenesProducto();
        return $gestionproducto->obtenerUltimoId();
    }
    // CARRITO
    public function verDetalleProducto()
    {
        require_once "Vista/html/detalleProducto.php";
    }

    // public function agregarAlCarrito($, )
    // {
    //     $gestioncarrito = new GestorCarrito();
    //     $carrito = new Carrito($idproducto, $cantidad);
    //     $gestioncarrito->agregarProducto($carrito);
    //     header("Location: index.php?accion=verDetalleProducto&id=" . $idproducto);
    //     exit();
    // }
    public function agregarAlCarrito($producto_id, $cantidad, $precio_unitario)
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['carrito_id'])) {
            $id_usuario = isset($_SESSION['idusuario']) ? $_SESSION['idusuario'] : null;
            $fecha = date('Y-m-d H:i:s');
            $estado = 'abierto';

            $carrito = new Carrito($id_usuario, $fecha, $estado);
            $gestionCarrito = new GestorCarrito();
            $carrito_id = $gestionCarrito->crearCarrito($carrito);
            $_SESSION['carrito_id'] = $carrito_id;
        } else {
            $carrito_id = $_SESSION['carrito_id'];
        }

        // 2. Agregar producto a carrito_items
        $gestionCarrito = new GestorCarrito();
        $gestionCarrito->agregarProducto($carrito_id, $producto_id, $cantidad, $precio_unitario);

        header("Location: index.php?accion=verCarrito");
        exit();
    }
    public function verCarrito()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $carrito_id = isset($_SESSION['carrito_id']) ? $_SESSION['carrito_id'] : null;
        $productos = [];
        if ($carrito_id) {
            $gestionCarrito = new GestorCarrito();
            $productos = $gestionCarrito->obtenerProductosCarrito($carrito_id);
        }
        require "Vista/html/Carrito.php";
    }
}
