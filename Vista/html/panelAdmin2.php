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
    <div class="admin-section">
        <h3>Categorías</h3>
        <div id="tabcat">
            <table>
                <thead>
                    <tr>
                        <th>Categorias</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <ul>
                            <td>
                                <li>Deportivos</li>
                            </td>
                            <td>
                                <li><button>Eliminar</button>
                            </td>
                        </ul>

                    </tr>
                    <tr>
                        <ul>
                            <td>
                                <li>Casuales</li>
                            </td>
                            <td>
                                <li><button>Eliminar</button>
                            </td>
                        </ul>

                    </tr>
                </tbody>
            </table>
        </div>
        <h3>Nueva Categoría</h3>
        <form action="index.php?accion=nuevaCat" class="form-admin" method="post">
            <input type="text" name="nomcat" placeholder="Nombre de la categoría">
            <button type="submit">Guardar Categoría</button>
        </form>
    </div>
    </section>

    <footer>
        <p>&copy; 2025 Tienda de Tenis. Todos los derechos reservados.</p>
    </footer>
</body>

</html>