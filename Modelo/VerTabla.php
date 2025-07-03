<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT productos.id, productos.nombre, productos.descripcion, productos.precio, productos.imagen, categorias.nombre as Categoria from productos join categorias on productos.id_categoria=categorias.id";
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
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Talla</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php while ($fila = $result->fetch_assoc()) {
        ?>   
    
        <tbody>
            <tr>
                <td><?php echo $fila["id"] ?></td>
                <td><?php echo $fila["nombre"] ?></td>
                <td><?php echo $fila["Categoria"] ?></td>
                <td>$<?php echo $fila["precio"] ?></td>
                <td><?php echo $fila["descripcion"] ?></td>
                <td>
                    <button><a href="index.php?accion=editProducto&id=<?php echo $fila["id"] ?>"> Editar </button>
                    <button><a href="index.php?accion=eliminarProducto&id=<?php echo $fila["id"] ?>" onclick="return confirm('¿Esta seguro que desea eliminar el producto <?php echo $fila['nombre'] ?>?');">Eliminar</button>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>