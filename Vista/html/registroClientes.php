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
    <section id="admin">
        <h2>Bienvenido</h2>
        <p><strong>Registro: </strong></p>
        <form action="index.php?accion=registrarCliente" method="post">
            <input type="text" name="nombre" placeholder="Nombre">
            <input type="email" name="email" placeholder="Correo">
            <input type="password" name="password" placeholder="Contraseña">
             <input type="hidden" name="rol" value="cliente">
            <button type="submit">Registrarse</button>
        </form>
    </section>

</body>

</html>