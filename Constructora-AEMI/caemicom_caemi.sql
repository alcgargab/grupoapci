-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 18:02:12
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
-- Base de datos: `caemicom_caemi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id_b` int(11) NOT NULL,
  `imagen_b` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `texto_b` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta_b` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fregistro_b` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id_b`, `imagen_b`, `texto_b`, `ruta_b`, `fregistro_b`) VALUES
(1, 'AEMI_Banner.png', '', '', '2019-07-03 03:17:48'),
(2, 'AEMI_Banner.png', '', 'servicios-caemi', '2019-08-23 23:14:02'),
(3, 'AEMI_Banner.png', '¡trabajemos juntos!', 'contacto', '2019-08-23 22:47:20'),
(4, 'AEMI_Banner.png', 'limpieza', 'limpieza', '2019-09-19 00:30:58'),
(5, 'AEMI_Banner.png', 'hidroneumáticos', 'hidroneumáticos', '2019-09-19 00:30:49'),
(6, 'AEMI_Banner.png', 'hidrosanitarios', 'hidrosanitarios', '2019-09-19 00:30:37'),
(7, 'AEMI_Banner.png', 'mantenimiento en industrias centros comerciales y residencias', 'mantenimiento-en-industrias-centros-comerciales-y-residencias', '2019-09-19 00:31:51'),
(8, 'AEMI_Banner.png', 'Jardineria', 'jardineria', '2019-09-19 00:32:04'),
(9, 'AEMI_Banner.png', '', '', '2019-09-19 00:31:46'),
(10, 'AEMI_Banner.png', 'Fumigación', 'fumigacion', '2019-09-19 00:56:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_c` int(11) NOT NULL,
  `categoria_c` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `icono_c` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_c` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `texto_c` text COLLATE utf8_spanish_ci NOT NULL,
  `servicio_c` int(11) NOT NULL,
  `fregistro_c` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_c`, `categoria_c`, `icono_c`, `ruta_c`, `texto_c`, `servicio_c`, `fregistro_c`) VALUES
