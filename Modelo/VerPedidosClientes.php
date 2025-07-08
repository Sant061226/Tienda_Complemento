<?php
require_once "Conexion.php";
session_start();
$id_usuario = isset($_SESSION['idusuario']) ? intval($_SESSION['idusuario']) : 0;
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT pedidos.id, pedidos.cantidad, pedidos.fecha, pedidos.estado, productos.nombre 
        FROM pedidos 
        JOIN productos ON pedidos.id_producto = productos.id 
        WHERE pedidos.id_usuario = $id_usuario";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="tebcli">
    <?php if ($filas > 0) { ?>
    <table>
        <thead>
            <tr>
                <th>ID Pedido</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($fila = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $fila["id"] ?></td>
                <td><?php echo $fila["nombre"] ?></td>
                <td><?php echo $fila["cantidad"] ?></td>
                <td><?php echo $fila["fecha"] ?></td>
                <td><?php echo $fila["estado"] ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <p>No tiene pedidos registrados.</p>
    <?php } ?>
</div>