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
            $controlador->inicioSesion($_POST["email"], $_POST["password"]);
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

  
            $id_producto = $controlador->nuevoProducto($nombre, $especificacion, $precio, $marca, $modelo, $categoria);

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
            $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
            $max_tamanyo = 1024 * 1024 * 8;
            $edcover = $_FILES['editcover']['name'];
            $ruta_fichero_origen = $_FILES['editcover']['tmp_name'];
            $ruta_nuevo_destino = $ruta_indexphp . '/' . $_FILES['editcover']['name'];
            if (in_array($_FILES['editcover']['type'], $extensiones)) {
                echo 'Es una imagen';
                if ($_FILES['editcover']['size'] < $max_tamanyo) {
                    echo 'Pesa menos de 1 MB';
                    if (move_uploaded_file($ruta_fichero_origen, $ruta_nuevo_destino)) {
                        echo 'Fichero guardado con éxito';
                    }
                }
            }
            $controlador->editarProducto(
                $_POST["idprod"],
                $_POST["editnom"],
                $_POST["editprecio"],
                $_POST["edittalla"],
                $_POST["category"],
                $edcover
            );
            break;
    }
    if ($_GET['accion'] == 'eliminarProducto' && isset($_GET['id'])) {
        $controlador->eliminarProducto($_GET["id"]);
        header('Location: index.php?accion=panelAdmin');
    } elseif ($_GET['accion'] == 'eliminarCategoria' && isset($_GET['id'])) {
        $controlador->eliminarCategoria($_GET["id"]);
        header('Location: index.php?accion=panelAdmin');
    } elseif ($_GET['accion'] == 'editProducto' && isset($_GET['id'])) {
        $controlador->edit($_GET['id']);
    } elseif ($_GET['accion'] == 'editCategoria' && isset($_GET['id'])) {
        $controlador->editCat($_GET['id']);
    } elseif ($_GET['accion'] == 'comprarProd' && isset($_GET['id'])) {
        $controlador->ver($_GET['id']);
    }
} else {
    $controlador->verPagina("Vista/html/inicio.php");
}
