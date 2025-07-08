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
    <section id="panel-admin">
        <h2>Panel de Administración</h2>
        <div class="admin-section">
            <h3>Productos</h3>
            <div id="tablaprod">
                <table>
                </table>
            </div>
            <form action="index.php?accion=nuevoProd" class="form-admin" method="post" enctype="multipart/form-data">
                <h3>Registrar Nuevos Productos</h3>
                <input type="text" name="id_producto" placeholder="ID del producto" required>
                <input type="text" name="nomprod" placeholder="Nombre del producto" required>
                <textarea name="especificaiones" placeholder="Especificaciones" required></textarea>
                <br>
                <input type="text" name="marca" placeholder="Marca" required>
                <input type="text" name="modelo" placeholder="Modelo" required>
                <input type="number" name="precio" placeholder="Precio" required>
                <div id="categorias">
                    <select name="category">
                        <option value="">Seleccionar categoría</option>
                    </select>
                </div>
                <input type="file" name="cover[]" multiple>
                <input type="hidden" name="id_producto" value="1">
                <button type="submit">Guardar Producto</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>