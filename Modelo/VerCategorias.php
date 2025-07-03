    <?php
    require_once "Conexion.php";
    $conexion = new Conexion();
    $conexion->abrir();
    $sql = "SELECT * FROM categorias";
    $conexion->consulta($sql);
    $result = $conexion->obtenerResult();
    $filas = $conexion->obtenerFilasAfectadas();
    ?>
    <div id="categorias">
        <?php if ($filas >= 1) ?>
        <select name="category">
            <option value="">Seleccionar categoría</option>
            <?php while ($fila = $result->fetch_assoc()) {
            ?>
                <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
            <?php } ?>
        </select>
    </div>