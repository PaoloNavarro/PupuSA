-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 07:48:06
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pupusa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `precio` double NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `descripcion_prod` varchar(150) NOT NULL,
  `categoria` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `image_url`, `descripcion_prod`, `categoria`, `estado`) VALUES
(1, 'Queso', 0.85, 'http://localhost/pupuSA/uploads/64758bedb74fe3.88435395.jpeg', 'Deliciosa pupusa de queso', 1, 1),
(2, 'Frijol con queso', 0.65, 'http://localhost/pupuSA/uploads/64758c59017028.77452456.jpeg', 'Riquísima pupusa de frijol con queso', 1, 1),
(10, 'Revueltas', 0.5, 'http://localhost/pupuSA/uploads/64758c6b468e18.75629892.jpeg', 'Lo mejor de las pupusas revueltas', 1, 1),
(11, 'Camaron', 1.25, 'http://localhost/pupuSA/uploads/64758d708fa377.38488034.jpg', 'Pruébalas ya, riquísimas pupusas de camarón ', 2, 1),
(12, 'Loca', 1.85, 'http://localhost/pupuSA/uploads/64758d9eeec651.56838752.jpg', 'Deléitate con nuestra pupusa loca ', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria` (`categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
