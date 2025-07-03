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
        <form action="index.php?accion=editarProd" class="form-admin" method="post" enctype="multipart/form-data">
                <h3>Registrar Nuevos Productos</h3>
                <input type="hidden"name="idprod" value="<?php echo  $fila['id'] ?>" required>
                <input type="text" name="editnom" value="<?php echo  $fila['nombre'] ?>" required>
                <textarea name="editespeci" required><?php echo  $fila['especificaciones'] ?></textarea>
                <br>
                <input type="text" name="editmarca" value="<?php echo  $fila['marca'] ?>" required>
                <input type="text" name="editmodelo"  value="<?php echo  $fila['modelo'] ?>" required>
                <input type="number" name="editprecio" value="<?php echo  $fila['precio'] ?>" required>
                <div id="categorias">
                    <select name="category">
                        <option value="<?php echo $fila["id"] ?>"><?php echo $fila["Categoria"] ?></option>
                    </select>
                </div>
                <input type="file" name="editcover" multiple>
                <button type="submit">Guardar Producto</button>
            </form>
    </section>

</body>

</html>