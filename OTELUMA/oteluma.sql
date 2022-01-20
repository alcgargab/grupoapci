-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 18:06:13
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oteluma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `Titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `Titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `Titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `Estilo` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`idBanner`, `Ruta`, `Imagen`, `Titulo1`, `Titulo2`, `Titulo3`, `Estilo`, `FRegistro`) VALUES
(1, 'home', 'Oteluma_Banner1.png', '{\r\n  \"texto\": \"Ofertas especiales\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"50% off\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"Termina el 10 de Mayo\",\r\n  \"color\": \"#ffffff\"\r\n}', 'textoDer', '2019-04-16 02:24:22'),
(2, 'lo-mas-vendido', 'Oteluma_Banner2.png', '{\r\n  \"texto\": \"Ofertas especiales\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"50% off\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"Termina el 10 de Mayo\",\r\n  \"color\": \"#ffffff\"\r\n}', 'textoIzq', '2019-04-16 02:43:26'),
(3, 'lo-mas-visto', 'Oteluma_Banner3.png', '{\r\n  \"texto\": \"Ofertas especiales\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"50% off\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"Termina el 10 de Mayo\",\r\n  \"color\": \"#ffffff\"\r\n}', 'textoCenter', '2019-04-16 02:24:31'),
(4, 'Productos', 'Oteluma_Banner4.png', '{\r\n  \"texto\": \"Ofertas especiales\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"50% off\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"Termina el 10 de Mayo\",\r\n  \"color\": \"#ffffff\"\r\n}', 'textoDer', '2019-04-16 02:24:35'),
(5, 'Producto', 'Oteluma_Banner5.png', '{\r\n  \"texto\": \"Ofertas especiales\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"50% off\",\r\n  \"color\": \"#ffffff\"\r\n}', '{\r\n  \"texto\": \"Termina el 10 de Mayo\",\r\n  \"color\": \"#ffffff\"\r\n}', 'textoIzq', '2019-04-16 02:24:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCat` int(11) NOT NULL,
  `Categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCat`, `Categoria`, `Ruta`, `FRegistro`) VALUES
