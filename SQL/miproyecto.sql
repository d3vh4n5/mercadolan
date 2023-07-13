-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-05-2023 a las 03:43:57
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20209655_miproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip` varchar(25) DEFAULT NULL,
  `agent` varchar(300) DEFAULT NULL,
  `fecha` varchar(30) NOT NULL,
  `origen` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `accesos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `email`, `pass`) VALUES
(1, 'admin', 'admin@admin', 'c9a8eb2174b2d91371718b6835588617f003dc93');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_usuario` int(11) UNSIGNED NOT NULL,
  `id_producto` int(11) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(1, 'Electrónicos'),
(2, 'Herramientas'),
(19, 'Ropa'),
(26, 'Consumibles'),
(59, 'Test'),
(63, 'Videojuegos'),
(64, 'Educación'),
(65, 'Servicios'),
(66, 'Software'),
(67, 'Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conexiones`
--

CREATE TABLE `conexiones` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `agent` varchar(150) NOT NULL,
  `navegador` varchar(30) NOT NULL,
  `dispositivo` varchar(30) NOT NULL,
  `so` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `tiempo` varchar(30) NOT NULL,
  `tipo_intento` varchar(30) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conexiones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `significado` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `origen` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id`, `significado`, `origen`) VALUES
(1, 'Análisis de datos en Gobierno de la Ciudad de BSAS', 'adgc'),
(2, 'CaC oportunidades laborales -> Pinget', 'olpt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `nombre_imagen` varchar(100) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion`, `precio`, `id_categoria`, `imagen`, `stock`) VALUES
(1, 'Yerba', 'Paquete de yerba Playadito', 55.33, 26, '30dd89e5fcedc74271d582f7e22cf33d.webp', 300),
(12, 'Martillo', 'Martillo de tipo Maza', 500.01, 2, '5b052c2379bd6101f6d7915ddbe53233.jpg', 300),
(13, 'Pendrive', 'Pendrive de 256 GB marca Kingstone', 2542.01, 1, '3841f4afd87c4a388122cd1dd1cdd2e5.jpeg', 300),
(16, 'Pan', 'Pan Bimbo', 180.00, 26, 'd1357348689fdffd5e1bed5a934709bd.webp', 300),
(17, 'Leche', 'Leche entera marca \"La Serenísima\"', 55.33, 26, 'f75b969693b842b337274e4929ae88d3.jpg', 300),
(20, 'galletitas', 'Paquete de galletitas Pepitos porque son las mejores', 120.00, 26, '11c3e4a1c0121063592d15d31b0aea92.webp', 300),
(25, 'Remera de Jurassic Park', 'Remera de Jurassic Park de algodón de carpincho orehistórico', 1500.50, 19, '8ffb025395630ddd0750ff6d3f83f4f9.webp', 300),
(37, 'Sombrero', 'Sombrero estilo William de Westworld', 697.89, 19, '9b32ce910d10a75889f5b412ad443f33.jpeg', 300),
(56, 'Broche', 'Broche comun', 250.00, 19, '238201fa7729e246e65322436238694d.png', 300),
(57, 'Intercambiador de 5 etapas', 'Intercambiador de 5 etapas. El paquete de planos incluye 7 hojas con todos los detalles constructivos para cada parte, manual de fabricacion, welding map, manual de calidad (DataaBook) y manual de montaje.', 32500.00, 59, '2692542820cdc92c4b50578a6674c77b.webp', 300),
(76, 'Halo Infinite', 'Shooter en primera persona basado en una historia futurista que toma acción en el espacio.', 5000.00, 63, 'b98ffca01d16135fa7ff08de7b34a032.webp', 300),
(77, 'Starcraft', 'Juego de estrategia en tiempo real. Combate entre humanos y razas alienígenas', 900.00, 63, 'cad60b7f8b8b484c0fe3832e737eb501.jpg', 300),
(78, 'Doom', 'Shooter en primera persona que toma lugar en el planeta Marte. Combate contra demonios y criaturas extrañas.', 300.00, 63, '039019382f16ea31d4a129cab7c4a2bb.webp', 300),
(79, 'World of Warcraft', 'Juego multijugador masivo online del género Rol', 10000.00, 63, '1c2a30f9007c031e822f41c1f15c557e.webp', 300),
(80, 'Curso', 'Cursos de las áreas adeministrativas, salud, técnicas y informáticas', 7000.00, 64, 'ea87127129991da79f941c84bbf3aa99.jpeg', 300),
(81, 'Rocket League', 'Juego multijugador online que mezclas autos de todo tipo y fútbol. Consiste en jugar un partido donde los jugadores usen vahículos para golpear la pelota.', 300.00, 63, '707cc58361bbff9cd9e900652e757948.webp', 300),
(82, 'Página web', 'Servicio de deiseño de software personalizados para personas, negocios o empresas.', 60000.00, 65, 'b8f98f1c1de5070f46f1bf6d65c6509f.png', 300),
(83, 'Tecnicatura en Programación', 'Carrera de Técnico Superior en Programación de TECLAB', 424000.00, 64, 'cf15b21a5309d4fcbd6a021168a0a296.png', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `agent` varchar(150) NOT NULL,
  `navegador` varchar(30) NOT NULL,
  `dispositivo` varchar(30) NOT NULL,
  `so` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `origen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conexiones`
--
ALTER TABLE `conexiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

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
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `conexiones`
--
ALTER TABLE `conexiones`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
