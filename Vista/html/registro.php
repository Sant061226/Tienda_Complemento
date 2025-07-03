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
    <section id="admin" class="adminsty">
        <div class="admin-section">
            <form action="index.php?accion=regUsuario" method="post">
                <h3>Registrar Usuario</h3>
                <input type="text" name="nombre" value="" placeholder="Nombre completo" required>
                <input type="mail" name="correo" value="" placeholder="Correo electrónico" required>
                <input type="password" name="contrasena" value="" placeholder="Ingrese una Contraseña" required>
                <button type="submit">Registrar</button>
            </form>
        </div>
    </section>
</body>

</html>