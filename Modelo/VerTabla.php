<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT productos.id, productos.nombre, productos.especificaciones, productos.precio, productos.marca, productos.modelo,imagenes_producto.imagenes, categorias.nombre as Categoria, categorias.id as id_cat from productos join categorias on productos.id_categoria=categorias.id join imagenes_producto on productos.id=imagenes_producto.id_producto";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="tablaprod">
    <?php if ($filas > 0) ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagenes</th>
                <th>Nombre</th>
                <th>Especificaciones</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <?php while ($fila = $result->fetch_assoc()) {
        ?>

            <tbody>
                <tr>
                    <td><?php echo $fila["id"] ?></td>
                    <td><img src="upload/<?php echo $fila["imagenes"]?>" width="90%"></td>
                    <td><?php echo $fila["nombre"] ?></td>
                    <td><?php echo $fila["especificaciones"] ?></td>
                    <th><?php echo $fila["marca"]?></th>
                    <td><?php echo $fila["modelo"] ?></td>
                    <td><?php echo $fila["precio"] ?></td>
                    <td><?php echo $fila["Categoria"] ?></td>
                    <td>
                        <button><a href="index.php?accion=editProducto&id=<?php echo $fila["id"] ?>"> Editar </button>
                        <button><a href="index.php?accion=eliminarProducto&id=<?php echo $fila["id"] ?>" onclick="return confirm('¿Esta seguro que desea eliminar el producto <?php echo $fila['nombre'] ?>?');">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>