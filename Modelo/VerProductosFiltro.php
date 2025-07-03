<?php

require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 0;
$sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.precio, imagenes_producto.imagenes, categorias.nombre as Categoria, categorias.id as id_cat from productos join categorias on productos.id_categoria=categorias.id join imagenes_producto on productos.id=imagenes_producto.id_producto";
if ($id_categoria > 0) {
    $sql .= " WHERE productos.id_categoria = $id_categoria";
}
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<section id="admin" class="adminsty">

    <div id="producto">
        <?php if ($filas > 0) { ?>
            <div class="productos">
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <div class="producto">
                        <p><strong><?php echo $fila["Categoria"] ?></strong></p>

                        <img src="upload/<?php echo $fila["imagenes"] ?>" alt="">
                        <h3><?php echo $fila["nombre"] ?></h3>
                        <p>Categoría:&nbsp;<?php echo $fila["Categoria"] ?></p>
                        <p>$<?php echo $fila["precio"] ?></p>
                        <form action="index.php?accion=comprarProd&id=<?php echo $fila["id"] ?>" method="post"><button type="submit">Comprar</button></form>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h3>No hay productos en esta categoría.</h3>
        <?php } ?>
    </div>
</section>