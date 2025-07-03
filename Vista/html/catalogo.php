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

    <section id="catalogo">
        <h2 class="h2">Catálogo de Productos</h2>
        <section id="admin" class="adminsty">
            <div id="catbo">
                <div class="navbar">
                </div>
            </div>
        </section>
        <div id="producto">
            <div class="productos">
                <!-- Aquí se llenan los productos dinámicamente -->
                <div class="producto">
                </div>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>