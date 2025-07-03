<!-- index.html -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Tenis</title>
    <link rel="stylesheet" href="Vista/html/css/styles.css">
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
        <h2>Zona Administrador</h2>
        <p><strong>Iniciar sesión</strong></p>
        <form action="index.php?accion=inAdmin" method="post">
            <input type="email" name="email" placeholder="Correo">
            <input type="password" name="password" placeholder="Contraseña">
            <button type="submit">Ingresar</button>
        </form>
    </section>
    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>