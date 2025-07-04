<?php
session_start();
require_once "Controlador/Controlador.php";
require_once "Modelo/Conexion.php";
require_once "Modelo/Sesion.php";
require_once "Modelo/GestionSesion.php";
require_once "Modelo/Producto.php";
require_once "Modelo/GestionProducto.php";
require_once "Modelo/Pedido.php";
require_once "Modelo/GestionPedido.php";
require_once "Modelo/Categoria.php";
require_once "Modelo/GestionCategoria.php";
require_once "Modelo/Usuario.php";
require_once "Modelo/GestionUsuario.php";
require_once "Modelo/imagenesProducto.php";
require_once "Modelo/GestorImagenesProducto.php";

$controlador = new Controlador();
if (isset($_GET["accion"])) {
    switch ($_GET["accion"]) {
        case "logAdmin":
            $controlador->verPagina("Vista/html/logAdmin.php");
            break;
        case "inAdmin":
            $_POST["email"];
            $_POST["password"];
            $_POST["rol"];
            $controlador->inicioSesion($_POST["email"], $_POST["password"], $_POST["rol"]);
            break;
        case "logCliente":
            $_POST["emailCli"];
            $_POST["passwordCli"];
            $_POST["rolCli"];
            $controlador->inicioSesionCli($_POST["emailCli"], $_POST["passwordCli"], $_POST["rol"]);
            break;
        case "cerrarSesion":
            $controlador->cerrarSesion();
            break;
        case "inicio":
            $controlador->verPagina("Vista/html/inicio.php");
            break;
        case "registrar":
            $controlador->verPagina("Vista/html/registro.php");
            break;
        case "catalogo":
            $controlador->verPagina("Vista/html/catalogo.php");
            break;
        case "pedidosClientes":
            $controlador->verPagina("Vista/html/pedidosClientes.php");
            break;
        case "panelAdmin":
            $controlador->verPagina("Vista/html/panelAdmin1.php");
            break;
        case "panelAdmin1":
            $controlador->verPagina("Vista/html/panelAdmin2.php");
            break;
        case "panelAdmin2":
            $controlador->verPagina("Vista/html/panelAdmin3.php");
            break;
        case "nuevoProd":
            $ruta_indexphp = "upload";
            $extensiones = array('image/jpg', 'image/jpeg', 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;

            $nombres_archivos = array();

            foreach ($_FILES['cover']['name'] as $key => $nombre_archivo) {
                $tipo = $_FILES['cover']['type'][$key];
                $tamano = $_FILES['cover']['size'][$key];
                $tmp_name = $_FILES['cover']['tmp_name'][$key];

                if (in_array($tipo, $extensiones) && $tamano < $max_tamanyo) {
                    $nombre_archivo_final = time() . '_' . basename($nombre_archivo);
                    $ruta_nuevo_destino = $ruta_indexphp . '/' . $nombre_archivo_final;

                    if (move_uploaded_file($tmp_name, $ruta_nuevo_destino)) {
                        $nombres_archivos[] = $nombre_archivo_final;
                    }
                }
            }

            $nombre = $_POST["nomprod"];
            $especificacion = $_POST["especificaiones"];
            $precio = $_POST["precio"];
            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $categoria = $_POST["category"];


            $id_producto = $controlador->nuevoProducto($nombre, $especificacion, $marca, $modelo, $precio, $categoria);

            // Guardar las imágenes asociadas a ese producto
            foreach ($nombres_archivos as $cover) {
                $controlador->nuevoProductoImg($cover, $id_producto);
            }

            break;
        case 'nuevaCat':
            $controlador->ingresarCategoria($_POST["nomcat"]);
            break;
        case "compraSimulada":
            $controlador->compraSimulada(
                $_POST["idusuario"],
                $_POST["idproducto"],
                $_POST["cantiped"],
                $_POST["fechaped"]
            );
            break;
        case "editCat":
            $controlador->editarCategoria(
                $_POST["idcat"],
                $_POST["editnomcat"]
            );
            break;
        case "regUsuario":
            $controlador->registroUsuario(
                $_POST["nombre"],
                $_POST["correo"],
                $_POST["contrasena"]
            );
            break;
        case "editarProd":
            $ruta_indexphp = "upload";
            $extensiones = array('image/jpg', 'image/jpeg', 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            $nombres_archivos = array();

            // Procesar nuevas imágenes si se subieron
            if (!empty($_FILES['editcover']['name'][0])) {
                foreach ($_FILES['editcover']['name'] as $key => $nombre_archivo) {
                    $tipo = $_FILES['editcover']['type'][$key];
                    $tamano = $_FILES['editcover']['size'][$key];
                    $tmp_name = $_FILES['editcover']['tmp_name'][$key];

                    if (in_array($tipo, $extensiones) && $tamano < $max_tamanyo) {
                        $nombre_archivo_final = time() . '_' . basename($nombre_archivo);
                        $ruta_nuevo_destino = $ruta_indexphp . '/' . $nombre_archivo_final;

                        if (move_uploaded_file($tmp_name, $ruta_nuevo_destino)) {
                            $nombres_archivos[] = $nombre_archivo_final;
                        }
                    }
                }
            }

            // Editar datos del producto
            $controlador->editarProducto(
                $_POST["idprod"],
                $_POST["editnom"],
                $_POST["editespeci"],
                $_POST["editmarca"],
                $_POST["editmodelo"],
                $_POST["editprecio"],
                $_POST["category"]
            );

            // Si hay nuevas imágenes, guárdalas en la base de datos
            if (!empty($nombres_archivos)) {
                foreach ($nombres_archivos as $cover) {
                    $controlador->editProductoImg($cover, $_POST["idprod"]);
                }
            }

            break;
        case "editEst":
            $controlador->editarEstado(
                $_POST["idped"],
                $_POST["nuevEst"],
            );
            break;
    }
    if (isset($_POST['producto_a_comprar'])) {
        $_SESSION['producto_a_comprar'] = $_POST['producto_a_comprar'];
        header("Location: index.php?accion=catalogo");
        exit();
    } elseif ($_GET['accion'] == 'eliminarProducto' && isset($_GET['id'])) {
        $controlador->eliminarProducto($_GET["id"]);
        header('Location: index.php?accion=panelAdmin');
    } elseif ($_GET['accion'] == 'eliminarCategoria' && isset($_GET['id'])) {
        $controlador->eliminarCategoria($_GET["id"]);
        header('Location: index.php?accion=panelAdmin');
    } elseif ($_GET['accion'] == 'editProducto' && isset($_GET['id'])) {
        $controlador->edit($_GET['id']);
    } elseif ($_GET['accion'] == 'editEstado' && isset($_GET['id'])) {
        $controlador->editEsta($_GET['id']);
    } elseif ($_GET['accion'] == 'editCategoria' && isset($_GET['id'])) {
        $controlador->editCat($_GET['id']);
    } elseif ($_GET['accion'] == 'comprarProd' && isset($_GET['id'])) {
        $controlador->ver($_GET['id']);
    }
} else {
    $controlador->verPagina("Vista/html/inicio.php");
}
