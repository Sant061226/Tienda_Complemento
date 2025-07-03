# Tienda de Computadores y Repuestos

Este proyecto es una tienda web desarrollada en PHP y MySQL, que permite la gestión y venta de computadores y repuestos. Incluye panel de administración, registro de usuarios, catálogo filtrable, gestión de pedidos y carga de múltiples imágenes por producto.

## Características principales

- **Catálogo de productos**: Visualización de computadores y repuestos, con filtros por categoría.
- **Gestión de productos**: Alta, edición y eliminación de productos desde el panel admin.
- **Gestión de categorías**: Crear, editar y eliminar categorías.
- **Gestión de pedidos**: Visualización y registro de pedidos, con estado.
- **Registro y login de usuarios**: Para clientes y administradores.
- **Carga de imágenes**: Soporte para múltiples imágenes por producto.
- **Panel de administración**: Acceso restringido para gestionar productos, categorías y pedidos.
- **Filtros y búsqueda**: Filtrado por categoría desde el catálogo.
- **Frontend responsivo**: Interfaz amigable y adaptable a dispositivos móviles.

## Estructura de carpetas

```
/Controlador
    Controlador.php
/Modelo
    Conexion.php
    Producto.php
    GestionProducto.php
    Categoria.php
    GestionCategoria.php
    Pedido.php
    GestionPedido.php
    Usuario.php
    GestionUsuario.php
    Sesion.php
    GestionSesion.php
    ImagenesProducto.php
    GestorImagenesProducto.php
    VerProductos.php
    VerProductosFiltro.php
    VerCategorias.php
    VerCategoriasBot.php
    VerCategoriasTab.php
    VerUsuarios.php
    VerPedidos.php
    VerTabla.php
/Vista
    /html
        inicio.php
        catalogo.php
        panelAdmin1.php
        panelAdmin2.php
        panelAdmin3.php
        editarProducto.php
        editarCategoria.php
        registro.php
        logAdmin.php
        simcomp.php
        catalogoPort.php
        catalogoRepuesto.php
        catalogoComesa.php
        css/styles.css
    /js
        script.js
    /jquery
        jquery.js
/upload
    (Imágenes de productos)
tienda_tenis.sql
index.php
```

## Instalación y configuración

1. **Clona o descarga el repositorio.**
2. **Importa la base de datos**  
   Usa el archivo `tienda_tenis.sql` en tu phpMyAdmin o herramienta favorita.
3. **Configura el entorno**  
   - Coloca el proyecto en la carpeta `htdocs` de XAMPP o tu servidor local.
   - Asegúrate de que la base de datos, usuario y contraseña en `Modelo/Conexion.php` coincidan con tu entorno.
4. **Sube imágenes**  
   La carpeta `/upload` debe tener permisos de escritura para guardar imágenes de productos.
5. **Accede a la aplicación**  
   - Abre tu navegador y entra a `http://localhost/tienda_tenis/index.php`
   - Usa la zona admin para gestionar productos, categorías y pedidos.

## Usuarios y roles

- **Administrador**: Puede gestionar productos, categorías y pedidos.
- admin@admin.com - 12345
- **Cliente**: Puede registrarse, ver el catálogo y realizar pedidos.
- jok@gmail.com - 1212
- mario@gmail.com - 1212

## Funcionalidades avanzadas

- Filtro de productos por categoría (AJAX).
- Registro y login de usuarios.
- Gestión de múltiples imágenes por producto.
- Panel de administración con tablas dinámicas.
- Validaciones en formularios.

## Créditos

Desarrollado por Wendy Yulieth Garcia y Santiago Arévalo Acosta.  
Proyecto académico para la gestión de una tienda de computadores y repuestos.

---