(1, 'MEZCAL', 'mezcal', '2019-03-13 00:40:34'),
(2, 'MEZCAL ARTESANAL', 'mezcal-artesanal', '2019-03-13 00:40:34'),
(3, 'MEZCAL ANCESTRAL', 'mezcal-ancestral', '2019-03-13 00:40:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dia`
--

CREATE TABLE `dia` (
  `idDia` int(11) NOT NULL,
  `Dia` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dia`
--

INSERT INTO `dia` (`idDia`, `Dia`, `Ruta`, `FRegistro`) VALUES
(1, '1', '1', '2019-04-27 20:20:42'),
(2, '2', '2', '2019-04-27 20:20:42'),
(3, '3', '3', '2019-04-27 20:20:42'),
(4, '4', '4', '2019-04-27 20:20:42'),
(5, '5', '5', '2019-04-27 20:20:42'),
(6, '6', '6', '2019-04-27 20:20:42'),
(7, '7', '7', '2019-04-27 20:20:42'),
(8, '8', '8', '2019-04-27 20:20:42'),
(9, '9', '9', '2019-04-27 20:20:42'),
(10, '10', '10', '2019-04-27 20:20:42'),
(11, '11', '11', '2019-04-27 20:20:42'),
(12, '12', '12', '2019-04-27 20:20:42'),
(13, '13', '13', '2019-04-27 20:20:42'),
(14, '14', '14', '2019-04-27 20:20:42'),
(15, '15', '15', '2019-04-27 20:20:42'),
(16, '16', '16', '2019-04-27 20:20:42'),
(17, '17', '17', '2019-04-27 20:20:42'),
(18, '18', '18', '2019-04-27 20:20:42'),
(19, '19', '19', '2019-04-27 20:20:42'),
(20, '20', '20', '2019-04-27 20:20:42'),
(21, '21', '21', '2019-04-27 20:20:42'),
(22, '22', '22', '2019-04-27 20:20:42'),
(23, '23', '23', '2019-04-27 20:20:42'),
(24, '24', '24', '2019-04-27 20:20:42'),
(25, '25', '25', '2019-04-27 20:20:42'),
(26, '26', '26', '2019-04-27 20:20:42'),
(27, '27', '27', '2019-04-27 20:20:42'),
(28, '28', '28', '2019-04-27 20:20:42'),
(29, '29', '29', '2019-04-27 20:20:42'),
(30, '30', '30', '2019-04-27 20:20:42'),
(31, '31', '31', '2019-04-27 20:20:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasemana`
--

CREATE TABLE `diasemana` (
  `idDiaSemana` int(11) NOT NULL,
  `Día` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `diasemana`
--

INSERT INTO `diasemana` (`idDiaSemana`, `Día`, `Ruta`, `FRegistro`) VALUES
(1, 'LUNES', 'lunes', '2019-04-27 20:09:19'),
(2, 'MARTES', 'martes', '2019-04-27 20:09:19'),
(3, 'MIÉRCOLES', 'miercoles', '2019-04-27 20:09:19'),
(4, 'JUEVES', 'jueves', '2019-04-27 20:09:19'),
(5, 'VIERNES', 'viernes', '2019-04-27 20:09:19'),
(6, 'SÁBADO', 'sabado', '2019-04-27 20:26:02'),
(7, 'DOMINGO', 'domingo', '2019-04-27 20:09:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mes`
--

CREATE TABLE `mes` (
  `idMes` int(11) NOT NULL,
  `Mes` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mes`
--

INSERT INTO `mes` (`idMes`, `Mes`, `Ruta`, `FRegistro`) VALUES
(1, 'ENERO', 'enero', '2019-04-27 20:14:52'),
(2, 'FEBRERO', 'febrero', '2019-04-27 20:14:52'),
(3, 'MARZO', 'marzo', '2019-04-27 20:14:52'),
(4, 'ABRIL', 'abril', '2019-04-27 20:14:52'),
(5, 'MAYO', 'mayo', '2019-04-27 20:14:52'),
(6, 'JUNIO', 'junio', '2019-04-27 20:14:52'),
(7, 'JULIO', 'julio', '2019-04-27 20:14:52'),
(8, 'AGOSTO', 'agosto', '2019-04-27 20:14:52'),
(9, 'SEPTIEMBRE', 'septiembre', '2019-04-27 20:14:52'),
(10, 'OCTUBRE', 'octubre', '2019-04-27 20:14:52'),
(11, 'NOVIEMBRE', 'noviembre', '2019-04-27 20:14:52'),
(12, 'DICIEMBRE', 'diciembre', '2019-04-27 20:14:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `idPlantilla` int(11) NOT NULL,
  `BarraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `TextoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `ColorFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `ColorTexto` text COLLATE utf8_spanish_ci NOT NULL,
  `Logo` text COLLATE utf8_spanish_ci NOT NULL,
  `Icono` text COLLATE utf8_spanish_ci NOT NULL,
  `RedesSociales` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`idPlantilla`, `BarraSuperior`, `TextoSuperior`, `ColorFondo`, `ColorTexto`, `Logo`, `Icono`, `RedesSociales`, `FRegistro`) VALUES
(1, '#000000', '#ffffff', '#005e8c', '#ffffff', 'Oteluma_Icon_Logo.png', 'Oteluma_Icon_Logo.png', '[{\r\n  \"red\": \"Oteluma_Icon_F.png\",\r\n  \"estilo\": \"F_Blanco\",\r\n  \"url\": \"http://facebook.com/\"\r\n}, {\r\n  \"red\": \"Oteluma_Icon_I.png\",\r\n  \"estilo\": \"I_Blanco\",\r\n  \"url\": \"http://Instagram.com/\"\r\n}, {\r\n  \"red\": \"Oteluma_Icon_T.png\",\r\n  \"estilo\": \"T_Blanco\",\r\n  \"url\": \"http://twitter.com/\"\r\n}, {\r\n  \"red\": \"Oteluma_Icon_G.png\",\r\n  \"estilo\": \"G_Blanco\",\r\n  \"url\": \"http://google.com/\"\r\n}, {\r\n  \"red\": \"Oteluma_Icon_Li.png\",\r\n  \"estilo\": \"L_Blanco\",\r\n  \"url\": \"https://mx.linkedin.com/\"\r\n}]', '2019-07-03 03:38:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProd` int(11) NOT NULL,
  `P_idSubCat` int(11) NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `Titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `Titular` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `Detalles` text COLLATE utf8_spanish_ci NOT NULL,
  `Precio` float NOT NULL,
  `Portada` text COLLATE utf8_spanish_ci NOT NULL,
  `Vistas` int(11) NOT NULL,
  `Ventas` int(11) NOT NULL,
  `OfertadoPorCat` int(11) NOT NULL,
  `OfertadoPorSubCat` int(11) NOT NULL,
  `Oferta` int(11) NOT NULL,
  `PrecioOferta` float NOT NULL,
  `DescuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `Multimedia` text COLLATE utf8_spanish_ci NOT NULL,
  `FinOferta` datetime NOT NULL,
  `Nuevo` int(11) NOT NULL,
  `Peso` float NOT NULL,
  `Entrega` float NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProd`, `P_idSubCat`, `Ruta`, `Titulo`, `Titular`, `Descripcion`, `Detalles`, `Precio`, `Portada`, `Vistas`, `Ventas`, `OfertadoPorCat`, `OfertadoPorSubCat`, `Oferta`, `PrecioOferta`, `DescuentoOferta`, `imgOferta`, `Multimedia`, `FinOferta`, `Nuevo`, `Peso`, `Entrega`, `FRegistro`) VALUES
(1, 1, 'Espadin', 'Espadin', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 1500, 'Producto1.png', 57, 100, 0, 0, 1, 0, 0, 'Producto1.png', '[{   \"imagen\": \"Producto1.png\" }, {   \"imagen\": \"Producto2.png\" }, {   \"imagen\": \"Producto3.png\" }, {   \"imagen\": \"Producto4.png\" }, {   \"imagen\": \"Producto9.png\" }]', '2019-03-31 00:00:00', 1, 2, 15, '2020-01-24 05:55:11'),
(2, 1, 'Espadin1', 'Espadin 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2000, 'Producto2.png', 20, 11, 0, 1, 0, 1000, 50, 'Producto2.png', '', '2019-03-31 00:00:00', 0, 2, 15, '2019-05-24 01:21:54'),
(3, 1, 'Espadin2', 'Espadin 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2500, 'Producto3.png', 13, 12, 1, 0, 0, 2000, 30, 'Producto3.png', '', '2019-03-31 00:00:00', 1, 2, 15, '2019-05-08 22:00:05'),
(4, 1, 'Espadin3', 'Espadin 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 3000, 'Producto4.png', 58, 13, 1, 0, 0, 2500, 35, 'Producto4.png', '', '2019-03-31 00:00:00', 0, 2, 15, '2019-05-08 01:06:04'),
(5, 5, 'Espadin4', 'Espadin 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 1500, 'Producto9.png', 52, 140, 0, 0, 1, 1369, 25, 'Producto9.png', '', '2019-04-30 00:00:00', 0, 2, 15, '2019-05-08 21:57:24'),
(6, 6, 'Espadin5', 'Espadin 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2000, 'Producto10.png', 10, 15, 0, 1, 0, 1765, 60, 'Producto10.png', '', '2019-04-30 00:00:00', 0, 2, 15, '2019-04-16 23:46:10'),
(7, 7, 'Espadin6', 'Espadin 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2500, 'Producto11.png', 11, 16, 1, 0, 0, 1626, 64, 'Producto11.png', '', '2019-04-30 00:00:00', 1, 2, 15, '2019-04-16 23:46:12'),
(8, 8, 'Espadin7', 'Espadin 7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 3000, 'Producto12.png', 12, 17, 1, 0, 0, 2540, 24, 'Producto12.png', '', '2019-04-30 00:00:00', 0, 2, 15, '2019-04-16 23:46:14'),
(9, 9, 'Espadin8', 'Espadin 8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 1500, 'Producto1.png', 71, 180, 0, 0, 1, 1240, 24, 'Producto1.png', '', '2019-05-31 00:00:00', 1, 2, 15, '2020-01-24 05:54:32'),
(10, 10, 'Espadin9', 'Espadin 9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2000, 'Producto3.png', 26, 19, 0, 1, 0, 1452, 32, 'Producto3.png', '', '2019-05-31 00:00:00', 0, 2, 15, '2019-04-25 03:38:23'),
(11, 11, 'Espadin10', 'Espadin 10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2500, 'Producto10.png', 26, 200, 1, 0, 0, 0, 0, 'Producto10.png', '', '2019-05-31 00:00:00', 1, 2, 15, '2020-01-04 00:34:03'),
(12, 11, 'Espadin11', 'Espadin 11', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia ipsa labore tempore ex fugit a nulla iure totam illo omnis nemo cupiditate facilis odit velit, perspiciatis earum nostrum esse. Neque!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 3000, 'Producto12.png', 25, 21, 1, 0, 0, 0, 0, 'Producto12.png', '', '2019-05-31 00:00:00', 0, 2, 15, '2019-05-08 01:06:43'),
(13, 1, 'Espadin12', 'Espadin 12', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam distinctio ea voluptas nulla', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam distinctio ea voluptas nulla facere eaque doloribus reprehenderit modi! Atque maxime doloremque harum corporis eaque mollitia magnam quam, nobis sequi a!', '{   \"Añejado\": \"10 años\",   \"Tamaño\": \"750ml\",   \"Agave\": \"Tobalá\" }', 2500, 'Producto1.png', 801, 1500, 0, 0, 1, 2000, 15, 'Producto1.png', '', '2019-06-30 00:00:00', 1, 2, 15, '2020-01-24 05:54:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rmodo`
--

CREATE TABLE `rmodo` (
  `idRModo` int(11) NOT NULL,
  `Modo` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rmodo`
--

INSERT INTO `rmodo` (`idRModo`, `Modo`, `FRegistro`) VALUES
(1, 'OTELUMA', '2019-05-03 22:20:55'),
(2, 'FACEBOOK', '2019-05-03 22:20:55'),
(3, 'GOOGLE', '2019-05-03 22:20:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semana`
--

CREATE TABLE `semana` (
  `idDiaSemana` int(11) NOT NULL,
  `Semana` int(11) NOT NULL,
  `Ruta` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `semana`
--

INSERT INTO `semana` (`idDiaSemana`, `Semana`, `Ruta`, `FRegistro`) VALUES
(1, 1, 1, '2019-04-27 20:46:14'),
(2, 2, 2, '2019-04-27 20:46:14'),
(3, 3, 3, '2019-04-27 20:46:14'),
(4, 4, 4, '2019-04-27 20:46:14'),
(5, 5, 5, '2019-04-27 20:46:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `idSesion` int(11) NOT NULL,
  `idS_Usuario` int(11) NOT NULL,
  `Ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `DireccionIP` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`idSesion`, `idS_Usuario`, `Ubicacion`, `DireccionIP`, `FRegistro`) VALUES
(1, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-06 21:33:36'),
(4, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-07 22:53:43'),
(5, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-07 23:35:02'),
(6, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 02:46:42'),
(7, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 02:52:07'),
(8, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 03:47:52'),
(9, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 03:48:00'),
(10, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 19:32:34'),
(13, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 19:43:34'),
(15, 1, ' 19.2464696 -99.1013498', '::1', '2019-05-08 19:54:52'),
(18, 4, ' 19.394061 -99.09582909999999', '::1', '2019-05-08 22:10:34'),
(19, 4, ' 19.394061 -99.09582909999999', '::1', '2019-05-08 22:13:04'),
(20, 4, ' 19.394061 -99.09582909999999', '::1', '2019-05-08 22:16:09'),
(21, 6, ' 19.394061 -99.09582909999999', '::1', '2019-05-24 01:33:51'),
(22, 1, ' 19.399074 -99.0942815', '127.0.0.1', '2020-01-04 00:32:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `idSlide` int(11) NOT NULL,
  `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` text COLLATE utf8_spanish_ci NOT NULL,
  `texto` text COLLATE utf8_spanish_ci NOT NULL,
  `botonProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`idSlide`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo`, `subtitulo`, `texto`, `botonProducto`, `ruta`, `FRegistro`) VALUES
(1, 'OBackground.png', 'SlideOpcion1', 'OSlide1.png', '{\r\n  \"top\": \"1%\",\r\n  \"right\": \"10%\",\r\n  \"width\": \"38%\",\r\n  \"left\": \"\"\r\n}', '{\r\n  \"top\": \"20%\",\r\n  \"width\": \"40%\",\r\n  \"left\": \"10%\",\r\n  \"right\": \"\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum\",\r\n  \"color\": \"#004f75\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor\",\r\n  \"color\": \"#005c8a\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor sit\",\r\n  \"color\": \"#006a9e\"\r\n}', '<button class=\"btn btn-default back_Color text-uppercase\" type=\"button\" name=\"button\">\r\n                  ver producto <i class=\"fas fa-angle-right\"> </i>\r\n                </button>', '#', '2019-04-15 20:28:42'),
(2, 'OBackground.png', 'SlideOpcion2', 'OSlide2.png', '{\r\n  \"top\": \"1%\",\r\n  \"width\": \"38%\",\r\n  \"left\": \"10%\",\r\n  \"right\": \"\"\r\n}', '{\r\n  \"top\": \"20%\",\r\n  \"right\": \"10%\",\r\n  \"width\": \"40%\",\r\n  \"left\": \"\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum\",\r\n  \"color\": \"#004f75\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor\",\r\n  \"color\": \"#005c8a\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor sit\",\r\n  \"color\": \"#006a9e\"\r\n}', '<button class=\"btn btn-default back_Color text-uppercase\" type=\"button\" name=\"button\">\r\n                  ver producto <i class=\"fas fa-angle-right\"> </i>\r\n                </button>', '#', '2019-04-15 20:35:22'),
(3, 'OBackground.png', 'SlideOpcion2', 'OSlide3.png', '{\r\n  \"top\": \"1%\",\r\n  \"width\": \"38%\",\r\n  \"left\": \"10%\",\r\n  \"right\": \"\"\r\n}', '{\r\n  \"top\": \"20%\",\r\n  \"right\": \"10%\",\r\n  \"width\": \"40%\",\r\n  \"left\": \"\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum\",\r\n  \"color\": \"#004f75\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor\",\r\n  \"color\": \"#005c8a\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor sit\",\r\n  \"color\": \"#006a9e\"\r\n}', '<button class=\"btn btn-default back_Color text-uppercase\" type=\"button\" name=\"button\">\r\n                  ver producto <i class=\"fas fa-angle-right\"> </i>\r\n                </button>', '#', '2019-04-15 20:35:27'),
(4, 'OBackground.png', 'SlideOpcion1', 'OSlide4.png', '{\r\n  \"top\": \"1%\",\r\n  \"right\": \"10%\",\r\n  \"width\": \"38%\",\r\n  \"left\": \"\"\r\n}', '{\r\n  \"top\": \"20%\",\r\n  \"width\": \"40%\",\r\n  \"left\": \"10%\",\r\n  \"right\": \"\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum\",\r\n  \"color\": \"#004f75\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor\",\r\n  \"color\": \"#005c8a\"\r\n}', '{\r\n  \"texto\": \"Lorem Ipsum dolor sit\",\r\n  \"color\": \"#006a9e\"\r\n}', '<button class=\"btn btn-default back_Color text-uppercase\" type=\"button\" name=\"button\">\r\n                  ver producto <i class=\"fas fa-angle-right\"> </i>\r\n                </button>', '#', '2019-04-15 20:35:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL,
  `Status` text COLLATE utf8_spanish_ci NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`idStatus`, `Status`, `Valor`) VALUES
(1, 'Desactivado', 0),
(2, 'Activado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubCat` int(11) NOT NULL,
  `Sub_idCat` int(11) NOT NULL,
  `SubCategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `Ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCat`, `Sub_idCat`, `SubCategoria`, `Ruta`, `FRegistro`) VALUES
(1, 1, 'JOVEN', 'joven', '2019-03-13 00:47:57'),
(2, 1, 'REPOSADO', 'reposado', '2019-03-13 00:47:57'),
(3, 1, 'AÑEJO', 'anejo', '2019-03-13 00:49:26'),
(4, 1, 'MADURADO EN VIDRIO', 'madurado-en-vidrio', '2019-03-13 00:47:57'),
(5, 2, 'JOVEN2', 'joven2', '2019-03-14 05:21:08'),
(6, 2, 'REPOSADO2', 'reposado2', '2019-03-23 01:55:06'),
(7, 2, 'AÑEJO2', 'anejo2', '2019-03-23 01:55:09'),
(8, 2, 'MADURADO EN VIDRIO2', 'madurado-en-vidrio2', '2019-03-23 01:55:13'),
(9, 3, 'JOVEN3', 'joven3', '2019-03-14 05:21:13'),
(10, 3, 'REPOSADO3', 'reposado3', '2019-03-23 01:55:15'),
(11, 3, 'AÑEJO3', 'anejo3', '2019-03-23 01:55:20'),
(12, 3, 'MADURADO EN VIDRIO3', 'madurado-en-vidrio3', '2019-03-23 01:55:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` text COLLATE utf8_spanish_ci NOT NULL,
  `Password` text COLLATE utf8_spanish_ci NOT NULL,
  `Passwordmd5` text COLLATE utf8_spanish_ci NOT NULL,
  `CorreoElectronico` text COLLATE utf8_spanish_ci NOT NULL,
  `CorreoElectronicoMd5` text COLLATE utf8_spanish_ci NOT NULL,
  `RModo` int(11) NOT NULL,
  `Foto` text COLLATE utf8_spanish_ci NOT NULL,
  `RVerificacion` int(11) NOT NULL,
  `Ubicacion` text COLLATE utf8_spanish_ci NOT NULL,
  `DireccionIP` text COLLATE utf8_spanish_ci NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `Apellido`, `Password`, `Passwordmd5`, `CorreoElectronico`, `CorreoElectronicoMd5`, `RModo`, `Foto`, `RVerificacion`, `Ubicacion`, `DireccionIP`, `FRegistro`) VALUES
(1, 'GABRIEL', 'ALCARAZ', 'GABO', '4d9510e4daaba2d74bfaf6e236be7cf1', 'desarrollo@apci.com.mx', '2006f27c75809bc143ac5c51cc3b0467', 1, 'Oteluma_Icon_U.png', 2, ' 19.2464696 -99.1013498', '::1', '2019-05-08 02:51:48'),
(4, 'GABRIEL ALCARAZ GARCIA', 'NULL', 'NULL', 'NULL', 'prueba@prueba.com', 'czhjcbjzxhczx', 2, 'http://graph.facebook.com/2105096862860314/picture?type=large', 1, ' 19.394061 -99.09582909999999', '::1', '2019-05-24 01:32:40'),
(6, 'GABRIEL', 'ALCARAZ', 'pass', '1a1dc91c907325c69271ddf0c944bc72', 'gabriel03022012@hotmail.com', 'cda5631c0409b1218994bdda94fb133a', 1, 'Oteluma_Icon_U1.png', 2, ' 19.394061 -99.09582909999999', '::1', '2019-05-24 01:33:21'),
(10, 'GABRIEL', 'ALCARAZ', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'desarrollo@televiales.net', 'b2888e80af2c3ed658579ae181520520', 1, 'Oteluma_Icon_U1.png', 1, ' 19.3991026 -99.0943511', '127.0.0.1', '2019-07-05 23:47:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotaldíasemana`
--

CREATE TABLE `vistastotaldíasemana` (
  `idVTotalDiaSemana` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TDS_id_Mes` int(11) NOT NULL,
  `TDS_id_Dia` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotaldíasemanac`
--

CREATE TABLE `vistastotaldíasemanac` (
  `idVTotalDiaSemanaCat` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TDSC_id_Mes` int(11) NOT NULL,
  `TDSC_id_Dia` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotaldíasemanap`
--

CREATE TABLE `vistastotaldíasemanap` (
  `idVTotalDiaSemanaP` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TDSP_id_Mes` int(11) NOT NULL,
  `TDSP_id_Dia` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotaldíasemanasc`
--

CREATE TABLE `vistastotaldíasemanasc` (
  `idVTotalDiaSemanaSC` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TDSSC_id_Mes` int(11) NOT NULL,
  `TDSSC_id_Dia` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalmes`
--

CREATE TABLE `vistastotalmes` (
  `idVTotalMes` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TM_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalmesc`
--

CREATE TABLE `vistastotalmesc` (
  `idVTotalMesC` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TMC_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalmesp`
--

CREATE TABLE `vistastotalmesp` (
  `idVTotalMesP` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TMP_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalmessc`
--

CREATE TABLE `vistastotalmessc` (
  `idVTotalMesSC` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TMSC_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalsemana`
--

CREATE TABLE `vistastotalsemana` (
  `idVTotalSemana` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TS_id_Dia_Semana` int(11) NOT NULL,
  `TS_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalsemanac`
--

CREATE TABLE `vistastotalsemanac` (
  `idVTotalSemanaC` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TSC_id_Dia_Semana` int(11) NOT NULL,
  `TSC_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalsemanap`
--

CREATE TABLE `vistastotalsemanap` (
  `idVTotalSemanaP` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TSP_id_Dia_Semana` int(11) NOT NULL,
  `TSP_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vistastotalsemanasc`
--

CREATE TABLE `vistastotalsemanasc` (
  `idVTotalSemanaSC` int(11) NOT NULL,
  `NumVistas` text COLLATE utf8_spanish_ci NOT NULL,
  `TSSC_id_Dia_Semana` int(11) NOT NULL,
  `TSSC_id_Mes` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCat`);

--
-- Indices de la tabla `dia`
--
ALTER TABLE `dia`
  ADD PRIMARY KEY (`idDia`);

--
-- Indices de la tabla `diasemana`
--
ALTER TABLE `diasemana`
  ADD PRIMARY KEY (`idDiaSemana`);

--
-- Indices de la tabla `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`idMes`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`idPlantilla`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `is_SubCat` (`P_idSubCat`);

--
-- Indices de la tabla `rmodo`
--
ALTER TABLE `rmodo`
  ADD PRIMARY KEY (`idRModo`);

--
-- Indices de la tabla `semana`
--
ALTER TABLE `semana`
  ADD PRIMARY KEY (`idDiaSemana`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`idSesion`),
  ADD KEY `idS_Usuario` (`idS_Usuario`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idSlide`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubCat`),
  ADD KEY `Sub_idCat` (`Sub_idCat`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `RModo` (`RModo`),
  ADD KEY `RVerificacion` (`RVerificacion`);

--
-- Indices de la tabla `vistastotaldíasemana`
--
ALTER TABLE `vistastotaldíasemana`
  ADD PRIMARY KEY (`idVTotalDiaSemana`),
  ADD KEY `idMes` (`TDS_id_Mes`),
  ADD KEY `idDia` (`TDS_id_Dia`);

--
-- Indices de la tabla `vistastotaldíasemanac`
--
ALTER TABLE `vistastotaldíasemanac`
  ADD PRIMARY KEY (`idVTotalDiaSemanaCat`),
  ADD KEY `TDSC_id_Dia` (`TDSC_id_Dia`),
  ADD KEY `TDSC_id_Mes` (`TDSC_id_Mes`);

--
-- Indices de la tabla `vistastotaldíasemanap`
--
ALTER TABLE `vistastotaldíasemanap`
  ADD PRIMARY KEY (`idVTotalDiaSemanaP`),
  ADD KEY `TDSP_id_Dia` (`TDSP_id_Dia`),
  ADD KEY `TDSP_id_Mes` (`TDSP_id_Mes`);

--
-- Indices de la tabla `vistastotaldíasemanasc`
--
ALTER TABLE `vistastotaldíasemanasc`
  ADD PRIMARY KEY (`idVTotalDiaSemanaSC`),
  ADD KEY `TDSSC_id_Dia` (`TDSSC_id_Dia`),
  ADD KEY `TDSSC_id_Mes` (`TDSSC_id_Mes`);

--
-- Indices de la tabla `vistastotalmes`
--
ALTER TABLE `vistastotalmes`
  ADD PRIMARY KEY (`idVTotalMes`),
  ADD KEY `TM_id_Mes` (`TM_id_Mes`);

--
-- Indices de la tabla `vistastotalmesc`
--
ALTER TABLE `vistastotalmesc`
  ADD PRIMARY KEY (`idVTotalMesC`),
  ADD KEY `TMC_id_Mes` (`TMC_id_Mes`);

--
-- Indices de la tabla `vistastotalmesp`
--
ALTER TABLE `vistastotalmesp`
  ADD PRIMARY KEY (`idVTotalMesP`),
  ADD KEY `TMP_id_Mes` (`TMP_id_Mes`);

--
-- Indices de la tabla `vistastotalmessc`
--
ALTER TABLE `vistastotalmessc`
  ADD PRIMARY KEY (`idVTotalMesSC`),
  ADD KEY `TMSC_id_Mes` (`TMSC_id_Mes`);

--
-- Indices de la tabla `vistastotalsemana`
--
ALTER TABLE `vistastotalsemana`
  ADD KEY `TS_id_Dia_Semana` (`TS_id_Dia_Semana`),
  ADD KEY `TS_id_Mes` (`TS_id_Mes`);

--
-- Indices de la tabla `vistastotalsemanac`
--
ALTER TABLE `vistastotalsemanac`
  ADD PRIMARY KEY (`idVTotalSemanaC`),
  ADD KEY `TSC_id_Dia_Semana` (`TSC_id_Dia_Semana`),
  ADD KEY `TSC_id_Mes` (`TSC_id_Mes`);

--
-- Indices de la tabla `vistastotalsemanap`
--
ALTER TABLE `vistastotalsemanap`
  ADD PRIMARY KEY (`idVTotalSemanaP`),
  ADD KEY `TSP_id_Dia_Semana` (`TSP_id_Dia_Semana`),
  ADD KEY `TSP_id_Mes` (`TSP_id_Mes`);

--
-- Indices de la tabla `vistastotalsemanasc`
--
ALTER TABLE `vistastotalsemanasc`
  ADD PRIMARY KEY (`idVTotalSemanaSC`),
  ADD KEY `TSSC_id_Dia_Semana` (`TSSC_id_Dia_Semana`),
  ADD KEY `TSSC_id_Mes` (`TSSC_id_Mes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dia`
--
ALTER TABLE `dia`
  MODIFY `idDia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `diasemana`
--
ALTER TABLE `diasemana`
  MODIFY `idDiaSemana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mes`
--
ALTER TABLE `mes`
  MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `idPlantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `rmodo`
--
ALTER TABLE `rmodo`
  MODIFY `idRModo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `semana`
--
ALTER TABLE `semana`
  MODIFY `idDiaSemana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sesion`
--
ALTER TABLE `sesion`
  MODIFY `idSesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `idSlide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `idStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubCat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vistastotaldíasemana`
--
ALTER TABLE `vistastotaldíasemana`
  MODIFY `idVTotalDiaSemana` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotaldíasemanac`
--
ALTER TABLE `vistastotaldíasemanac`
  MODIFY `idVTotalDiaSemanaCat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotaldíasemanap`
--
ALTER TABLE `vistastotaldíasemanap`
  MODIFY `idVTotalDiaSemanaP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotaldíasemanasc`
--
ALTER TABLE `vistastotaldíasemanasc`
  MODIFY `idVTotalDiaSemanaSC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalmes`
--
ALTER TABLE `vistastotalmes`
  MODIFY `idVTotalMes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalmesc`
--
ALTER TABLE `vistastotalmesc`
  MODIFY `idVTotalMesC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalmesp`
--
ALTER TABLE `vistastotalmesp`
  MODIFY `idVTotalMesP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalmessc`
--
ALTER TABLE `vistastotalmessc`
  MODIFY `idVTotalMesSC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalsemanac`
--
ALTER TABLE `vistastotalsemanac`
  MODIFY `idVTotalSemanaC` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalsemanap`
--
ALTER TABLE `vistastotalsemanap`
  MODIFY `idVTotalSemanaP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vistastotalsemanasc`
--
ALTER TABLE `vistastotalsemanasc`
  MODIFY `idVTotalSemanaSC` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `is_SubCat` FOREIGN KEY (`P_idSubCat`) REFERENCES `subcategoria` (`idSubCat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `idS_Usuario` FOREIGN KEY (`idS_Usuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `Sub_idCat` FOREIGN KEY (`Sub_idCat`) REFERENCES `categorias` (`idCat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `RModo` FOREIGN KEY (`RModo`) REFERENCES `rmodo` (`idRModo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RVerificacion` FOREIGN KEY (`RVerificacion`) REFERENCES `status` (`idStatus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotaldíasemana`
--
ALTER TABLE `vistastotaldíasemana`
  ADD CONSTRAINT `idDia` FOREIGN KEY (`TDS_id_Dia`) REFERENCES `dia` (`idDia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMes` FOREIGN KEY (`TDS_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotaldíasemanac`
--
ALTER TABLE `vistastotaldíasemanac`
  ADD CONSTRAINT `TDSC_id_Dia` FOREIGN KEY (`TDSC_id_Dia`) REFERENCES `dia` (`idDia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TDSC_id_Mes` FOREIGN KEY (`TDSC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotaldíasemanap`
--
ALTER TABLE `vistastotaldíasemanap`
  ADD CONSTRAINT `TDSP_id_Dia` FOREIGN KEY (`TDSP_id_Dia`) REFERENCES `dia` (`idDia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TDSP_id_Mes` FOREIGN KEY (`TDSP_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotaldíasemanasc`
--
ALTER TABLE `vistastotaldíasemanasc`
  ADD CONSTRAINT `TDSSC_id_Dia` FOREIGN KEY (`TDSSC_id_Dia`) REFERENCES `dia` (`idDia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TDSSC_id_Mes` FOREIGN KEY (`TDSSC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalmes`
--
ALTER TABLE `vistastotalmes`
  ADD CONSTRAINT `TM_id_Mes` FOREIGN KEY (`TM_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalmesc`
--
ALTER TABLE `vistastotalmesc`
  ADD CONSTRAINT `TMC_id_Mes` FOREIGN KEY (`TMC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalmesp`
--
ALTER TABLE `vistastotalmesp`
  ADD CONSTRAINT `TMP_id_Mes` FOREIGN KEY (`TMP_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalmessc`
--
ALTER TABLE `vistastotalmessc`
  ADD CONSTRAINT `TMSC_id_Mes` FOREIGN KEY (`TMSC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalsemana`
--
ALTER TABLE `vistastotalsemana`
  ADD CONSTRAINT `TS_id_Dia_Semana` FOREIGN KEY (`TS_id_Dia_Semana`) REFERENCES `semana` (`idDiaSemana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TS_id_Mes` FOREIGN KEY (`TS_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalsemanac`
--
ALTER TABLE `vistastotalsemanac`
  ADD CONSTRAINT `TSC_id_Dia_Semana` FOREIGN KEY (`TSC_id_Dia_Semana`) REFERENCES `semana` (`idDiaSemana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TSC_id_Mes` FOREIGN KEY (`TSC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalsemanap`
--
ALTER TABLE `vistastotalsemanap`
  ADD CONSTRAINT `TSP_id_Dia_Semana` FOREIGN KEY (`TSP_id_Dia_Semana`) REFERENCES `semana` (`idDiaSemana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TSP_id_Mes` FOREIGN KEY (`TSP_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vistastotalsemanasc`
--
ALTER TABLE `vistastotalsemanasc`
  ADD CONSTRAINT `TSSC_id_Dia_Semana` FOREIGN KEY (`TSSC_id_Dia_Semana`) REFERENCES `semana` (`idDiaSemana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TSSC_id_Mes` FOREIGN KEY (`TSSC_id_Mes`) REFERENCES `mes` (`idMes`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
