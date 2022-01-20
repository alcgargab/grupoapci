-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-02-2020 a las 13:56:07
-- Versión del servidor: 10.0.38-MariaDB-cll-lve
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
-- Base de datos: `televial_televiales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correo`
--

CREATE TABLE `correo` (
  `idCorreo` int(11) NOT NULL,
  `Usuario` text NOT NULL,
  `CorreoElectronico` text NOT NULL,
  `Asunto` text NOT NULL,
  `NumTelefonico` text NOT NULL,
  `Comentarios` text NOT NULL,
  `FEnvio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ubicacion` text NOT NULL,
  `DireccionIp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correo`
--

INSERT INTO `correo` (`idCorreo`, `Usuario`, `CorreoElectronico`, `Asunto`, `NumTelefonico`, `Comentarios`, `FEnvio`, `Ubicacion`, `DireccionIp`) VALUES
(1, 'FrancesZet', 'angelatinny@gmail.com', 'Want more customers for your business?', '19139273052', 'Ciao!  televiales.net \r\n \r\nWe submit \r\n \r\nSending your business proposition through the feedback form which can be found on the sites in the contact section. Feedback forms are filled in by our program and the captcha is solved. The advantage of this method is that messages sent through feedback forms are whitelisted. This method increases the odds that your message will be read. Mailing is done in the same way as you received this message. \r\nYour  commercial proposal will be read by millions of site administrators and those who have access to the sites! \r\n \r\nThe cost of sending 1 million messages is $ 49 instead of $ 99. (you can select any country or country domain) \r\nAll USA - (10 million messages sent) - $399 instead of $699 \r\nAll Europe (7 million messages sent)- $ 299 instead of $599 \r\nAll sites in the world (25 million messages sent) - $499 instead of $999 \r\n \r\n \r\nDiscounts are valid until May 25. \r\nFeedback and warranty! \r\nDelivery report! \r\nIn the process of sending messages we don\'t break the rules GDRP. \r\n \r\nThis message is automatically generated to use our contacts for communication. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype – FeedbackForm2019 \r\nEmail - FeedbackForm@make-success.com \r\nWhatsApp - +44 7598 509161 \r\nhttp://bit.ly/2WelL1a \r\n \r\nThanks for reading.', '2019-05-22 20:50:05', '', '108.62.3.45'),
(2, 'gabriel', 'desarrollo@televiales.net', 'prueba de email', '0000000000', 'hola', '2019-07-05 22:40:42', ' 19.3991133 -99.0943539', '189.217.140.244'),
(3, 'gabriel', 'desarrollo@televiales.net', 'prueba de email', '0000000000', 'Hola esta es una prueba de un email. Saludos', '2019-07-05 22:56:54', ' 19.3991124 -99.09436099999999', '189.217.140.244'),
(4, 'AveryPaype', 'raphaetinny@gmail.com', 'Delivery of your email messages.', '83734795682', 'Hi!  televiales.net \r\n \r\nHave you ever heard of sending messages via feedback forms? \r\n \r\nImagine that your offer will be readseen by hundreds of thousands of your probable future userscustomers. \r\nYour message will not go to the spam folder because people will send the message to themselves. As an example, we have sent you our offer  in the same way. \r\n \r\nWe have a database of more than 35 million sites to which we can send your letter. Sites are sorted by country. Unfortunately, you can only select a country when sending a offer. \r\n \r\nThe price of one million messages 49 USD. \r\nThere is a discount program when you purchase  more than two million letter packages. \r\n \r\n \r\nFree test mailing of 50,000 messages to any country of your selection. \r\n \r\n \r\nThis letter is created automatically. Please use the contact details below to contact us. \r\n \r\n \r\n \r\nContact us. \r\nTelegram - @FeedbackFormEU \r\nSkype  FeedbackForm2019 \r\nEmail - feedbackform@make-success.com', '2019-11-11 07:56:51', '', '45.131.208.14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `idPaquete` int(11) NOT NULL,
  `Paquete` text NOT NULL,
  `Precio` text NOT NULL,
  `Descripcion1` text NOT NULL,
  `Descripcion2` text NOT NULL,
  `Descripcion3` text NOT NULL,
  `Descripcion4` text NOT NULL,
  `Descripcion5` text NOT NULL,
  `Logo` text NOT NULL,
  `Ruta` text NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paquete`
--

INSERT INTO `paquete` (`idPaquete`, `Paquete`, `Precio`, `Descripcion1`, `Descripcion2`, `Descripcion3`, `Descripcion4`, `Descripcion5`, `Logo`, `Ruta`, `FRegistro`) VALUES
(1, 'PAQUETE DIAMANTE', '11800000', 'HOSTING BÁSICO', 'DOMINIO .com', 'CERTIFICADO SSL PROTEGER UN SITIO', 'DESARROLLO WEB CHICA', 'MANTENIMIENTO WEB MEDIANO', 'Televia_Icon_P_Diamante.png', 'paquete-diamante', '2019-04-05 16:46:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serseguimiento`
--

CREATE TABLE `serseguimiento` (
  `idSerSeguimiento` int(11) NOT NULL,
  `SS_id_subser` int(11) NOT NULL,
  `SS_idUSeguimiento` int(11) NOT NULL,
  `StatusProceso` int(11) NOT NULL,
  `StatusServicio` int(11) NOT NULL,
  `FTermino` date NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `serseguimiento`
--

INSERT INTO `serseguimiento` (`idSerSeguimiento`, `SS_id_subser`, `SS_idUSeguimiento`, `StatusProceso`, `StatusServicio`, `FTermino`, `FRegistro`) VALUES
(1, 1, 1, 20, 0, '2019-04-24', '2019-04-01 23:06:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_oportunidad`
--

CREATE TABLE `tbl_oportunidad` (
  `id_oportunidad` int(11) NOT NULL,
  `oportunidad` varchar(50) NOT NULL,
  `Ruta` text NOT NULL,
  `banner_imagen` varchar(150) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_oportunidad`
--

INSERT INTO `tbl_oportunidad` (`id_oportunidad`, `oportunidad`, `Ruta`, `banner_imagen`, `FRegistro`) VALUES
(1, 'DESARROLLO WEB', 'desarollo-web', 'Televia_DesarrolloWeb.png', '2019-04-05 18:17:48'),
(2, 'EMPRESAS', 'empresas', 'Televia_Empresas.png', '2019-04-05 18:17:48'),
(3, 'SECTOR PÚBLICO', 'sector-publico', 'Televia_SecPub.png', '2019-04-05 18:17:48'),
(4, 'CALL CENTER', 'call-center', 'Televia_CallCenter.png', '2019-04-05 18:17:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicio`
--

CREATE TABLE `tbl_servicio` (
  `id_ser` int(11) NOT NULL,
  `servicio` varchar(150) NOT NULL,
  `Ruta` text NOT NULL,
  `icono` varchar(100) NOT NULL,
  `id_ser_oportunidad` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_servicio`
--

INSERT INTO `tbl_servicio` (`id_ser`, `servicio`, `Ruta`, `icono`, `id_ser_oportunidad`, `FRegistro`) VALUES
(1, 'HOSTING', 'Hosting', 'Desarrollo Web/Televia_Icon_WB_hosting.png', 1, '2019-04-05 19:19:04'),
(2, 'DOMINIO', 'Dominio', 'Desarrollo Web/Televia_Icon_WB_WSite.png', 1, '2019-04-05 19:19:04'),
(3, 'CERTIFICADO SSL', 'Certificado-SSL', 'Desarrollo Web/Televia_Icon_WB_ssl.png', 1, '2019-04-05 19:19:04'),
(4, 'DISEÑO', 'Diseno', 'Desarrollo Web/Televia_Icon_WB_desing.png', 1, '2019-04-05 19:19:04'),
(5, 'DESARROLLO WEB', 'DesarrolloWeb', 'Desarrollo Web/Televia_Icon_WB_Code.png', 1, '2019-04-05 19:19:04'),
(6, 'MANTENIMIENTO WEB', 'Mantenimiento-Web', 'Desarrollo Web/Televia_Icon_WB_Mnt.png', 1, '2019-04-05 19:19:04'),
(7, 'VOZ', 'Voz', 'Empresas/Televia_Icon_VI_Emp.png', 2, '2019-04-05 19:19:04'),
(8, 'DATOS', 'Datos', 'Empresas/Televia_Icon_Datos_Emp.png', 2, '2019-04-05 19:19:04'),
(9, 'REDES INALAMBRICAS', 'Redes-Inhalambricas', 'Empresas/Televia_Icon_RI_Emp.png', 2, '2019-07-01 16:21:39'),
(10, 'FIBRA OPTICA', 'Fibra-Optica', 'Empresas/Televia_Icon_FO_Emp.png', 2, '2019-04-05 19:19:04'),
(11, 'RADIO COMUNICACIÓN', 'Radio-Comunicacion', 'Empresas/Televia_Icon_RC_Emp.png', 2, '2019-04-05 19:19:04'),
(12, 'CIRCUITO CERRADO', 'Circuito-Cerrado', 'Empresas/Televia_Icon_CC_Emp.png', 2, '2019-04-05 19:19:04'),
(13, 'VOZ', 'Voz', 'Sector Publico/Televia_Icon_VI_Pub.png', 3, '2019-04-05 19:19:04'),
(14, 'DATOS', 'Datos', 'Sector Publico/Televia_Icon_Datos_Pub.png', 3, '2019-04-05 19:19:04'),
(15, 'REDES INALAMBRICAS', 'Redes-Inhalambricas', 'Sector Publico/Televia_Icon_RI_Pub.png', 3, '2019-07-01 16:22:17'),
(16, 'FIBRA OPTICA', 'Fibra-Optica', 'Sector Publico/Televia_Icon_FO_Pub.png', 3, '2019-04-05 19:19:04'),
(17, 'RADIO COMUNICACIÓN', 'Radio-Comunicacion', 'Sector Publico/Televia_Icon_RC_Pub.png', 3, '2019-04-05 19:19:04'),
(18, 'CIRCUITO CERRADO', 'Circuito-Cerrado', 'Sector Publico/Televia_Icon_CC_Pub.png', 3, '2019-04-05 19:19:04'),
(19, 'ATENCIÓN A CLIENTES', 'atencion-a-clientes', 'Call Center/Televia_Icon_CallC_AC.png', 4, '2019-04-05 19:19:04'),
(20, 'ENCUENTAS DE SATISFACCIÓN', 'encuestas-de-satisfaccion', 'Call Center/Televia_Icon_CallC_ES.png', 4, '2019-04-05 19:19:04'),
(21, 'COBRANZA IN/OUTBOUND', 'cobranza-in-outbound', 'Call Center/Televia_Icon_CallC_CIO.png', 4, '2019-04-05 19:19:04'),
(22, 'TELEMARKETING (VENTA DIRECTA)', 'telemarketing-venta-directa', 'Call Center/Televia_Icon_CallC_T.png', 4, '2019-04-05 19:19:04'),
(23, 'ATENCIÓN EN INFRAESTRUCTURA', 'atencion-en-infraestructura', 'Call Center/Televia_Icon_CallC_AI.png', 4, '2019-04-05 19:19:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subser`
--

CREATE TABLE `tbl_subser` (
  `id_subser` int(11) NOT NULL,
  `subser` varchar(150) NOT NULL,
  `Ruta` text NOT NULL,
  `precio` varchar(50) NOT NULL,
  `descripcion` longtext NOT NULL,
  `descripcion2` longtext NOT NULL,
  `descripcion3` longtext NOT NULL,
  `logo` varchar(150) NOT NULL,
  `requisitos` longtext NOT NULL,
  `requisitos2` longtext NOT NULL,
  `requisitos3` longtext NOT NULL,
  `requisitos4` longtext NOT NULL,
  `id_ser` int(11) NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_subser`
--

INSERT INTO `tbl_subser` (`id_subser`, `subser`, `Ruta`, `precio`, `descripcion`, `descripcion2`, `descripcion3`, `logo`, `requisitos`, `requisitos2`, `requisitos3`, `requisitos4`, `id_ser`, `FRegistro`) VALUES
(1, 'WEB CHICA', 'Web-Chica', '10,000', 'DISEÑO Y PROGRAMACIÓN DE PÁGINA WEB DE 1-10 SECCIONES (SITIO WEB, 1 FORMULARIO DE CONTACTO, SE ENTREGA MANUAL DE USUARIO).', 'CARGA DE CONTENIDOS (TEXTOS, IMÁGENES, PALABRAS CLAVES).', 'ENTREGA DE ARCHIVOS EN EDITABLE (PSD, HTML, ETC. DEPENDIENDO DEL TIPO DE ARCHIVO).', 'Desarrollo Web/Servicios/Televia_Icon_Web_C.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU SITIO WEB.', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO.', 'DOMINIO: NECESITAS TENER REGISTRADO UN DOMINIO PARA QUE SE PUEDA VISUALIZAR TU SITIO WEB.', 'HOSTING: NECESITAS TENER CONTRATADO UN PAQUETE DE HOSTING PARA QUE PODAMOS SUBIR AHÍ LOS ARCHIVOS DE TU SITIO WEB Y PUEDAN SER VISUALIZADOS AL INGRESAR A TU DOMINIO.', 5, '2019-04-05 19:48:24'),
(2, 'WEB MEDIANA', 'Web-Mediana', '16,000', 'DISEÑO Y PROGRAMACIÓN DE PÁGINA WEB DE 11-20 SECCIONES (SITIO WEB, 1 FORMULARIO DE CONTACTO, SE ENTREGA MANUAL DE USUARIO).', 'CARGA DE CONTENIDOS (TEXTOS, IMÁGENES, PALABRAS CLAVES).', ' ENTREGA DE ARCHIVOS EN EDITABLE (PSD, HTML, ETC. DEPENDIENDO DEL TIPO DE ARCHIVO).', 'Desarrollo Web/Servicios/Televia_Icon_Web_M.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU SITIO WEB.', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO.', 'DOMINIO: NECESITAS TENER REGISTRADO UN DOMINIO PARA QUE SE PUEDA VISUALIZAR TU SITIO WEB.', 'HOSTING: NECESITAS TENER CONTRATADO UN PAQUETE DE HOSTING PARA QUE PODAMOS SUBIR AHÍ LOS ARCHIVOS DE TU SITIO WEB Y PUEDAN SER VISUALIZADOS AL INGRESAR A TU DOMINIO.', 5, '2019-04-05 19:48:24'),
(3, 'WEB GRANDE', 'Web-Grande', '24,000', 'DISEÑO Y PROGRAMACIÓN DE PÁGINA WEB DE 21-30 SECCIONES (SITIO WEB, 1 FORMULARIO DE CONTACTO, SE ENTREGA MANUAL DE USUARIO).', 'CARGA DE CONTENIDOS (TEXTOS, IMÁGENES, PALABRAS CLAVES).', 'ENTREGA DE ARCHIVOS EN EDITABLE (PSD, HTML, ETC. DEPENDIENDO DEL TIPO DE ARCHIVO).', 'Desarrollo Web/Servicios/Televia_Icon_Web_G.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU SITIO WEB.', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO.', 'DOMINIO: NECESITAS TENER REGISTRADO UN DOMINIO PARA QUE SE PUEDA VISUALIZAR TU SITIO WEB.', 'HOSTING: NECESITAS TENER CONTRATADO UN PAQUETE DE HOSTING PARA QUE PODAMOS SUBIR AHÍ LOS ARCHIVOS DE TU SITIO WEB Y PUEDAN SER VISUALIZADOS AL INGRESAR A TU DOMINIO.', 5, '2019-04-05 19:48:24'),
(4, 'MANTENIMIENTO WEB CHICO', 'Mantenimiento-Chico', '750', 'INCLUYE 5 CAMBIOS DE INFORMACIÓN Y/O DISEÑO EN EL SITIO WEB (CAMBIO DE COLOR, FUENTES, FONDO, IMÁGENES, TEXTOS, INFORMACIÓN Y CONTENIDOS EN GENERAL).\r\n\r\n', 'CADA CAMBIO EQUIVALE A 1 MANTENIMIENTO.', '', 'Desarrollo Web/Servicios/Televia_Icon_Man_C.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA CREADO POR NOSOTROS.', '', '', '', 6, '2019-04-05 19:48:24'),
(5, 'MANTENIMIENTO WEB MEDIANO', 'Mantenimiento-Mediano', '1,500', 'INCLUYE 10 CAMBIOS DE INFORMACIÓN Y/O DISEÑO EN EL SITIO WEB (CAMBIO DE COLOR, FUENTES, FONDO, IMÁGENES, TEXTOS, INFORMACIÓN Y CONTENIDOS EN GENERAL).', 'CADA CAMBIO EQUIVALE A 1 MANTENIMIENTO.', '', 'Desarrollo Web/Servicios/Televia_Icon_Man_M.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA CREADO POR NOSOTROS.', '', '', '', 6, '2019-04-05 19:48:24'),
(6, 'MANTENIMIENTO WEB PLUS', 'Mantenimiento-Web-Plus', '8,000', 'INCLUYE 80 CAMBIOS DE INFORMACIÓN Y/O DISEÑO EN EL SITIO WEB (CAMBIO DE COLOR, FUENTES, FONDO, IMÁGENES, TEXTOS, INFORMACIÓN Y CONTENIDOS EN GENERAL).', 'CADA CAMBIO EQUIVALE A 1 MANTENIMIENTO.', '', 'Desarrollo Web/Servicios/Televia_Icon_Man_G.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA CREADO POR NOSOTROS.', '', '', '', 6, '2019-04-05 19:48:24'),
(7, 'ONE PAGE', 'One-Page', '10,000', 'DISEÑO Y PROGRAMACIÓN DE PÁGINA WEB EN 1 SOLA PÁGINA DE 1-10 SECCIONES (SITIO WEB, 1 FORMULARIO DE CONTACTO, SE ENTREGA MANUAL DE USUARIO).\r\n', 'CARGA DE CONTENIDOS (TEXTOS, IMÁGENES, PALABRAS CLAVES).', 'ENTREGA DE ARCHIVOS EN EDITABLE (AI, PSD, HTML, ETC. DEPENDIENDO DEL TIPO DE ARCHIVO)', 'Desarrollo Web/Servicios/Televia_Icon_Web_OP.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU SITIO WEB.\r\n', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO. LO RECIBIRÁS UNA VEZ QUE REALICES TU PAGO.', 'DOMINIO: NECESITAS TENER REGISTRADO UN DOMINIO PARA QUE SE PUEDA VISUALIZAR TU SITIO WEB.', 'HOSTING: NECESITAS TENER CONTRATADO UN PAQUETE DE HOSTING PARA QUE PODAMOS SUBIR AHÍ LOS ARCHIVOS DE TU SITIO WEB Y PUEDAN SER VISUALIZADOS AL INGRESAR A TU DOMINIO.', 5, '2019-08-05 22:19:46'),
(8, 'FIRMA DE CORREO', 'Firma-de-Correo', '900', 'DISEÑO Y PROGRAMACIÓN DE UNA FIRMA DE CORREO (REPRESENTACIÓN GRÁFICA DE TU EMPRESA O NEGOCIO QUE SE PLASMARÁ EN TUS CORREOS).\r\n', 'ENTREGA DE ARCHIVOS EN EDITABLE (HTML)', '', 'Desarrollo Web/Servicios/Televia_Icon_Dis_E.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU FIRMA. SE DEBE INCLUIR EL LOGOTIPO EN EL DISEÑO.', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO.', '', '', 4, '2019-04-05 19:48:24'),
(9, 'TARJETA DE PRESENTACIÓN', 'Tarjeta-de-Presentacion', '3,000', 'DISEÑO DE 1 TARJETA DE PRESENTACIÓN: DOS PROPUESTAS DE DISEÑO (TARJETAS INSTITUCIONALES).', 'ENTREGA DE ARCHIVOS EN EDITABLE (AI, PSD, HTML, ETC. DEPENDIENDO DEL TIPO DE ARCHIVO).', '', 'Desarrollo Web/Servicios/Televia_Icon_Dis_C.png', 'LOGOTIPO: NOS BASAMOS EN LOS COLORES Y EL ESTILO DE TU LOGOTIPO PARA PODER DISEÑAR TU FIRMA. SE DEBE INCLUIR EL LOGOTIPO EN EL DISEÑO.', 'BRIEF: DEBERÁS LLENAR UN CUESTIONARIO CON PREGUNTAS ESPECÍFICAS QUE NOS AYUDARÁN A COMPRENDER MEJOR TU IDEA O PROYECTO.', '', '', 4, '2019-04-05 19:48:24'),
(10, 'PROTEGER UN SITIO WEB', 'Proteger-un-Sitio-Web', '1,400', 'ASEGURA UN SITIO WEB', 'SÓLIDO CIFRADO SHA2 Y ENCRIPTACIÓN DE 2048 BITS', 'INCREMENTA EL POSICIONAMIENTO DE TU SITIO EN GOOGLE', 'Desarrollo Web/Servicios/Televia_Icon_SSL_B.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA.', '', '', '', 3, '2019-04-05 19:48:24'),
(11, 'PROTEGER VARIOS SITIOS WEB', 'Proteger-Varios-Sitios-Web', '3,100', 'ASEGURA HASTA CINCO SITIOS WEB ', 'SÓLIDO CIFRADO SHA2 Y ENCRIPTACIÓN DE 2048 BITS', 'INCREMENTA EL POSICIONAMIENTO DE TU SITIO EN GOOGLE', 'Desarrollo Web/Servicios/Televia_Icon_SSL_M.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA.', '', '', '', 3, '2019-04-05 19:48:24'),
(12, 'PROTEGER TODOS LOS SUBDOMINIOS', 'Proteger-Todos-los-Subdominios', '6,500', 'ASEGURA UN SITIO WEB Y TODOS SUS SUBDOMINIOS', 'SÓLIDO CIFRADO SHA2 Y ENCRIPTACIÓN DE 2048 BITS', 'INCREMENTA EL POSICIONAMIENTO DE TU SITIO EN GOOGLE', 'Desarrollo Web/Servicios/Televia_Icon_SSL_P.png', 'WEB: TENER UN SITIO WEB O TIENDA EN LÍNEA.', '', '', '', 3, '2019-04-05 19:48:24'),
(13, '.com', 'dominio-com', '200', '', '', '', 'Desarrollo Web/Servicios/Televia_Icon_WB_WSite_Serv.png', 'NOMBRE DE TU EMPRESA', '', '', '', 2, '2019-04-05 19:48:24'),
(14, '.com.mx', 'dominio-com-mx', '250', '', '', '', 'Desarrollo Web/Servicios/Televia_Icon_WB_WSite_Serv.png', 'NOMBRE DE TU EMPRESA', '', '', '', 2, '2019-04-05 19:48:24'),
(15, '.mx', 'dominio-mx', '600', '', '', '', 'Desarrollo Web/Servicios/Televia_Icon_WB_WSite_Serv.png', 'NOMBRE DE TU EMPRESA', '', '', '', 2, '2019-04-05 19:48:24'),
(16, '.net', 'dominio-net', '200', '', '', '', 'Desarrollo Web/Servicios/Televia_Icon_WB_WSite_Serv.png', 'NOMBRE DE TU EMPRESA', '', '', '', 2, '2019-04-05 19:48:24'),
(17, '.org', 'dominio_org', '200', '', '', '', 'Desarrollo Web/Servicios/Televia_Icon_WB_WSite_Serv.png', 'NOMBRE DE TU EMPRESA', '', '', '', 2, '2019-04-05 19:48:24'),
(18, 'BÁSICO', 'hosting-basico', '250', '1 SITIO WEB', 'ANCHO DE BANDA SIN MEDICIÓN', '100 GB DE ALMACENAMIENTO', 'Desarrollo Web/Servicios/Televia_Icon_WB_hosting_Serv.png', '', '', '', '', 1, '2019-04-05 19:48:24'),
(19, 'MEDIANO', 'hosting-mediano', '1000', '10 SITIOS WEB', 'ANCHO DE BANDA SIN MEDICIÓN', '500 GB DE ALMACENAMIENTO', 'Desarrollo Web/Servicios/Televia_Icon_WB_hosting_Serv.png', '', '', '', '', 1, '2019-04-05 19:48:24'),
(20, 'PLUS', 'hosting-plus', '1600', 'SITIOS WEB ILIMITADOS', 'ANCHO DE BANDA SIN MEDICIÓN ', 'ALMACENAMIENTO ILIMITADO', 'Desarrollo Web/Servicios/Televia_Icon_WB_hosting_Serv.png', '', '', '', '', 1, '2019-04-05 19:48:24'),
(21, 'ATENCIÓN A CLIENTES', 'atencion-a-clientes-s', '', 'APOYO Y ORIENTACIÓN OFRECIENDO SOLUCIONES VIABLES.', '', '', 'Call Center/Servicios/Televia_Icon_CallC_AC.png', '', '', '', '', 19, '2019-04-05 19:48:24'),
(22, 'ENCUESTAS DE SATISFACCIÓN', 'encuestas-de-satisfaccion-s', '', 'TE AYUDARA A MEDIR LA CALIDAD DEL PRODUCTO QUE OFRECE TU EMPRESA, DE ESTA MANERA PUEDES MANTENER CLIENTES “SATISFECHOS” Y OBTENER MÁS GANANCIAS.', '', '', 'Call Center/Servicios/Televia_Icon_CallC_ES.png', '', '', '', '', 20, '2019-04-05 19:48:24'),
(23, 'COBRANZA IN/OUTBOUND', 'cobranza-in-outbound-s', '', 'RECUPERACIÓN DE CARTERA VENCIDA “SABEMOS QUE EN EL PEDIR ESTÁ EL DAR”.', '', '', 'Call Center/Servicios/Televia_Icon_CallC_CIO.png', '', '', '', '', 21, '2019-04-05 19:48:24'),
(24, 'TELEMARKETING (VENTA DIRECTA)', 'telemarketing-venta-directa-s', '', '¿NECESITAS GENERAR MÁS INGRESOS? NOSOTROS TE APOYAMOS.', '', '', 'Call Center/Servicios/Televia_Icon_CallC_T.png', '', '', '', '', 22, '2019-04-05 19:48:24'),
(25, 'ATENCIÓN EN INFRAESTRUCTURA', 'atencion-en-infraestructura-s', '', 'RENTA DE POSICIONES DE CALL CENTER CON TODAS LAS HERRAMIENTAS NECESARIAS PARA EL DESEMPEÑO DE TU PERSONAL.', '', '', 'Call Center/Servicios/Televia_Icon_CallC_AI.png', '', '', '', '', 23, '2019-04-05 19:48:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Usuario` text NOT NULL,
  `Password` text NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`idUser`, `Usuario`, `Password`, `FRegistro`) VALUES
(1, 'galcarazadm', 'lSnV{WWIomF*', '2019-04-05 21:34:47'),
(2, 'galcarazadmdb', 'HPGjX*%2;QS]', '2019-04-05 21:34:47'),
(3, 'mgonzalezadm', 'yCKgSjr88%', '2019-04-06 15:49:57'),
(6, 'avazquezadm', '3scJZyQJA%', '2019-04-08 15:24:42'),
(7, 'galcarazadmcall', ' _LP2HkjgKr', '2019-04-24 21:42:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userseguimiento`
--

CREATE TABLE `userseguimiento` (
  `idUSeguimiento` int(11) NOT NULL,
  `Codigo` text NOT NULL,
  `Password` text NOT NULL,
  `Usuario` text NOT NULL,
  `Correo` text NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userseguimiento`
--

INSERT INTO `userseguimiento` (`idUSeguimiento`, `Codigo`, `Password`, `Usuario`, `Correo`, `FRegistro`) VALUES
(1, 'rZ4)dKFszf', 'e=RIy8ERZ$', 'Gabriel', 'Gabriel03022012@hotmail.com', '2019-04-01 23:55:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariocc`
--

CREATE TABLE `usuariocc` (
  `idUsuario` int(11) NOT NULL,
  `FotoUser` text NOT NULL,
  `ApellidoP` text NOT NULL,
  `ApellidoM` text NOT NULL,
  `Nombre` text NOT NULL,
  `NumeroCasa` varchar(50) NOT NULL,
  `NumeroCelular` varchar(50) NOT NULL,
  `FNacimiento` date NOT NULL,
  `NumActa` text NOT NULL,
  `CURP` text NOT NULL,
  `RFC` text NOT NULL,
  `INE` text NOT NULL,
  `IMSS` text NOT NULL,
  `FIngreso` date NOT NULL,
  `FBaja` date NOT NULL,
  `MotivoBaja` text NOT NULL,
  `NumEmpleado` text NOT NULL,
  `FRegistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariocc`
--

INSERT INTO `usuariocc` (`idUsuario`, `FotoUser`, `ApellidoP`, `ApellidoM`, `Nombre`, `NumeroCasa`, `NumeroCelular`, `FNacimiento`, `NumActa`, `CURP`, `RFC`, `INE`, `IMSS`, `FIngreso`, `FBaja`, `MotivoBaja`, `NumEmpleado`, `FRegistro`) VALUES
(1, 'images/Call Center/Usuario/25-Foto-AYUDANTE DE LIMPIEZA eugenia mujer.jpg', 'islas', 'hernandez', 'elsa verenice', '84390427', '5536064843', '1993-07-31', '12132', 'iahe930731mdfsrl06', 'iahe930731jk1', '122521125423', '5226547236', '2019-03-13', '0000-00-00', '', '25', '2019-05-08 16:26:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correo`
--
ALTER TABLE `correo`
  ADD PRIMARY KEY (`idCorreo`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`idPaquete`);

--
-- Indices de la tabla `serseguimiento`
--
ALTER TABLE `serseguimiento`
  ADD PRIMARY KEY (`idSerSeguimiento`),
  ADD KEY `SS_id_subser` (`SS_id_subser`),
  ADD KEY `SS_idUSeguimiento` (`SS_idUSeguimiento`);

--
-- Indices de la tabla `tbl_oportunidad`
--
ALTER TABLE `tbl_oportunidad`
  ADD PRIMARY KEY (`id_oportunidad`);

--
-- Indices de la tabla `tbl_servicio`
--
ALTER TABLE `tbl_servicio`
  ADD PRIMARY KEY (`id_ser`),
  ADD KEY `id_oportunidad` (`id_ser_oportunidad`);

--
-- Indices de la tabla `tbl_subser`
--
ALTER TABLE `tbl_subser`
  ADD PRIMARY KEY (`id_subser`),
  ADD KEY `id_ser` (`id_ser`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `userseguimiento`
--
ALTER TABLE `userseguimiento`
  ADD PRIMARY KEY (`idUSeguimiento`);

--
-- Indices de la tabla `usuariocc`
--
ALTER TABLE `usuariocc`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correo`
--
ALTER TABLE `correo`
  MODIFY `idCorreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `idPaquete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `serseguimiento`
--
ALTER TABLE `serseguimiento`
  MODIFY `idSerSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_oportunidad`
--
ALTER TABLE `tbl_oportunidad`
  MODIFY `id_oportunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_servicio`
--
ALTER TABLE `tbl_servicio`
  MODIFY `id_ser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_subser`
--
ALTER TABLE `tbl_subser`
  MODIFY `id_subser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `userseguimiento`
--
ALTER TABLE `userseguimiento`
  MODIFY `idUSeguimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuariocc`
--
ALTER TABLE `usuariocc`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `serseguimiento`
--
ALTER TABLE `serseguimiento`
  ADD CONSTRAINT `SS_idUSeguimiento` FOREIGN KEY (`SS_idUSeguimiento`) REFERENCES `userseguimiento` (`idUSeguimiento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SS_id_subser` FOREIGN KEY (`SS_id_subser`) REFERENCES `tbl_subser` (`id_subser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_servicio`
--
ALTER TABLE `tbl_servicio`
  ADD CONSTRAINT `id_oportunidad` FOREIGN KEY (`id_ser_oportunidad`) REFERENCES `tbl_oportunidad` (`id_oportunidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_subser`
--
ALTER TABLE `tbl_subser`
  ADD CONSTRAINT `id_ser` FOREIGN KEY (`id_ser`) REFERENCES `tbl_servicio` (`id_ser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
