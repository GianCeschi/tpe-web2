-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2022 a las 01:59:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(12, 'zapatillas'),
(19, 'pantalones'),
(21, 'buzos'),
(38, 'remeras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `precio` int(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `modelo`, `marca`, `precio`, `id_categoria`, `imagen`) VALUES
(78, 'Adidas Bad Bunny', 'Adidas', 148999, 12, 'uploads/6349624d5ea58.jpg'),
(79, 'Drew House', 'Drew', 59757, 21, 'uploads/63496299e7af9.jpg'),
(80, 'Flowers ', 'Billie Eilish', 18058, 38, 'uploads/634962cfbe6fc.jpg'),
(83, 'Nike Air Max', 'Nike', 78129, 12, 'uploads/634963a64fd3e.jpg'),
(84, 'Travis Scott Cactus', 'Travis Scott', 29999, 38, 'uploads/634963d52c29d.jpg'),
(85, 'Jordan 1', 'Nike', 82000, 12, 'uploads/634963fe3b8ed.jpg'),
(86, 'Nike', 'Nike', 41000, 12, 'uploads/634964c5b1b9e.jpg'),
(87, 'Air Force 1 ', 'Nike', 74555, 12, 'uploads/634966a3eccfe.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contraseña` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `contraseña`) VALUES
(1, 'gian_ceschinelli', 'gian@gmail.com', '$2a$12$1m6s0z2.I/bJLHL0PdxUaeutZCXpgmhXzSLyhp.xdysqJIIxKY9c6'),
(2, 'web', 'web@gmail.com', '$2a$12$54NmJ/UlZp1nJRcjyCHAsu3BLg3vg9x4L9WSTyjzheg5vSCm71M5.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
