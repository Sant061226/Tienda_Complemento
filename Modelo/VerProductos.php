<?php

require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$id_categoria = isset($_POST['id_categoria']) ? intval($_POST['id_categoria']) : 0;
$sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.precio, categorias.nombre as Categoria, categorias.id as id_cat 
        FROM productos 
        JOIN categorias ON productos.id_categoria=categorias.id";
if ($id_categoria > 0) {
    $sql .= " WHERE productos.id_categoria = $id_categoria";
}
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
session_start();
?>
<section id="admin" class="adminsty">

    <div id="producto">
        <?php if ($filas > 0) { ?>
            <div class="productos">
                <?php while ($fila = $result->fetch_assoc()) { ?>
                    <?php
                    $id_prod = $fila["id"];
                    $conexion_img = new Conexion();
                    $conexion_img->abrir();
                    $sql_img = "SELECT imagenes FROM imagenes_producto WHERE id_producto = $id_prod";
                    $conexion_img->consulta($sql_img);
                    $imgs_result = $conexion_img->obtenerResult();
                    $imagenes = [];
                    while ($img_row = $imgs_result->fetch_assoc()) {
                        $imagenes[] = $img_row["imagenes"];
                    }
                    $conexion_img->cerrar();
                    ?>
                    <div class="producto">
                        <p><strong><?php echo $fila["Categoria"] ?></strong></p>
                        <?php if (count($imagenes) > 1): ?>
                            <div class="carousel" data-prod="<?php echo $id_prod; ?>">
                                <?php foreach ($imagenes as $idx => $img): ?>
                                    <img src="upload/<?php echo $img; ?>" class="carousel-img" style="display:<?php echo $idx == 0 ? '' : 'none'; ?>;" width="50%" alt="">
                                <?php endforeach; ?>
                                <button class="prev" type="button">&#10094;</button>
                                <button class="next" type="button">&#10095;</button>
                            </div>
                        <?php elseif (count($imagenes) == 1): ?>
                            <img src="upload/<?php echo $imagenes[0]; ?>" width="50%" alt="">
                        <?php endif; ?>
                        <h3><?php echo $fila["nombre"] ?></h3>
                        <p>Categoría:&nbsp;<?php echo $fila["Categoria"] ?></p>
                        <p>$<?php echo $fila["precio"] ?></p>
                        <?php if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == 2) { ?>
                            <form action="index.php?accion=comprarProd&id=<?php echo $fila["id"] ?>" method="post">
                                <button type="submit">Comprar</button>
                            </form>
                        <?php } else { ?>
                            <form>
                                <button type="button" disabled style="background:#ccc;cursor:not-allowed;">Inicia sesión para comprar</button>
                            </form>
                        <?php } ?>
                        <div id="compra"></div>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <h3>No hay productos en esta categoría.</h3>
        <?php } ?>
    </div>
</section>