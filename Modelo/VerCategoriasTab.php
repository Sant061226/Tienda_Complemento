<?php
require_once "Conexion.php";
$conexion = new Conexion();
$conexion->abrir();
$sql = "SELECT * FROM categorias";
$conexion->consulta($sql);
$result = $conexion->obtenerResult();
$filas = $conexion->obtenerFilasAfectadas();
?>
<div id="tabcat">
    <table>
        <thead>
            <tr>
                <th>Categorias</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php while ($fila = $result->fetch_assoc()) { ?>

            <tbody>
                <tr>
                    <ul>
                        <td>
                            <li><?php echo $fila["nombre"] ?></li>
                        </td>
                        <td>
                            <li> <button><a href="index.php?accion=editCategoria&id=<?php echo $fila["id"] ?>">Editar</button>
                            </li><br>
                            <li> <button><a href="index.php?accion=eliminarCategoria&id=<?php echo $fila["id"] ?>" onclick="return confirm('¿Esta seguro que desea eliminar la categoria <?php echo $fila['nombre'] ?>?');">Eliminar</button>
                            </li>
                        </td>
                    </ul>

                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>