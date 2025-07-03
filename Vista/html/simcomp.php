<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Tenis</title>
    <link rel="stylesheet" href="Vista/html/css/styles.css">
    <script src="Vista/jquery/jquery.js"></script>
    <script src="Vista/js/script.js"></script>
</head>

<body>
    <header>
        <h1>Tienda de Tenis</h1>
        <nav>
            <a href="index.php?accion=inicio">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="index.php?accion=logAdmin">Zona Admin</a>
        </nav>
    </header>
    <?php
    $fila2 = $result->fetch_assoc();
    ?>
    <section id="admin" class="adminsty">
        <div class="admin-section">
            <form action="index.php?accion=compraSimulada" method="post">
                <h3>Realizar Compra</h3>
                <div id="usuarios">
                    <select name="idusuario">
                        <option value="">Seleccionar usuario</option>
                    </select>
                </div>
                <p><strong>¿No esta regitradado? <a href="index.php?accion=registrar">presione aqui!</a> </strong></p>
                <input type="hidden" name="idproducto" value="<?php echo  $fila2['id'] ?>" readonly>
                <input type="text" name="producto" value="<?php echo  $fila2['nombre'] ?>" readonly>
                <input type="text" name="precio" value="<?php echo  $fila2['precio'] ?>" readonly>
                <input type="text" name="descripcion" value="<?php echo  $fila2['descripcion'] ?>" readonly>
                <input type="number" name="cantiped" placeholder="Cantidad">
                <input type="date" name="fechaped" placeholder="Fecha">
                <button type="submit">Comprar</button>
            </form>
        </div>
    </section>
</body>
</html>