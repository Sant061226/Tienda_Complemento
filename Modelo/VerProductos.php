<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre as Categoria, categorias.id as id_cat from productos join categorias on productos.id_categoria=categorias.id";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="producto">
    <?php if ($filas > 0) ?>
    <div class="productos">
        <?php while ($fila = $result->fetch_assoc()) {
        ?>
            <div class="producto">

                <img src="upload/<?php echo $fila["imagen"] ?>" alt="">
                <h3><?php echo $fila["nombre"] ?></h3>
                <p>Categoría:<?php echo $fila["Categoria"] ?></p>
                <p><?php echo $fila["descripcion"] ?></p>
                <p>$<?php echo $fila["precio"] ?></p>
                <form action="index.php?accion=comprarProd&id=<?php echo $fila["id"] ?>" method="post"><button type="submit"> Comprar</button></form>
                <div id="compra"></div>

            </div>
        <?php } ?>
    </div>
</div>