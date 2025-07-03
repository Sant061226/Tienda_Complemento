<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT pedidos.id, usuarios.nombre as nomus, productos.nombre as nomped, pedidos.cantidad, pedidos.fecha, pedidos.estado  from pedidos join productos on pedidos.id_producto=productos.id join usuarios on pedidos.id_usuario=usuarios.id";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="tablaprod">
    <?php if ($filas > 0) ?>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <?php while ($fila = $result->fetch_assoc()) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $fila["id"] ?></td>
                    <td><?php echo $fila["nomus"] ?></td>
                    <td><?php echo $fila["nomped"] ?></td>
                    <td><?php echo $fila["cantidad"] ?></td>
                    <td><?php echo $fila["fecha"] ?></td>
                    <td><?php echo $fila["estado"] ?></td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>