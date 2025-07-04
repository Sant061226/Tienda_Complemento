-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2025 a las 00:00:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_tenis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Portatiles'),
(2, 'Computadores de escritorio'),
(3, 'Repuestos'),
(7, 'Perifericos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_producto`
--

CREATE TABLE `imagenes_producto` (
  `id` int(11) NOT NULL,
  `imagenes` varchar(60) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_producto`
--

INSERT INTO `imagenes_producto` (`id`, `imagenes`, `id_producto`) VALUES
(1, 'OIP.jfif', 1),
(2, 'OIP.jfif', 2),
(8, '1751660625_0_N1fmHtI8gmkH_2Vu.png', 11),
(9, '1751660625_Captura.PNG', 11),
(12, '1751663266_DeWatermark.ai_1747624363206 (1).png', 13),
(13, '1751663266_DeWatermark.ai_1747624363206.png', 13),
(14, '1751663601_descarga (4).jpeg', 14),
(15, '1751663601_hp.jpeg', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(40) NOT NULL DEFAULT 'solicitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_usuario`, `id_producto`, `cantidad`, `fecha`, `estado`) VALUES
(7, 2, 13, 2, '2025-07-10', 'solicitado'),
(8, 2, 14, 2, '2025-07-10', 'solicitado'),
(9, 4, 2, 1, '2025-07-05', 'solicitado'),
(10, 4, 1, 1, '2025-07-05', 'solicitado'),
(11, 4, 14, 2, '2025-07-05', 'solicitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `especificaciones` text NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `precio` varchar(40) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `especificaciones`, `marca`, `modelo`, `precio`, `id_categoria`) VALUES
(1, 'all in one', 'Procesador: Intel Core i3 o AMD Ryzen 3\r\nMemoria RAM: 8 GB DDR4\r\nAlmacenamiento: SSD de 240 a 480 GB\r\nGráfica: Integrada (Intel UHD o Radeon Vega)\r\nSistema Operativo: Windows 10/11 o Linux\r\nFuente de poder: 400 a 500 watts\r\n\r\nPC de Escritorio para Uso Intermedio o Estudio\r\nProcesador: Intel Core i5 o AMD Ryzen 5\r\nMemoria RAM: 16 GB DDR4\r\nAlmacenamiento: SSD de 500 GB o más\r\nGráfica: Integrada o dedicada básica (como NVIDIA GTX 1650)\r\nSistema Operativo: Windows 10/11 o Linux\r\nFuente de poder: 500 a 600 watts\r\n\r\nPC de Escritorio para Gaming o Diseño Profesional\r\nProcesador: Intel Core i7/i9 o AMD Ryzen 7/9\r\nMemoria RAM: 32 GB DDR4 o DDR5\r\nAlmacenamiento: SSD NVMe de 1 TB más HDD de 2 TB\r\nGráfica: Tarjeta dedicada potente (NVIDIA RTX 3060/4070 o AMD RX 6700 XT o superior)\r\nSistema Operativo: Windows 11\r\nFuente de poder: 650 a 850 watts con certificación 80 Plus\r\nPlaca base: Compatible con DDR5 y PCIe 4.0 o 5.0\r\nRefrigeración: Sistema por aire de alto rendimiento o líquida', 'Asus', '000012123', '2400000', 2),
(2, 'Lenovo SolarFlare', 'Procesador (CPU): Intel Core i3 (12ª o 13ª gen) / AMD Ryzen 3 5000 series\r\n\r\nMemoria RAM: 8 GB DDR4\r\n\r\nAlmacenamiento: 256 GB SSD (opcional HDD de 1 TB adicional)\r\n\r\nTarjeta gráfica (GPU): Integrada (Intel UHD / AMD Vega)\r\n\r\nPlaca base (motherboard): Compatible con CPU, con puertos USB 3.0 y HDMI\r\n\r\nSistema operativo: Windows 11 Home o Linux\r\n\r\nFuente de poder: 400W certificada\r\n\r\nGabinete: Mini torre o torre mediana con ventilación básica', 'Flare', 'XYZ123', '3000000', 2),
(11, 'Teclado 56 pulgadas', 'abcdefghijklmnñopqrstuvwxyz', 'Avonz', '2030', '130000', 3),
(13, 'Laptop', 'Procesador: Intel Core i3 o AMD Ryzen 3 Memoria RAM: 8 GB DDR4 Almacenamiento: SSD de 240 a 480 GB Gráfica: Integrada (Intel UHD o Radeon Vega) Sistema Operativo: Windows 10/11 o Linux Fuente de poder: 400 a 500 watts PC de Escritorio para Uso Intermedio o Estudio Procesador: Intel Core i5 o AMD Ryzen 5 Memoria RAM: 16 GB DDR4 Almacenamiento: SSD de 500 GB o más Gráfica: Integrada o dedicada básica (como NVIDIA GTX 1650) Sistema Operativo: Windows 10/11 o Linux Fuente de poder: 500 a 600 watts PC de Escritorio para Gaming o Diseño Profesional Procesador: Intel Core i7/i9 o AMD Ryzen 7/9 Memoria RAM: 32 GB DDR4 o DDR5 Almacenamiento: SSD NVMe de 1 TB más HDD de 2 TB Gráfica: Tarjeta dedicada potente (NVIDIA RTX 3060/4070 o AMD RX 6700 XT o superior) Sistema Operativo: Windows 11 Fuente de poder: 650 a 850 watts con certificación 80 Plus Placa base: Compatible con DDR5 y PCIe 4.0 o 5.0 Refrigeración: Sistema por aire de alto rendimiento o líquida', 'Hp', 'DFGHJGFV4B3213', '2500000', 1),
(14, 'Mouse inalambrico', 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ', 'Hp', 'G4HJ32GFDVB', '30000', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`) VALUES
(1, 'Admin', 'admin@admin.com', '12345', 1),
(2, 'jok', 'jok@gmail.com', '1212', 2),
(3, 'Mario', 'mario@gmail.com', '1212', 2),
(4, 'Sas', 'sas@gmail.com', '1212', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  ADD CONSTRAINT `imagenes_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
