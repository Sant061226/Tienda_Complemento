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
            <a href="index.php?accion=panelAdmin">Productos</a>
            <a href="index.php?accion=panelAdmin1">Categorias</a>
            <a href="index.php?accion=panelAdmin2">Pedidos</a>
            <a href="index.php?accion=cerrarSesion">Cerrar Sesión</a>
        </nav>
    </header>
    <?php
    $fila = $result->fetch_assoc();
    ?>
    <section id="admin" class="adminsty">
        <h3>Editar Categoría</h3>
        <form action="index.php?accion=editCat" class="form-admin" method="post">
            <input type="hidden" name="idcat" value="<?php echo  $fila['id'] ?>">
            <input type="text" name="editnomcat" value="<?php echo  $fila['nombre'] ?>">
            <button type="submit">Guardar</button>
        </form>
    </section>
</body>

</html>