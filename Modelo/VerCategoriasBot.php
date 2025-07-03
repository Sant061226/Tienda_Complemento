<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM categorias";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="catbo">
    <?php if ($filas >= 1) { ?>
    <div class="navbar">
        <button><a href="#" class="filtro-categoria" data-id="0">Todos</a></button>
        <?php while ($fila = $result->fetch_assoc()) { ?>
            <button>
                <a href="#" class="filtro-categoria" data-id="<?php echo $fila["id"] ?>">
                    <?php echo $fila["nombre"] ?>
                </a>
            </button>
        <?php } ?>
    </div>
    <?php } ?>
</div>