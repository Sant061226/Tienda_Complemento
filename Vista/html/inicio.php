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
            <?php
            if (isset($_SESSION["usuario"]) && isset($_SESSION["rol"]) && $_SESSION["rol"] == 2) {
                // Cliente logueado
                echo '<a href="index.php?accion=pedidosClientes">Mis Pedidos</a>';
                echo '<a href="index.php?accion=catalogo">Catálogo</a>';
                echo '<a href="index.php?accion=cerrarSesion">Cerrar Sesión</a>';
            } else {
                // Cliente no logueado
                echo '<a href="index.php?accion=inicio">Inicio</a>';
                echo '<a href="index.php?accion=catalogo">Catálogo</a>';

                echo '<a href="index.php?accion=logAdmin">Zona Admin</a>';
                echo '<a href="#" id="abrirModalCliente">Iniciar Sesión Cliente</a>';
            }
            ?>
        </nav>
    </header>

    <section id="catalogo">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="Vista/images/banne.jpeg" alt="Imagen de Tenis" class="banner">
                </div>
                <div class="col">
                    <h1>Bienvenido</h1>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum, deleniti. Magni rerum facere dicta maiores fugiat, beatae praesentium magnam commodi porro deleniti minima, voluptates non ducimus et quod adipisci cumque. Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium quos deleniti ipsum dolore magnam? Esse laborum sint voluptates! Eos sit laudantium tempore voluptate cumque, perspiciatis porro voluptatem fugiat officiis beatae?
                    </p>
                    <h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium veritatis vel, ipsum recusandae fuga sequi in, earum odio accusamus officia excepturi ab explicabo enim qui nobis aspernatur. Dolor, optio laudantium.</h6>
                </div>
            </div>
        </div>
    </section>
    <section id="admin" class="adminsty">
        <div id="modalCliente" class="modal" style="display:none;">
            <div class="modal-content">
                <span class="close" id="cerrarModalCliente">&times;</span>
                <h2>Bienvenido</h2>
                <form action="index.php?accion=logCliente" method="post">
                    <input type="email" name="emailCli" placeholder="Correo" required>
                    <input type="password" name="passwordCli" placeholder="Contraseña" required>
                    <input type="hidden" name="rol" value="2">
                    <button type="submit">Ingresar</button>
                    <p><strong>¿No esta regitradado? <a href="index.php?accion=registrar">presione aqui!</a> </strong></p>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>