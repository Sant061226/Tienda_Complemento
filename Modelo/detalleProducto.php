<?php
require_once "Conexion.php";
session_start();

$conexion = new Conexion();
$conexion->abrir();

// Obtener el ID desde POST o desde la sesión
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $_SESSION['producto_id'] = $id; // guardarlo para futuras vistas
} elseif (isset($_SESSION['producto_id'])) {
    $id = intval($_SESSION['producto_id']);
} else {
    $id = 0; // sin ID
}

// Si no hay ID válido, no seguimos
if ($id <= 0) {
    echo "<p>Producto no encontrado.</p>";
    exit;
}
$sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.precio, imagenes_producto.imagenes, categorias.nombre as Categoria 
        FROM productos 
        JOIN categorias ON productos.id_categoria=categorias.id 
        JOIN imagenes_producto ON productos.id=imagenes_producto.id_producto 
        WHERE productos.id = $id LIMIT 1";
$conexion->consulta($sql);
$producto = $conexion->obtenerResult()->fetch_assoc();
?>

<section id="detalle-producto" class="adminsty">
    <div class="producto-detalle">
        <?php if ($producto) { ?>
            <p><strong><?php echo $producto["Categoria"] ?></strong></p>
            <img src="upload/<?php echo $producto["imagenes"] ?>" width="50%" alt="">
            <h3><?php echo $producto["nombre"] ?></h3>
            <p>Especificaciones: <?php echo $producto["especificaciones"] ?></p>
            <p>Precio: $<?php echo number_format($producto["precio"], 0, ',', '.') ?></p>
            <form id="Form-agregarCarrito" action="index.php?accion=agregarCarrito" method="post">
                <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">
                <input type="hidden" name="nombre" value="<?php echo $producto["nombre"]; ?>">
                <input type="hidden" name="precio" value="<?php echo $producto["precio"]; ?>">
                <input type="hidden" name="imagen" value="<?php echo $producto["imagenes"]; ?>">
                <input type="hidden" name="categoria" value="<?php echo $producto["Categoria"]; ?>">

                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" value="1" min="1" required>
                <button type="submit">Añadir a la bolsa</button>
            </form>
        <?php } else { ?>
            <p>Producto no encontrado.</p>
        <?php } ?>
    </div>
</section>