-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-02-2020 a las 13:38:01
-- Versión del servidor: 5.6.45
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apcicom_apci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_permitidos`
--

CREATE TABLE `metodos_permitidos` (
  `id_m` int(11) NOT NULL,
  `metodo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fregistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodos_permitidos`
--

INSERT INTO `metodos_permitidos` (`id_m`, `metodo`, `ruta`, `fregistro`) VALUES
(1, 'NOSOTROS', 'nosotros', '2019-06-20 00:05:34'),
(2, 'EMPRESAS APCI', 'empresas-apci', '2019-06-20 00:05:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `metodos_permitidos`
--
ALTER TABLE `metodos_permitidos`
  ADD PRIMARY KEY (`id_m`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `metodos_permitidos`
--
ALTER TABLE `metodos_permitidos`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
