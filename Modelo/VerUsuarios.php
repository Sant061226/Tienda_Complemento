<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM usuarios WHERE rol = 2";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="usuarios">
    <?php if ($filas >= 1) ?>
    <select name="idusuario">
        <option value="">Seleccionar usuario</option>
        <?php while ($fila = $result->fetch_assoc()) {
        ?>
            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
        <?php } ?>
    </select>
</div>