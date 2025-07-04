<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.precio, imagenes_producto.imagenes, categorias.nombre as Categoria, categorias.id as id_cat from productos join categorias on productos.id_categoria=categorias.id join imagenes_producto on productos.id=imagenes_producto.id_producto";
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
                    <div class="producto">
                        <p><strong><?php echo $fila["Categoria"] ?></strong></p>
                        <img src="upload/<?php echo $fila["imagenes"] ?>" width="50%" alt="">
                        <h3><?php echo $fila["nombre"] ?></h3>
                        <p><strong><?php echo $fila["Categoria"] ?></strong></p>
                        <p>Categoria:&nbsp;<?php echo $fila["Categoria"] ?></p>
                        <p>$<?php echo $fila["precio"] ?></p>
                        <?php if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == 2) { ?>
                            <form action="index.php?accion=comprarProd&id=<?php echo $fila["id"] ?>" method="post">
                                <button type="submit">Comprar</button>
                            </form>
                        <?php } else { ?>
                            <form action="index.php?accion=catalogo" method="post">
                                <input type="hidden" name="producto_a_comprar" value="<?php echo $fila["id"]; ?>">
                                <button type="submit" disabled>Comprar</button>
                            </form>
                            <h3>Debe inicar sesion para realizar comprar</h3>
                        <?php } ?>
                        <div id="compra"></div>
                    </div>
                <?php }
            } else { ?>
                <h3>No hay productos en esta categoría.</h3>
            <?php } ?>
            </div>
    </div>
</section>