(1, 'LIMPIEZA DE ALTURA', 'caemi_high_altitude_cleaning_category.webp', 'limpieza-de-altura', 'MUROS, LETREROS, VIDRIOS Y FACHADAS', 1, '2019-09-18 21:36:37'),
(2, 'LIMPIEZA PERIÓDICA', 'caemi_periodic_cleaning_category.webp', 'limpieza-periodica', 'LIMPIEZA INTERIOR DE TODO TIPO DE EDIFICIOS, OFICINAS,  CENTROS COMERCIALES, EDIFICIOS DE CONGRESOS Y MUSEOS,  CENTROS DEPORTIVOS AEROPUERTOS, CENTROS DE ENSEÑANZA,  HOTELES Y ALOJAMIENTOS TURÍSTICOS', 1, '2019-09-18 21:36:42'),
(3, 'LIMPIEZA GENERAL', 'caemi_overall_cleaning_category.webp', 'limpieza-general', 'LIMPIEZAS PUNTUALES DERIVADAS DE UNA SITUACIÓN PARTICULAR,  HABITUALMENTE RELACIONADAS CON UN EVENTO O UNA NUEVA  CONSTRUCCIÓN (LIMPIEZA DE OBRA NUEVA, REACONDICIONAMIENTO  DE LOCALES, INAGURACIONES, GRANDES EVENTOS DEPORTIVOS Y CULTURALES.', 1, '2019-09-18 21:36:46'),
(4, 'LIMPIEZA ESPECIAL', 'caemi_special_cleaning_category.webp', 'limpieza-especial', 'LIMPIEZA DE TECHOS Y FALSOS TECHOS, ESCALERAS MÉCANICAS,  ELEVADORES, ALFOMBRAS, TAPICERÍAS, MANTENIMIENTO Y  RESTAURACIÓN DE SUELOS Y FACHADAS. ', 1, '2019-09-18 21:36:51'),
(5, '', 'caemi_category_of_hydroneumatics_1.webp', 'hidroneumaticos-1', 'DESAGÜE TOTAL DEL TANQUE HIDRONEUMÁTICO PARA PODER INGRESAR AL INTERIOR DEL MISMO', 2, '2019-09-18 21:36:56'),
(6, '', 'caemi_category_of_hydroneumatics_2.webp', 'hidroneumaticos-2', 'LIMPIEZA GENERAL INTERIOR, LA CUAL COMPRENDE FONDOS, ENVOLVENTE Y TAPAS.', 2, '2019-09-18 21:37:04'),
(7, '', 'caemi_category_of_hydroneumatics_3.webp', 'hidroneumaticos-3', 'APLICACIÓN DE TODAS LAS SUPERFICIES DE UNA SOLUCIÓN DE HIPOCLORITO DE SODIO, PRODUCTO \r\nQUE ESTÁ APROBADO POR CONTROL AMBIENTAL PARA LA DESINFECCIÓN DE TANQUES DE AGUA POTABLE.', 2, '2019-09-18 21:37:07'),
(8, '', 'caemi_category_of_hydroneumatics_4.webp', 'hidroneumaticos-4', 'REEMPLAZO DE LA JUNTA  DE LA TAPA DEL TANQUE HIDRONEUMÁTICO SI FUESE NECESARIO.', 2, '2019-09-18 21:37:09'),
(9, '', 'caemi_category_of_hydroneumatics_5.webp', 'hidroneumaticos-5', 'COLOCACIÓN DE LA TAPA, CAMBIO DE BULONES Y TUERCAS QUE SE ENCUENTREN EN MAL ESTADO.', 2, '2019-09-18 21:37:12'),
(10, '', 'caemi_category_of_hydroneumatics_6.webp', 'hidroneumaticos-6', 'CARGA Y PRUEBA DEL TANQUE HIDRONEUMÁTICO EFECTUANDO LA PUESTA EN MARCHA DEL EQUIPO.', 2, '2019-09-18 21:37:15'),
(11, '', 'caemi_category_of_hydrosanitary_1.webp', 'hidrosanitarios-1', 'INSTALACIONES HIDRÁULICAS', 3, '2019-09-18 21:37:22'),
(12, '', 'caemi_category_of_hydrosanitary_2.webp', 'hidrosanitarios-2', 'INSTALACIONES SANITARIAS Y PLUVIALES', 3, '2019-09-18 21:37:24'),
(13, '', 'caemi_category_of_hydrosanitary_3.webp', 'hidrosanitarios-3', 'MANTENIMIENTO PREVENTIVO Y CORRECTIVO A EQUIPOS DE BOMBEO', 3, '2019-09-18 21:37:28'),
(14, '', 'caemi_category_of_hydrosanitary_4.webp', 'hidrosanitarios-4', 'CÁRCAMOS, BOMBAS SUMERGIBLES Y TABLEROS', 3, '2019-09-18 21:37:31'),
(15, '', 'caemi_category_industrial_maintenance_1.webp', 'mantenimiento-en-industrias-1', 'CONSTRUCCIÓN', 4, '2019-09-18 21:37:38'),
(16, '', 'caemi_category_industrial_maintenance_2.webp', 'mantenimiento-en-industrias-2', 'PROYECTOS', 4, '2019-09-18 21:37:40'),
(17, '', 'caemi_category_industrial_maintenance_3.webp', 'mantenimiento-en-industrias-3', 'REMODELACIÓN DE INTERIORES Y EXTERIORES', 4, '2019-09-18 21:37:45'),
(18, '', 'caemi_category_industrial_maintenance_4.webp', 'mantenimiento-en-industrias-4', 'ACABADOS', 4, '2019-09-18 21:37:47'),
(19, '', 'caemi_category_industrial_maintenance_5.webp', 'mantenimiento-en-industrias-5', 'MANTENIMIENTO EN GENERAL, PREVENTIVO Y CORRECTIVO (EQUIPOS E INSTALACIONES)', 4, '2019-09-18 21:37:51'),
(20, '', 'caemi_category_industrial_maintenance_6.webp', 'mantenimiento-en-industrias-6', 'INSTALACIONES: HIDRIULICAS, SANITARIAS, ELECTRICAS, \r\n\r\nESPECIALES Y SUBESTACIONES', 4, '2019-09-18 21:37:54'),
(21, '', 'caemi_category_gardening_1.webp', 'Jardineria-1', 'LIMPIEZA DE JARDINES', 5, '2019-09-18 23:17:39'),
(22, '', 'caemi_category_gardening_2.webp', 'Jardineria-2', 'MANTENIMIENTO PREVENTIVO Y CORRECTIVO DE JARDINES', 5, '2019-09-18 23:17:41'),
(23, '', 'caemi_category_gardening_3.webp', 'Jardineria-3', 'DISEÑO Y CONSTRUCCIÓN', 5, '2019-09-18 23:17:43'),
(24, '', 'caemi_category_gardening_4.webp', 'Jardineria-4', 'DISEÑO Y MANTENIMIENTO DE JARDINES VERTICALES', 5, '2019-09-18 23:17:45'),
(27, '', 'caemi_category_fumigation_1.webp', 'Fumigacion-1', 'DESINSECTACIÓN: CONTROL DE CUCARACHAS, PULGAS, ARA„AS, HORMIGAS CARPINTERAS, GARRAPATAS, POLILLAS, HORMIGAS ROJAS, ETC.', 7, '2019-09-19 00:49:39'),
(28, '', 'caemi_category_fumigation_2.webp', 'Fumigacion-2', 'DESRATIZACIÓN: CONTROL DE ROEDORES.', 7, '2019-09-19 00:49:39'),
(29, '', 'caemi_category_fumigation_3.webp', 'Fumigacion-3', 'DESINFECTACIÓN: CONTROL DE BACTERIAS Y MICROORGANISMOS NOCIVOS PARA LA SALUD.', 7, '2019-09-19 00:49:39'),
(30, '', 'caemi_category_fumigation_4.webp', 'Fumigacion-4', 'INSECTOCUTORES: PROVISIÓIN Y COLOCACIÓN DE ELEMENTOS ELÉCTRICOS DE CONTROL DE INSECTOS VOLADORES.', 7, '2019-09-19 00:49:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `id_co` int(11) NOT NULL,
  `nombre_co` text COLLATE utf8_spanish_ci NOT NULL,
  `email_co` text COLLATE utf8_spanish_ci NOT NULL,
  `asunto_co` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono_co` text COLLATE utf8_spanish_ci NOT NULL,
  `comentario_co` text COLLATE utf8_spanish_ci NOT NULL,
  `hora_envio_co` time NOT NULL,
  `fecha_envio_co` date NOT NULL,
  `ubicacion_co` text COLLATE utf8_spanish_ci NOT NULL,
  `ip_co` text COLLATE utf8_spanish_ci NOT NULL,
  `recaptcha_co` int(11) NOT NULL,
  `fregistro_co` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headers`
--

CREATE TABLE `headers` (
  `id_h` int(11) NOT NULL,
  `item_h` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta_h` text COLLATE utf8_spanish_ci NOT NULL,
  `fregistro_h` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `headers`
--

INSERT INTO `headers` (`id_h`, `item_h`, `ruta_h`, `fregistro_h`) VALUES
(1, 'Servicios', 'servicios-caemi', '2020-01-25 01:10:32'),
(2, 'Contacto', 'contacto', '2020-01-25 01:10:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_permitidos`
--

CREATE TABLE `metodos_permitidos` (
  `id_mp` int(11) NOT NULL,
  `metodo_mp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_mp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fregistro_mp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `metodos_permitidos`
--

INSERT INTO `metodos_permitidos` (`id_mp`, `metodo_mp`, `ruta_mp`, `fregistro_mp`) VALUES
(1, 'SERVICIOS CAEMI', 'servicios-caemi', '2019-07-03 00:14:21'),
(2, 'CONTACTO', 'contacto', '2019-07-03 00:14:21'),
(3, 'ENVIAR EMAIL', 'gracias', '2019-08-14 00:52:01'),
(4, 'HIDRONEUMATICOS ', 'hidroneumaticos', '2019-08-23 23:04:59'),
(5, 'HIDROSANITARIOS', 'hidrosanitarios', '2019-08-23 23:04:59'),
(6, 'JARDINERÍA', 'jardineria', '2019-09-18 21:32:24'),
(7, 'FERTILIZACIÓN', 'fertilizacion', '2019-09-18 21:32:40'),
(8, 'FUMIGACIÓN', 'fumigacion', '2019-09-18 21:32:53'),
(9, 'MANTENIMIENTO EN INDUSTRIAS CENTROS COMERCIALES Y RESIDENCIALES', 'mantenimiento-en-industrias-centros-comerciales-y-residencias', '2019-08-23 23:04:59'),
(10, 'LIMPIEZA', 'limpieza', '2019-08-23 23:04:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recaptchas`
--

CREATE TABLE `recaptchas` (
  `id_r` int(11) NOT NULL,
  `status` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `ruta` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `fregistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `recaptchas`
--

INSERT INTO `recaptchas` (`id_r`, `status`, `ruta`, `fregistro`) VALUES
(1, 'SI', 'si', '2019-11-05 01:42:05'),
(2, 'NO', 'no', '2019-11-05 01:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id_rs` int(11) NOT NULL,
  `red_social_rs` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_rs` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_rs` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fregistr_rs` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id_rs`, `red_social_rs`, `imagen_rs`, `ruta_rs`, `fregistr_rs`) VALUES
(1, 'Facebook', 'caemi_icon_facebook.webp', '', '2019-07-03 03:08:37'),
(2, 'Teléfono', 'caemi_icon_phone.webp', '', '2019-07-03 03:08:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_s` int(11) NOT NULL,
  `token_s` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `servicio_s` text COLLATE utf8_spanish_ci NOT NULL,
  `banner_s` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_s` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen_s` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta_s` text COLLATE utf8_spanish_ci NOT NULL,
  `texto_correo_s` text COLLATE utf8_spanish_ci NOT NULL,
  `fregistro_s` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_s`, `token_s`, `servicio_s`, `banner_s`, `descripcion_s`, `imagen_s`, `ruta_s`, `texto_correo_s`, `fregistro_s`) VALUES
(1, '485a790ce221418bd14586bf4e50df843cbcc580bfa626468f90b70ea6100b729e803ce466fc137f966834770f661b0fabbc1b2845bf007e9d7bebab0f18607e', 'LIMPIEZA', 'caemi_banner_cleaning.webp', '', 'caemi_cleaning_service.webp', 'limpieza', 'Solicito información sobre el servicio de Limpieza', '2019-11-05 04:59:50'),
(2, 'd77f0a1ea13d53ca0d57b92f1b4ff4f82d4c7d5ebae98efe2f57c835195123374360af0cf40032134c942efc974dc2de5290a9a59d39fb3ba51aa25722812acc', 'HIDRONNEUMÁTICOS', 'caemi_banner_hydropneumatic.webp', '', 'caemi_hydropneumatic_service.webp', 'hidroneumaticos', 'Solicito información sobre el servicio de Hidroneumáticos', '2019-11-05 05:00:01'),
(3, '977715aec4a25525b32df03a2f7d6b50e2553f1f0344342cd3cc4df917de1f799156bdd315b13a82dfdc2f8914a8b7cb7d0740f213f48e39885da7d80a88e097', 'HIDROSANITARIOS', 'caemi_banner_hydrosanitary.webp', '', 'caemi_hydrosanitary_service.webp', 'hidrosanitarios', 'Solicito información sobre el servicio de Hidrosanitarios', '2019-11-05 05:00:06'),
(4, '67c1571196f46a850f5f93dfeb656a9b421bf3bd1ab27e0e979dac792d890d973a660cf0270d7a3d8d78437bf366d1c03028a905be400fc5a41bb9bae2b28c36', 'MANTENIMIENTO', 'caemi_banner_industrial_maintenance_service.webp', '', 'caemi_industrial_maintenance_service.webp', 'mantenimiento-en-industrias-centros-comerciales-y-residencias', 'Solicito información sobre el servicio de Mantenimiento', '2019-11-05 05:00:10'),
(5, '74b2ef851522f169d08a89ac5a78d63dd35196c153694d1ca70ceda7878e2c7139deca49e18bcbf872cf73ec74910fc651b0747218c181d16209923e882b731b', 'JARDINERÍA', 'caemi_banner_gardening_service.webp', '', 'caemi_gardening_service.webp', 'jardineria', 'Solicito información sobre el servicio de Jardinería', '2019-11-05 05:00:16'),
(7, 'd72bf9929c9c5b100804a34636f825617a6715e3434c2c5fabaa34838ccf1dd355f908eeff5d8101327f788714aef1c5e71dcf684fb27d78ab4eb358fcb95a99', 'FUMIGACIÓN', 'caemi_banner_fumigation_service.webp', '', 'caemi_fumigation_service.webp', 'fumigacion', 'Solicito información sobre el servicio de Fumigación', '2019-11-05 05:00:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_servicios`
--

CREATE TABLE `sub_servicios` (
  `id_ss` int(11) NOT NULL,
  `class_css_ss` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_ss` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sub_servicio_ss` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_ss` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio_ss` int(11) NOT NULL,
  `fregistro_ss` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sub_servicios`
--

INSERT INTO `sub_servicios` (`id_ss`, `class_css_ss`, `imagen_ss`, `sub_servicio_ss`, `ruta_ss`, `servicio_ss`, `fregistro_ss`) VALUES
(1, 'Cat1', 'caemi_subservice_cleaning_1.webp', 'TULTIPARK II  - LIMPIEZA EN ALTURA', 'tultipark-ll-limpieza-en-altura', 1, '2019-09-18 21:38:04'),
(2, 'Cat2', 'caemi_subservice_cleaning_2.webp', 'TULTIPARK II  LIMPIEZA EN ALTURA', 'tulpipark-ll-limpieza-en-altura', 1, '2019-09-18 21:38:07'),
(3, 'Cat3', 'caemi_subservice_cleaning_3.webp', 'INMOBILIARIA  GEN- LIMPIEZA A ESTACIONAMIENTO', 'inmobiliaria-gen-limpieza-a-estacionamiento', 1, '2019-09-18 21:38:09'),
(4, 'Cat4', 'caemi_subservice_cleaning_4.webp', 'INMOBILIARIA GEN- LIMPIEZA EN PLAZAS COMERCIALES', 'inmobiliario-gen-limpieza-en-plazas-comerciales', 1, '2019-09-18 21:38:13'),
(5, 'Cat5', 'caemi_subservice_cleaning_5.webp', 'INMOBILIARIA GEN- LIMPIEZA EN PLAZAS COMERCIALES', 'inmobiliario-gen-limpieza-en-plazas-comerciales', 1, '2019-09-18 21:38:15'),
(6, 'Cat6', 'caemi_subservice_cleaning_6.webp', 'PLAZA SORIANA LA VILLA - LIMPIEZA EN PLAZAS', 'plaza-soriana-la-villa-limpieza-en-plazas', 1, '2019-09-18 21:38:17'),
(7, 'Cat1', 'caemi_subservice_of_hydropneumatics_1.webp', 'CUANTIPARK II - MANTENIMIENTO PREVENTIVO A BOMBAS', 'cuantipark-ll-mantenimiento-preventivo-a-bombas', 2, '2019-09-18 21:38:23'),
(8, 'Cat2', 'caemi_subservice_of_hydropneumatics_2.webp', 'CUANTIPARK II - MANTENIMIENTO PREVENTIVO A BOMBAS', 'cuantipark-ll-mantenimiento-preventivo-a-bombas', 2, '2019-09-18 21:38:26'),
(9, 'Cat3', 'caemi_subservice_of_hydropneumatics_3.webp', 'CUANTIPARK II - MANTENIMIENTO PREVENTIVO A BOMBAS', 'cuantipark-ll-mantenimiento-preventivo-a-bombas', 2, '2019-09-18 21:38:28'),
(10, 'Cat4', 'caemi_subservice_of_hydropneumatics_4.webp', 'CUANTIPARK II - CALIBRACIÓN DE HIDRONEUMÁTICOS.', 'cuantipark-ll-calibracion-de-hidroneumaticos', 2, '2019-09-18 21:38:30'),
(11, 'Cat5', 'caemi_subservice_of_hydropneumatics_5.webp', 'MANTENIMIENTO CORRECTIVO A BOMBAS', 'mantenimiento-correctivo-a-bombas', 2, '2019-09-18 21:38:34'),
(12, 'Cat6', 'caemi_subservice_of_hydropneumatics_6.webp', 'LIMPIEZA DE TABLEROS', 'limpieza-de-tableros', 2, '2019-09-18 21:38:36'),
(13, 'Cat1', 'caemi_subservice_of_hydrosanitary_1.webp', 'TULTIPARK II - MANTENIMIENTO A BOMBAS', 'tultipark-ll-mantenimiento-a-bombas', 3, '2019-09-18 21:38:39'),
(14, 'Cat2', 'caemi_subservice_of_hydrosanitary_2.webp', 'TULTIPARK II - MANTENIMIENTO A BOMBAS', 'tultipark-ll-mantenimiento-a-bombas', 3, '2019-09-18 21:38:42'),
(15, 'Cat3', 'caemi_subservice_of_hydrosanitary_3.webp', 'TULTIPARK II - MANTENIMIENTO A BOMBAS', 'tultipark-ll-mantenimiento-a-bombas', 3, '2019-09-18 21:38:44'),
(16, 'Cat1', 'caemi_subservice_industrial_maintenance_1.webp', 'FRANSLUX, ALTACARGO - JUNTAS DE PISO', 'franslux-altacargo-juntas-de-piso', 4, '2019-09-18 21:38:46'),
(17, 'Cat2', 'caemi_subservice_industrial_maintenance_2.webp', 'REDPARK - ACABADOS Y TABLAROCA', 'redpark-acabados-y-tablaroca', 4, '2019-09-18 21:38:48'),
(18, 'Cat3', 'caemi_subservice_industrial_maintenance_3.webp', 'AIG SEGUROS MÉXICO - MANTENIMIENTO A MUEBLE', 'aig-seguros-mexico-mantenimiento-a-mueble', 4, '2019-09-18 21:38:50'),
(19, 'Cat4', 'caemi_subservice_industrial_maintenance_4.webp', 'TULTIPARK II - MANTENIMIENTO CORRECTIVO A LUMINARIAS DE ARCO PRINCIPAL', 'tultipark-ll-mantenimiento-correctivo-a-luminarias-de-archo-principal', 4, '2019-09-18 21:38:53'),
(20, 'Cat5', 'caemi_subservice_industrial_maintenance_5.webp', 'TULTIPARK II - CONSTRUCCIÓN DE MUROS', 'tiltipark-ll-construccion-de-muros', 4, '2019-09-18 21:38:55'),
(21, 'Cat6', 'caemi_subservice_industrial_maintenance_6.webp', 'TULTIPARK II - CONSTRUCCIÓN DE MUROS', 'tiltipark-ll-construccion-de-muros', 4, '2019-09-18 21:38:57'),
(22, 'Cat1', 'caemi_subservice_gardening_1.webp', 'PLAZA SORIANA DIVISIÓN DEL NORTE - MANTENIMIENTO PREVENTIVO A JARDÍN', 'limpieza-de-jardines', 5, '2019-09-18 23:18:51'),
(23, 'Cat2', 'caemi_subservice_gardening_2.webp', 'FUNO-PORTAL LOMAS ESTRELLA - SERVICIO DE JARDINERÍA', 'mantenimiento-preventivo-y-correctivo-de-jardines', 5, '2019-09-18 23:19:11'),
(24, 'Cat3', 'caemi_subservice_gardening_3.webp', 'FUNO-PORTAL LOMAS ESTRELLA - SERVICIO DE JARDINERÍA', 'diseño-y-construccion', 5, '2019-09-18 23:19:17'),
(25, 'Cat4', 'caemi_subservice_gardening_4.webp', 'PARKS TULTIPARK II - SUMINISTRO DE AGAVE AZUL', 'diseño-y-mantenimiento-de-jardines-verticales', 5, '2019-09-18 23:19:29'),
(26, 'Cat5', 'caemi_subservice_gardening_5.webp', 'MANTENIMIENTO A JARDINES VERTICALES', 'mantenimiento-a-jardines-verticales', 5, '2019-09-18 23:20:23'),
(27, 'Cat6', 'caemi_subservice_gardening_6.webp', 'MANTENIMIENTO A JARDINES VERTICALES', 'mantenimiento-a-jardines-verticales', 5, '2019-09-18 23:20:28'),
(28, 'Cat1', 'caemi_subservice_fumigation_1.webp', 'FUMIGACIÓN EN JARDINES - TULTIPAK III', 'fumigacion-en-jardines-tultipak-III', 7, '2019-09-19 00:52:55'),
(29, 'Cat2', 'caemi_subservice_fumigation_2.webp', 'FUMIGACIÓN EN JARDINES - TULTIPAK III', 'fumigacion-en-jardines-tultipak-III', 7, '2019-09-19 00:52:55'),
(30, 'Cat3', 'caemi_subservice_fumigation_3.webp', 'FUMIGACIÓN EN JARDINES - TULTIPAK III', 'fumigacion-en-jardines-tultipak-III', 7, '2019-09-19 00:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `usuario_u` text COLLATE utf8_spanish_ci NOT NULL,
  `password_u` text COLLATE utf8_spanish_ci NOT NULL,
  `fregistro_u` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `usuario_u`, `password_u`, `fregistro_u`) VALUES
(1, 'galcarazadm', 't^^pQc,rn0Sj', '2020-01-24 23:47:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id_b`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `C_Id_S` (`servicio_c`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `c_recaptcha` (`recaptcha_co`);

--
-- Indices de la tabla `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id_h`);

--
-- Indices de la tabla `metodos_permitidos`
--
ALTER TABLE `metodos_permitidos`
  ADD PRIMARY KEY (`id_mp`);

--
-- Indices de la tabla `recaptchas`
--
ALTER TABLE `recaptchas`
  ADD PRIMARY KEY (`id_r`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_rs`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_s`);

--
-- Indices de la tabla `sub_servicios`
--
ALTER TABLE `sub_servicios`
  ADD PRIMARY KEY (`id_ss`),
  ADD KEY `S_IdCat` (`servicio_ss`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id_b` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `headers`
--
ALTER TABLE `headers`
  MODIFY `id_h` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodos_permitidos`
--
ALTER TABLE `metodos_permitidos`
  MODIFY `id_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recaptchas`
--
ALTER TABLE `recaptchas`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sub_servicios`
--
ALTER TABLE `sub_servicios`
  MODIFY `id_ss` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `C_Id_S` FOREIGN KEY (`servicio_c`) REFERENCES `servicios` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `correos`
--
ALTER TABLE `correos`
  ADD CONSTRAINT `c_recaptcha` FOREIGN KEY (`recaptcha_co`) REFERENCES `recaptchas` (`id_r`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_servicios`
--
ALTER TABLE `sub_servicios`
  ADD CONSTRAINT `S_IdCat` FOREIGN KEY (`servicio_ss`) REFERENCES `servicios` (`id_s`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
