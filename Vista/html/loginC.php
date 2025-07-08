<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="Vista/css/style.css">

</head>

<body>
    <header>
        <h1>Tienda de Tenis</h1>
        <nav>
            <a href="index.php?accion=vista">Inicio</a>
            <a href="index.php?accion=catalogo">Catálogo</a>
            <a href="index.php?accion=login">Zona Admin</a>
        </nav>
    </header>
    <section id="admin">
        <h2></h2>
        <p><strong>Iniciar sesión:</strong></p>
        <form action="index.php?accion=loginCliente" method="post">
            <input type="email" name="emailC" placeholder="Correo">
            <input type="password" name="passwordC" placeholder="Contraseña">
            <button type="submit">Ingresar</button>
        </form>
        <a href="index.php?accion=registro">Registarse aqui</a>
    </section>

</body>

</html>