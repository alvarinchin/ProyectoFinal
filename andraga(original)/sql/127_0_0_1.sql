-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2017 a las 10:55:46
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `campeonatos`
--
CREATE DATABASE IF NOT EXISTS `campeonatos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `campeonatos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonato`
--

CREATE TABLE `campeonato` (
  `NOMBRECAMPEONATO` varchar(30) NOT NULL,
  `CODCAMPEONATO` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `campeonato`
--

INSERT INTO `campeonato` (`NOMBRECAMPEONATO`, `CODCAMPEONATO`) VALUES
('BASE', 1),
('CAT. NACIONALES', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCat` varchar(6) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `COMPETICION` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCat`, `Nombre`, `COMPETICION`) VALUES
('01ALE', 'ALEVIN', 1),
('02INF', 'INFANTIL', 1),
('03CAD', 'CADETE', 1),
('04JUV', 'JUVENIL', 1),
('05JUN', 'JUNIOR', 1),
('06B1', 'BASE1', 0),
('07B2', 'BASE2', 0),
('08B3', 'BASE3', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `CodInscripcion` tinyint(11) NOT NULL,
  `Dificultad` float NOT NULL,
  `Ejecucion` float NOT NULL,
  `Artisitico` float NOT NULL,
  `Penalizacion` float NOT NULL,
  `Total` float NOT NULL,
  `TipoEjercicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`CodInscripcion`, `Dificultad`, `Ejecucion`, `Artisitico`, `Penalizacion`, `Total`, `TipoEjercicio`) VALUES
(1, 10, 7.26, 6.63, 0, 23.89, 3),
(2, 10, 5.7, 5.8, 0.6, 20.9, 3),
(3, 10, 5.66, 7.16, 0.6, 22.22, 3),
(4, 10, 8.1, 6.9, 0, 25, 3),
(5, 10, 6.2, 5.76, 0, 21.96, 3),
(6, 10, 6.5, 5.8, 0.3, 22, 3),
(8, 9.8, 6.2, 5.46, 0, 21.46, 3),
(9, 10, 6.93, 6.83, 0, 23.76, 3),
(10, 10, 6.2, 6.23, 0.6, 21.83, 3),
(11, 10, 5.6, 6.06, 0.3, 21.36, 3),
(12, 10, 7.26, 6.86, 0, 24.12, 3),
(13, 10, 5.43, 6.16, 0.6, 20.99, 3),
(14, 10, 6.73, 6.1, 0.9, 21.93, 3),
(15, 10, 6.23, 5.5, 0.3, 21.43, 3),
(16, 9, 5.2, 5.86, 1.5, 18.56, 3),
(17, 10, 5.86, 6.33, 0.3, 21.89, 3),
(18, 10, 6.4, 5.16, 0, 21.56, 3),
(19, 10, 8.03, 5.7, 0, 23.73, 3),
(20, 10, 7.6, 5.46, 0.3, 22.76, 3),
(21, 10, 7.1, 5.9, 0.3, 22.7, 3),
(22, 10, 7.2, 6.833, 0, 24.033, 3),
(23, 10, 6.1, 7, 0.6, 22.5, 3),
(24, 10, 8.13, 5.5, 0, 23.63, 3),
(25, 10, 7.5, 6.73, 0, 24.23, 3),
(26, 10, 6.16, 6.1, 0.9, 21.36, 3),
(27, 10, 7.3, 6.83, 0, 24.13, 3),
(28, 9.8, 6.43, 5.93, 0.3, 21.9, 3),
(29, 9.6, 7.3, 6.3, 0.9, 22.3, 3),
(30, 10, 7.13, 6.23, 0.3, 23.06, 3),
(31, 10, 7.5, 6.06, 0.3, 23.26, 3),
(32, 10, 7.5, 7.16, 0, 24.66, 3),
(33, 9.65, 6.56, 7.33, 1.2, 22.34, 3),
(34, 10, 6.9, 6.9, 0.3, 23.5, 3),
(35, 10, 7.5, 8.23, 0.4, 25.33, 3),
(36, 10, 7.63, 7.16, 0, 24.79, 3),
(37, 4, 7.66, 7.13, 0.3, 18.49, 3),
(38, 10, 7.03, 6.2, 0, 23.23, 3),
(39, 10, 7.63, 6.63, 0, 24.26, 3),
(40, 10, 7.9, 6.76, 0, 24.66, 3),
(41, 10, 7.66, 6.9, 0, 24.56, 3),
(42, 10, 7.03, 5.63, 0, 22.66, 3),
(43, 10, 7.8, 6.3, 0, 24.1, 3),
(44, 10, 6.6, 6.4, 0, 23, 3),
(45, 10, 7.4, 6.13, 0.6, 22.93, 3),
(46, 10, 7.23, 6.23, 0, 23.46, 3),
(47, 10, 8.3, 6.4, 0, 24.7, 3),
(48, 10, 7.36, 6.03, 0, 23.39, 3),
(49, 10, 6.16, 5.26, 0.3, 21.12, 3),
(50, 10, 6.73, 6.36, 0, 23.09, 3),
(51, 10, 6.83, 6.13, 0.3, 22.66, 3),
(52, 10, 7.93, 6.76, 0, 24.69, 3),
(53, 10, 8.13, 7.4, 0, 25.53, 3),
(54, 10, 7.5, 7.16, 0, 24.66, 3),
(55, 10, 8.16, 6.83, 0, 24.99, 3),
(56, 10, 8.06, 7.56, 0.3, 25.33, 3),
(57, 10, 6.73, 6.76, 0.3, 23.19, 3),
(59, 10, 7.5, 7.36, 0, 24.86, 3),
(60, 10, 7.93, 7.16, 0, 25.09, 3),
(61, 9, 6.36, 6.3, 0.6, 21.06, 3),
(62, 10, 7.83, 7.3, 0, 25.13, 3),
(63, 10, 5.83, 6.03, 0.3, 21.56, 3),
(64, 9.8, 7.46, 7.83, 0.3, 24.79, 3),
(65, 10, 6.46, 6.83, 0.3, 22.99, 3),
(66, 10, 7.9, 7.73, 0, 25.63, 3),
(67, 10, 6.13, 5.9, 0.5, 21.53, 3),
(68, 10, 7.43, 6.13, 0, 23.56, 3),
(69, 10, 8.03, 6.7, 0, 24.73, 3),
(70, 10, 4.63, 6.2, 0.6, 20.23, 3),
(72, 10, 6.56, 5.5, 0.3, 21.76, 3),
(73, 9, 6.13, 5.76, 1.8, 19.09, 3),
(74, 10, 6.2, 5.16, 0.9, 20.46, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `CodClub` varchar(6) NOT NULL,
  `NombreClub` text NOT NULL,
  `Origen` text NOT NULL,
  `Comunidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club`
--

INSERT INTO `club` (`CodClub`, `NombreClub`, `Origen`, `Comunidad`) VALUES
('001AND', 'ANDRAGA', 'COLLADO VILLABLA', 'MADRID'),
('002BUR', 'BURGAS', '', 'GALICIA'),
('003SUR', 'SUR', '', 'ANDALUCIA'),
('004ACR', 'ACROBATOS', '', 'ANDALUCIA'),
('005FLI', 'FLIC FLAC', '', 'GALICIA'),
('006DIN', 'DINAMIC', '', 'COMUNIDAD VALENCIANA'),
('007PON', 'PONTEVEDRA', '', 'GALICIA'),
('008BAL', 'BALANS', 'VALENCIA', 'COMUNIDAD VALENCIANA'),
('009AST', 'ACROASTUR', 'ASTURIAS', 'ASTURIAS'),
('010GET', 'VILLA DE GETAFE', 'GETAFE', 'MADRID'),
('011MAS', 'MASSALAFASSAR', 'VALENCIA', 'VALENCIANA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportistas`
--

CREATE TABLE `deportistas` (
  `CodDeport` mediumint(6) NOT NULL,
  `NombreDepor` text NOT NULL,
  `Ape1Deport` text NOT NULL,
  `Ape2Deport` text NOT NULL,
  `CodClub` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deportistas`
--

INSERT INTO `deportistas` (`CodDeport`, `NombreDepor`, `Ape1Deport`, `Ape2Deport`, `CodClub`) VALUES
(1, 'MORALZARZAL WATERLOO', '', '', '001AND'),
(2, 'MORALZARZAL ONEWAYTICKET', '', '', '001AND'),
(3, 'COLLADO VILLALBA CELEBRATION', '', '', '001AND'),
(4, 'COLLADO VILLALBA KARMACHAMALEON', '', '', '001AND'),
(5, 'MORALZARZAL DISCO', '', '', '001AND'),
(6, 'CANTOSALTOS_RASPUTIN', '', '', '001AND'),
(7, 'MORALZARZAL-MIDNIGTH DANCER', '', '', '001AND'),
(8, 'LAURA ', 'PARDO', '', '006DIN'),
(9, 'SANDRA', 'ENGUIDANOS', '', '006DIN'),
(10, 'MALENA', 'HALPERN', '', '006DIN'),
(11, 'VEGA ', 'ALVAREZ', '', '009AST'),
(12, 'CRISTINA', 'RUIZ', '', '009AST'),
(13, 'MARIA', 'RUIZ', '', '009AST'),
(14, 'IRATXE', 'ESPINOSA', '', '010GET'),
(15, 'DAFNE', 'GRANADO', '', '010GET'),
(16, 'CLAUDIA', 'ALCAZAR', '', '010GET'),
(17, 'CLAUDIA', 'CHULIA', '', '006DIN'),
(18, 'RAQUEL', 'RUCABADO', '', '006DIN'),
(19, 'MARTA', 'PEREZ', '', '001AND'),
(20, 'ADA', 'DOMINGO', '', '001AND'),
(21, 'IRIA', 'CAMINO', '', '006DIN'),
(22, 'ANDREA', 'PERKING', '', '006DIN'),
(23, 'CRISTINA', 'ZHANG-LI', '', '011MAS'),
(24, 'PAULA', 'MARIN', '', '011MAS'),
(25, 'IRENE', 'MARTINEZ', '', '006DIN'),
(26, 'VERA', 'ROCHERA', '', '006DIN'),
(27, 'AINHOA', 'ALVES', '', '009AST'),
(28, 'ANDREA', 'PEÃ‘A', '', '009AST'),
(29, 'INES', 'PIQUER', '', '006DIN'),
(30, 'PIERO', 'GONZALEZ', '', '006DIN'),
(31, 'SOFIA', 'GONZALEZ', '', '001AND'),
(32, 'GISELA', 'GALLEGO', '', '001AND'),
(33, 'ANGELA', 'BLANCO', '', '001AND'),
(34, 'VERA', 'GRIÃ‘O', '', '006DIN'),
(35, 'ALBA', 'PINAR', '', '006DIN'),
(36, 'MIGUEL', 'MAS', '', '006DIN'),
(37, 'JULIA', 'BIELA', '', '001AND'),
(38, 'MALENA', 'TRESO', '', '001AND'),
(39, 'MARIA', 'MILENOVA', '', '001AND'),
(40, 'TESS', 'CORREDOR', '', '011MAS'),
(41, 'AITANA ', 'GISBERT', '', '011MAS'),
(42, 'VALENTINA', 'PERSICO', '', '011MAS'),
(43, 'ANA', 'NOE', '', '006DIN'),
(44, 'MARTA', 'ROS', '', '006DIN'),
(45, 'SANDRA', 'GIL', '', '006DIN'),
(46, 'CLAUDIA', 'SANCHEZ', '', '001AND'),
(47, 'CRISTINA', 'VALLEJO', '', '001AND'),
(48, 'ADRIANA', 'CALIZ', '', '001AND'),
(49, 'SARA', 'GARCIA', '', '001AND'),
(50, 'SARA', 'BERNAL', '', '001AND'),
(51, 'MARTA', 'FRANGANILLO', '', '001AND'),
(52, 'CRISTINA', 'SANCHEZ', '', '001AND'),
(53, 'ANGELA', 'RUIZ', '', '001AND'),
(54, 'CLAUDIA', 'RAMOS', '', '006DIN'),
(55, 'CYNTHIA', 'RAMIREZ', '', '006DIN'),
(56, 'ALICIA', 'RODERO', '', '010GET'),
(57, 'ANDREA ', 'FERNANDEZ', '', '010GET'),
(58, 'ELBA', 'BARNENTOS', '', '009AST'),
(59, 'LUCIA', 'FERNANDEZ', '', '009AST'),
(60, 'LARA', 'RICHINI', '', '006DIN'),
(61, 'ANA', 'RODERO', '', '006DIN'),
(62, 'IAN', 'ALVAREZ', '', '005FLI'),
(63, 'PATRICIA', 'LIÃ‘AYO', '', '005FLI'),
(64, 'RODRIGO', 'DEL VALLE', '', '001AND'),
(65, 'LUCAS', 'ZURITA', '', '001AND'),
(66, 'PELAYO', 'MENENDEZ', '', '009AST'),
(67, 'LUCAS', 'BARNENTOS', '', '009AST'),
(68, 'SERGIO', 'GUDE', '', '005FLI'),
(69, 'PABLO', 'MARTINEZ', '', '005FLI'),
(70, 'GEMA', 'CRISOSOMO', '', '001AND'),
(71, 'LARA', 'MONTES', '', '001AND'),
(72, 'ANA', 'BARBERA', '', '001AND'),
(73, 'ADRIANA', 'PORRAS', '', '006DIN'),
(74, 'MARTA', 'HERMOSILLA', '', '006DIN'),
(75, 'AMPARO', 'PERAITA', '', '006DIN'),
(76, 'LAURA', 'GARCIA', '', '011MAS'),
(77, 'GABRIELA', 'YAVOROVA', '', '011MAS'),
(78, 'MIRIAM ', 'VELA', '', '011MAS'),
(79, 'NATALIA', 'FLORES', '', '001AND'),
(80, 'VIOLETA', 'CALDERON', '', '001AND'),
(81, 'MANUELA', 'GARCIA', '', '001AND'),
(82, 'SILVIA', 'PEREZ', '', '006DIN'),
(83, 'AINHOA', 'SALES', '', '006DIN'),
(84, 'CARLA', 'MUÃ‘OZ', '', '006DIN'),
(85, 'LUCIA', 'GONZALEZ', '', '005FLI'),
(86, 'ALBA', 'PEREZ', '', '005FLI'),
(87, 'ABRIL', 'QUINTELA', '', '005FLI'),
(88, 'CLAUDIA', 'SANCHEZ', '', '001AND'),
(89, 'PAULA', 'ABAD', '', '001AND'),
(90, 'ABRIL', 'SANCHEZ', '', '001AND'),
(91, 'CARLOS', 'LORENZO', '', '006DIN'),
(92, 'GUILLEM', 'CANO', '', '006DIN'),
(93, 'SERGIO', 'TALAYA', '', '006DIN'),
(94, 'LUCAS', 'GONZALEZ', '', '006DIN'),
(95, 'NADIA', 'ALCACER', '', '011MAS'),
(96, 'CLAUDIA', 'QUILES', '', '011MAS'),
(97, 'CARMEN', 'CASANOVA', '', '001AND'),
(98, 'NOA', 'TOLSADA', '', '001AND'),
(99, 'CARLA', 'GARCIA', '', '006DIN'),
(100, 'PAOLA', 'MIQUEL', '', '006DIN'),
(101, 'LAURA', 'SANROMAN', '', '005FLI'),
(102, 'CARMEN', 'FERNANDEZ', '', '005FLI'),
(103, 'ETNA', 'PANTALEONI', '', '001AND'),
(104, 'CHARI', 'SUAREZ', '', '001AND'),
(105, 'ROCIO', 'DEL CAÃ‘O', '', '006DIN'),
(106, 'MARINA', 'FERNANDEZ', '', '006DIN'),
(107, 'LAURA', 'FERNANDEZ', '', '008BAL'),
(108, 'BELEN', 'RUEDA', '', '008BAL'),
(109, 'MARIA', 'BOZA', '', '006DIN'),
(110, 'REBECA', 'MUÃ‘OZ', '', '006DIN'),
(111, 'MIGUEL', 'ROMERO', '', '005FLI'),
(112, 'MARA ', 'ALONSO', '', '005FLI'),
(113, 'SERGIO', 'IGLESIAS', '', '009AST'),
(114, 'JUAN', 'VAZQUEZ', '', '009AST'),
(115, 'ANDRES', 'ORTEGA', '', '001AND'),
(116, 'PEDRO', 'LUNELLO', '', '001AND'),
(117, 'SOFIA', 'SANTOME', '', '005FLI'),
(118, 'GLORIA', 'SAAVEDRA', '', '005FLI'),
(119, 'NEREA', 'SENRA', '', '005FLI'),
(120, 'NEREA', 'GARCIA', '', '006DIN'),
(121, 'ESTHER', 'HUESA', '', '006DIN'),
(122, 'AITANA ', 'NUÃ‘EZ', '', '006DIN'),
(123, 'NAZARET', 'IGLESIAS', '', '009AST'),
(124, 'SOFIA', 'PUGA', '', '009AST'),
(125, 'ANGELA', 'MUÃ‘OZ', '', '009AST'),
(126, 'VIOLETA MAGDALENA', 'ALVAREZ', '', '005FLI'),
(127, 'SARA', 'ROMERO', '', '005FLI'),
(128, 'CATALINA MAGDALENA', 'ALVAREZ', '', '005FLI'),
(129, 'ALEJANDRA', 'SEPULVEDA', '', '006DIN'),
(130, 'NHELETY', 'VAZQUEZ', '', '006DIN'),
(131, 'SOFIA', 'TORNERO', '', '006DIN'),
(132, 'CARLOTA', 'CID', '', '005FLI'),
(133, 'ELENA', 'SANCHEZ', '', '005FLI'),
(134, 'MARTA', 'CEBRIAN', '', '005FLI'),
(135, 'ALEJANDRO', 'LEIVA', '', '006DIN'),
(136, 'JOEL ', 'GISBERT', '', '006DIN'),
(137, 'SERGIO', 'GALAN', '', '006DIN'),
(138, 'ERIC', 'SALES', '', '006DIN'),
(139, 'DHARMA', 'MATEU', '', '001AND'),
(140, 'MARTA ', 'VIÃ‘EGLA', '', '001AND'),
(141, 'NURIA', 'ANDREU', '', '011MAS'),
(142, 'ANNA', 'DIEZ', '', '011MAS'),
(143, 'AITANA', 'CHESSMAN', '', '001AND'),
(144, 'JARA', 'SOSA', '', '001AND'),
(145, 'MAR', 'PARDO', '', '006DIN'),
(146, 'ANA', 'MARTINEZ', '', '006DIN'),
(147, 'ICIAR', 'JIMENEZ', '', '001AND'),
(148, 'CLAUDIA', 'SICHILG', '', '001AND'),
(149, 'VIOLETA', 'SOSA', '', '001AND'),
(150, 'ROCIO', 'ARTERO', '', '001AND'),
(151, 'ENRIQUE', 'LOPEZ', '', '006DIN'),
(152, 'NOA', 'BELLVER', '', '006DIN'),
(153, 'CLAUDIA', 'CANO', '', '008BAL'),
(154, 'AFRICA', 'CANO', '', '008BAL'),
(155, 'MARTA', 'ARBOL', '', '008BAL'),
(156, 'ELSA', 'PASCUAL', '', '011MAS'),
(157, 'MACARENA', 'SELIB', '', '001AND'),
(158, 'MACARENA', 'SELIGRA', '', '011MAS'),
(159, 'SILVIA', 'OLTRA', '', '011MAS'),
(160, 'CELIA', 'CAÃ‘IZAL', '', '001AND'),
(161, 'PAOLA', 'FERNANDEZ', '', '001AND'),
(162, 'PATRICIA', 'BERTRAN', '', '001AND'),
(163, 'ANA', 'CAÃ‘AS', '', '008BAL'),
(164, 'CARLOTA', 'SANCHEZ', '', '008BAL'),
(165, 'ANA', 'GUTIEEREZ', '', '008BAL'),
(166, 'ZARIA', 'TORNERO', '', '006DIN'),
(167, 'ANDREA', 'BELLVER', '', '006DIN'),
(168, 'BLANCA', 'DOMINGUEZ', '', '001AND'),
(169, 'ELENA', 'FAURA', '', '001AND'),
(170, 'ELVIRA', 'SANCHEZ', '', '008BAL'),
(171, 'ANDREA', 'LARIOS', '', '008BAL'),
(172, 'ESTIBALIZ', 'AZPLAZU', '', '009AST'),
(173, 'JESUS', 'CONEJERO', '', '009AST');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despodium`
--

CREATE TABLE `despodium` (
  `idPodium` tinyint(4) NOT NULL,
  `AUTONOMICO` tinyint(1) NOT NULL,
  `desPodium` varchar(20) NOT NULL,
  `texto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `despodium`
--

INSERT INTO `despodium` (`idPodium`, `AUTONOMICO`, `desPodium`, `texto`) VALUES
(1, 0, 'PODIUM 1 parejas', 'OPEN BASE1 '),
(2, 0, 'Podium2  TRIOS', 'OPEN BASE 1'),
(3, 0, 'PODIUM 3 GG', 'OPEN BASE 1'),
(4, 0, 'PODIUM 4 Parejas', 'OPEN BASE 2'),
(5, 0, 'PODIUM 5 Trios', 'OPEN BASE 2'),
(6, 0, 'PODIUM 6 Grup Grande', 'OPEN BASE 2'),
(8, 0, 'PODIUM 8 MXP MP WP', 'OPEN ALEVIN'),
(9, 0, 'PODIUM 9 TRIO- CUART', 'OPEN ALEVIN'),
(10, 0, 'PODIUM 10 MXP WP MP', 'OPEN INFANTIL'),
(11, 0, 'PODIUM 11 TRIO-CUART', 'OPEN INFANTIL'),
(12, 0, 'PODIUM 12 WP MP MXP', 'OPEN CADETE'),
(13, 0, 'PODIUM 13 WG MG TRIO', 'OPEN CADETE'),
(14, 0, 'PODIUM 14 WP', 'OPEN JUVENIL'),
(15, 0, 'PODIUM 15 WP', 'OPEN JUNIOR 1'),
(21, 1, 'PODIUM21 Trios', 'AUTONOMICO BASE 1'),
(22, 1, 'PODIUM 22 Grup.Gran.', 'AUTONOMICO BASE 1'),
(23, 1, 'PODIUM 23 parejas', 'AUTONOMICO BASE2'),
(24, 1, 'PODIUM 24 Trios', 'AUTONOMICO BASE2'),
(25, 1, 'PODIUM 25 Grup,Gran.', 'AUTONOMICO. BASE2'),
(26, 1, 'PODIUM 26 WP MP MXP', 'AUTONOMICO ALEVIN'),
(27, 1, 'PODIUM 27 WG', 'AUTONOMICO ALEVIN'),
(28, 1, 'PODIUM 28 WP MXP MP', 'AUTONOMICO INFANTIL'),
(29, 1, 'PODIUM 29 WP MXP MP', 'AUTONOMICO. CADETE'),
(30, 1, 'PODIUM 30. MG WG', 'AUTONOMICO CADETE'),
(31, 1, 'PODIUM 31 WP', 'AUTONOMICO JUNIOR 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `CodEsp` varchar(4) NOT NULL,
  `Descripcion` varchar(15) NOT NULL,
  `NumComponentes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`CodEsp`, `Descripcion`, `NumComponentes`) VALUES
('01', 'WP', 2),
('02', 'MP', 2),
('03', 'MXP', 2),
('04', 'GP', 1),
('05', 'GG', 1),
('06', 'WG', 3),
('07', 'PAREJAS', 2),
('08', 'TRIOS', 3),
('09', 'MG', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `CodInscripcion` tinyint(4) NOT NULL,
  `orden` tinyint(6) NOT NULL,
  `CodClub` varchar(6) NOT NULL,
  `CODCAMPEONATO` int(11) NOT NULL,
  `CodCategoria` varchar(6) NOT NULL,
  `CodEspecialidad` varchar(6) NOT NULL,
  `Fecha` date NOT NULL,
  `Autonomico` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`CodInscripcion`, `orden`, `CodClub`, `CODCAMPEONATO`, `CodCategoria`, `CodEspecialidad`, `Fecha`, `Autonomico`) VALUES
(1, 8, '009AST', 1, '07B2', '07', '0000-00-00', 0),
(2, 29, '009AST', 2, '01ALE ', '01', '0000-00-00', 0),
(3, 17, '009AST', 1, '06B1 ', '07', '0000-00-00', 0),
(4, 4, '009AST', 1, '07B2 ', '07', '0000-00-00', 0),
(5, 51, '009AST', 2, '02INF ', '02', '0000-00-00', 0),
(6, 55, '009AST', 2, '02INF ', '06', '0000-00-00', 0),
(8, 32, '001AND', 2, '01ALE ', '02', '0000-00-00', 1),
(9, 40, '001AND', 2, '01ALE ', '06', '0000-00-00', 1),
(10, 34, '001AND', 2, '01ALE ', '06', '0000-00-00', 1),
(11, 37, '001AND', 2, '01ALE ', '06', '0000-00-00', 1),
(12, 26, '001AND', 2, '01ALE ', '01', '0000-00-00', 1),
(13, 14, '001AND', 1, '06B1 ', '05', '0000-00-00', 1),
(14, 11, '001AND', 1, '06B1 ', '05', '0000-00-00', 1),
(15, 12, '001AND', 1, '06B1 ', '05', '0000-00-00', 1),
(16, 13, '001AND', 1, '06B1 ', '05', '0000-00-00', 1),
(17, 15, '001AND', 1, '06B1 ', '05', '0000-00-00', 1),
(18, 24, '001AND', 1, '06B1 ', '08', '0000-00-00', 1),
(19, 21, '001AND', 1, '06B1 ', '08', '0000-00-00', 1),
(20, 25, '001AND', 1, '06B1 ', '08', '0000-00-00', 1),
(21, 19, '001AND', 1, '06B1 ', '08', '0000-00-00', 1),
(22, 1, '001AND', 1, '07B2 ', '05', '0000-00-00', 1),
(23, 2, '001AND', 1, '07B2 ', '05', '0000-00-00', 1),
(24, 7, '001AND', 1, '07B2 ', '07', '0000-00-00', 1),
(25, 69, '001AND', 2, '03CAD ', '06', '0000-00-00', 1),
(26, 62, '001AND', 2, '03CAD ', '01', '0000-00-00', 1),
(27, 60, '001AND', 2, '03CAD ', '01', '0000-00-00', 1),
(28, 64, '001AND', 2, '03CAD ', '01', '0000-00-00', 1),
(29, 65, '001AND', 2, '03CAD ', '01', '0000-00-00', 1),
(30, 52, '001AND', 2, '02INF ', '02', '0000-00-00', 1),
(31, 43, '001AND', 2, '02INF ', '01', '0000-00-00', 1),
(32, 46, '001AND', 2, '02INF ', '01', '0000-00-00', 1),
(33, 72, '001AND', 2, '05JUN ', '01', '0000-00-00', 1),
(34, 70, '008BAL', 2, '03CAD ', '06', '0000-00-00', 0),
(35, 67, '008BAL', 2, '03CAD ', '06', '0000-00-00', 0),
(36, 48, '008BAL', 2, '02INF ', '01', '0000-00-00', 0),
(37, 73, '008BAL', 2, '05JUN ', '01', '0000-00-00', 0),
(38, 41, '006DIN', 2, '01ALE ', '09', '0000-00-00', 0),
(39, 27, '006DIN', 2, '01ALE ', '01', '0000-00-00', 0),
(40, 30, '006DIN', 2, '01ALE ', '01', '0000-00-00', 0),
(41, 35, '006DIN', 2, '01ALE ', '06', '0000-00-00', 0),
(42, 38, '006DIN', 2, '01ALE ', '06', '0000-00-00', 0),
(43, 18, '006DIN', 1, '06B1 ', '07', '0000-00-00', 0),
(44, 20, '006DIN', 1, '06B1 ', '08', '0000-00-00', 0),
(45, 16, '006DIN', 1, '06B1 ', '07', '0000-00-00', 0),
(46, 23, '006DIN', 1, '06B1 ', '08', '0000-00-00', 0),
(47, 6, '006DIN', 1, '07B2 ', '07', '0000-00-00', 0),
(48, 9, '006DIN', 1, '07B2 ', '07', '0000-00-00', 0),
(49, 3, '006DIN', 1, '07B2 ', '08', '0000-00-00', 0),
(50, 66, '006DIN', 2, '03CAD ', '03', '0000-00-00', 0),
(51, 63, '006DIN', 2, '03CAD ', '01', '0000-00-00', 0),
(52, 44, '006DIN', 2, '02INF ', '01', '0000-00-00', 0),
(53, 49, '006DIN', 2, '02INF ', '01', '0000-00-00', 0),
(54, 47, '006DIN', 2, '02INF ', '01', '0000-00-00', 0),
(55, 57, '006DIN', 2, '02INF ', '06', '0000-00-00', 0),
(56, 54, '006DIN', 2, '02INF ', '06', '0000-00-00', 0),
(57, 59, '006DIN', 2, '02INF ', '09', '0000-00-00', 0),
(58, 71, '006DIN', 2, '04JUV ', '01', '0000-00-00', 0),
(59, 33, '005FLI', 2, '01ALE ', '02', '0000-00-00', 0),
(60, 31, '005FLI', 2, '01ALE ', '03', '0000-00-00', 0),
(61, 58, '005FLI', 2, '02INF ', '06', '0000-00-00', 0),
(62, 39, '005FLI', 2, '01ALE ', '06', '0000-00-00', 0),
(63, 45, '005FLI', 2, '02INF ', '01', '0000-00-00', 0),
(64, 50, '005FLI', 2, '02INF ', '03', '0000-00-00', 0),
(65, 56, '005FLI', 2, '02INF ', '06', '0000-00-00', 0),
(66, 53, '005FLI', 2, '02INF ', '06', '0000-00-00', 0),
(67, 36, '011MAS', 2, '01ALE ', '06', '0000-00-00', 0),
(68, 10, '011MAS', 1, '07B2 ', '07', '0000-00-00', 0),
(69, 22, '011MAS', 1, '06B1 ', '08', '0000-00-00', 0),
(70, 68, '011MAS', 2, '03CAD ', '06', '0000-00-00', 0),
(71, 61, '011MAS', 2, '03CAD ', '01', '0000-00-00', 0),
(72, 42, '011MAS', 2, '02INF ', '01', '0000-00-00', 0),
(73, 28, '010GET', 2, '01ALE ', '01', '0000-00-00', 1),
(74, 5, '010GET', 1, '07B2 ', '08', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritas`
--

CREATE TABLE `inscritas` (
  `CodInscripcion` tinyint(4) NOT NULL,
  `CodDep` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscritas`
--

INSERT INTO `inscritas` (`CodInscripcion`, `CodDep`) VALUES
(1, 66),
(1, 67),
(2, 58),
(2, 59),
(3, 27),
(3, 28),
(4, 11),
(4, 12),
(5, 113),
(5, 114),
(6, 123),
(6, 124),
(6, 125),
(8, 64),
(8, 65),
(9, 88),
(9, 89),
(9, 90),
(10, 70),
(10, 71),
(10, 72),
(11, 79),
(11, 80),
(11, 81),
(12, 52),
(12, 53),
(13, 6),
(14, 3),
(15, 4),
(16, 5),
(17, 7),
(18, 46),
(18, 47),
(18, 48),
(19, 37),
(19, 38),
(19, 39),
(20, 49),
(20, 50),
(20, 51),
(21, 31),
(21, 32),
(21, 33),
(22, 1),
(23, 2),
(24, 19),
(24, 20),
(25, 160),
(25, 161),
(25, 162),
(26, 143),
(26, 144),
(27, 139),
(27, 140),
(28, 147),
(28, 148),
(29, 149),
(29, 150),
(30, 115),
(30, 116),
(31, 97),
(31, 98),
(32, 103),
(32, 104),
(33, 168),
(33, 169),
(34, 163),
(34, 164),
(34, 165),
(35, 153),
(35, 154),
(35, 155),
(36, 107),
(36, 108),
(37, 170),
(37, 171),
(38, 91),
(38, 92),
(38, 93),
(38, 94),
(39, 54),
(39, 55),
(40, 60),
(40, 61),
(41, 73),
(41, 74),
(41, 75),
(42, 82),
(42, 83),
(42, 84),
(43, 29),
(43, 30),
(44, 34),
(44, 35),
(44, 36),
(45, 25),
(45, 26),
(46, 43),
(46, 44),
(46, 45),
(47, 17),
(47, 18),
(48, 21),
(48, 22),
(49, 8),
(49, 9),
(49, 10),
(50, 151),
(50, 152),
(51, 145),
(51, 146),
(52, 99),
(52, 100),
(53, 109),
(53, 110),
(54, 105),
(54, 106),
(55, 129),
(55, 130),
(55, 131),
(56, 120),
(56, 121),
(56, 122),
(57, 135),
(57, 136),
(57, 137),
(57, 138),
(58, 166),
(58, 167),
(59, 68),
(59, 69),
(60, 62),
(60, 63),
(61, 132),
(61, 133),
(61, 134),
(62, 85),
(62, 86),
(62, 87),
(63, 101),
(63, 102),
(64, 111),
(64, 112),
(65, 126),
(65, 127),
(65, 128),
(66, 117),
(66, 118),
(66, 119),
(67, 76),
(67, 77),
(67, 78),
(68, 23),
(68, 24),
(69, 40),
(69, 41),
(69, 42),
(70, 156),
(70, 158),
(70, 159),
(71, 141),
(71, 142),
(72, 95),
(72, 96),
(73, 56),
(73, 57),
(74, 14),
(74, 15),
(74, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podium`
--

CREATE TABLE `podium` (
  `idPodium` tinyint(4) NOT NULL,
  `IdCategoria` varchar(6) NOT NULL,
  `IdEspecialidad` varchar(6) NOT NULL,
  `CODCAMPEONATO` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `podium`
--

INSERT INTO `podium` (`idPodium`, `IdCategoria`, `IdEspecialidad`, `CODCAMPEONATO`) VALUES
(1, '06B1', '07', 1),
(2, '06B1', '08', 1),
(3, '06B1', '05', 1),
(4, '07B2', '07', 1),
(5, '07B2', '08', 1),
(6, '07B2', '05', 1),
(8, '01ALE', '01', 2),
(8, '01ALE', '02', 2),
(8, '01ALE', '03', 2),
(9, '01ALE', '06', 2),
(9, '01ALE', '09', 2),
(10, '02INF', '01', 2),
(10, '02INF', '02', 2),
(10, '02INF', '03', 2),
(11, '02INF', '06', 2),
(11, '02INF', '09', 2),
(12, '03CAD', '01', 2),
(12, '03CAD', '02', 2),
(12, '03CAD', '03', 2),
(13, '03CAD', '06', 2),
(13, '03CAD', '09', 2),
(14, '04JUV', '01', 2),
(15, '05JUN', '01', 2),
(21, '06B1', '08', 1),
(22, '06B1', '05', 1),
(23, '06B1', '07', 1),
(24, '06B1', '08', 1),
(25, '07B2', '07', 2),
(26, '01ALE', '01', 2),
(26, '01ALE', '02', 2),
(26, '01ALE', '03', 2),
(27, '01ALE', '06', 2),
(27, '01ALE', '09', 2),
(28, '02INF', '01', 2),
(28, '02INF', '02', 2),
(28, '02INF', '03', 2),
(28, '02INF', '06', 2),
(28, '02INF', '09', 2),
(29, '03CAD', '01', 2),
(30, '03CAD', '06', 2),
(31, '05JUN', '01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoejercicio`
--

CREATE TABLE `tipoejercicio` (
  `CodEjercicio` int(11) NOT NULL,
  `DescEjercicio` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoejercicio`
--

INSERT INTO `tipoejercicio` (`CodEjercicio`, `DescEjercicio`) VALUES
(1, 'Dinamica'),
(2, 'Estatica'),
(3, 'Combinada'),
(4, 'BAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campeonato`
--
ALTER TABLE `campeonato`
  ADD PRIMARY KEY (`CODCAMPEONATO`),
  ADD UNIQUE KEY `NOMBRECAMPEONATO` (`NOMBRECAMPEONATO`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCat`);

--
-- Indices de la tabla `clasificacion`
--
ALTER TABLE `clasificacion`
  ADD PRIMARY KEY (`CodInscripcion`);

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`CodClub`);

--
-- Indices de la tabla `deportistas`
--
ALTER TABLE `deportistas`
  ADD PRIMARY KEY (`CodDeport`,`CodClub`);

--
-- Indices de la tabla `despodium`
--
ALTER TABLE `despodium`
  ADD PRIMARY KEY (`idPodium`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`CodEsp`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`CodInscripcion`,`CodClub`);

--
-- Indices de la tabla `inscritas`
--
ALTER TABLE `inscritas`
  ADD PRIMARY KEY (`CodInscripcion`,`CodDep`);

--
-- Indices de la tabla `podium`
--
ALTER TABLE `podium`
  ADD PRIMARY KEY (`idPodium`,`IdCategoria`,`IdEspecialidad`),
  ADD KEY `IdCategoria` (`IdCategoria`),
  ADD KEY `IdEspecialidad` (`IdEspecialidad`);

--
-- Indices de la tabla `tipoejercicio`
--
ALTER TABLE `tipoejercicio`
  ADD PRIMARY KEY (`CodEjercicio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `podium`
--
ALTER TABLE `podium`
  ADD CONSTRAINT `podium_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `podium_ibfk_2` FOREIGN KEY (`IdEspecialidad`) REFERENCES `especialidad` (`CodEsp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `podium_ibfk_3` FOREIGN KEY (`idPodium`) REFERENCES `despodium` (`idPodium`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{"relation_lines":"true","angular_direct":"direct","snap_to_grid":"off"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

--
-- Volcado de datos para la tabla `pma__export_templates`
--

INSERT INTO `pma__export_templates` (`id`, `username`, `export_type`, `template_name`, `template_data`) VALUES
(1, 'root', 'server', 'campeoinato2', '{"quick_or_custom":"quick","what":"sql","db_select[]":["campeonatos","phpmyadmin","test"],"output_format":"sendit","filename_template":"@SERVER@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Estructura de la tabla @TABLE@","latex_structure_continued_caption":"Estructura de la tabla @TABLE@ (continÃºa)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Contenido de la tabla @TABLE@","latex_data_continued_caption":"Contenido de la tabla @TABLE@ (continÃºa)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","yaml_structure_or_data":"data","":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}'),
(2, 'root', 'server', 'campeonato', '{"quick_or_custom":"quick","what":"sql","db_select[]":["campeonatos","phpmyadmin","test"],"output_format":"sendit","filename_template":"@SERVER@","remember_template":"on","charset":"utf-8","compression":"none","maxsize":"","codegen_structure_or_data":"data","codegen_format":"0","csv_separator":",","csv_enclosed":"\\"","csv_escaped":"\\"","csv_terminated":"AUTO","csv_null":"NULL","csv_structure_or_data":"data","excel_null":"NULL","excel_edition":"win","excel_structure_or_data":"data","htmlword_structure_or_data":"structure_and_data","htmlword_null":"NULL","json_structure_or_data":"data","latex_caption":"something","latex_structure_or_data":"structure_and_data","latex_structure_caption":"Estructura de la tabla @TABLE@","latex_structure_continued_caption":"Estructura de la tabla @TABLE@ (continÃºa)","latex_structure_label":"tab:@TABLE@-structure","latex_relation":"something","latex_comments":"something","latex_mime":"something","latex_columns":"something","latex_data_caption":"Contenido de la tabla @TABLE@","latex_data_continued_caption":"Contenido de la tabla @TABLE@ (continÃºa)","latex_data_label":"tab:@TABLE@-data","latex_null":"\\\\textit{NULL}","mediawiki_structure_or_data":"data","mediawiki_caption":"something","mediawiki_headers":"something","ods_null":"NULL","ods_structure_or_data":"data","odt_structure_or_data":"structure_and_data","odt_relation":"something","odt_comments":"something","odt_mime":"something","odt_columns":"something","odt_null":"NULL","pdf_report_title":"","pdf_structure_or_data":"data","phparray_structure_or_data":"data","sql_include_comments":"something","sql_header_comment":"","sql_compatibility":"NONE","sql_structure_or_data":"structure_and_data","sql_create_table":"something","sql_auto_increment":"something","sql_create_view":"something","sql_procedure_function":"something","sql_create_trigger":"something","sql_backquotes":"something","sql_type":"INSERT","sql_insert_syntax":"both","sql_max_query_size":"50000","sql_hex_for_binary":"something","sql_utc_time":"something","texytext_structure_or_data":"structure_and_data","texytext_null":"NULL","yaml_structure_or_data":"data","":null,"as_separate_files":null,"csv_removeCRLF":null,"csv_columns":null,"excel_removeCRLF":null,"excel_columns":null,"htmlword_columns":null,"json_pretty_print":null,"ods_columns":null,"sql_dates":null,"sql_relation":null,"sql_mime":null,"sql_use_transaction":null,"sql_disable_fk":null,"sql_views_as_tables":null,"sql_metadata":null,"sql_drop_database":null,"sql_drop_table":null,"sql_if_not_exists":null,"sql_truncate":null,"sql_delayed":null,"sql_ignore":null,"texytext_columns":null}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"campeonatos","table":"clasificacion"},{"db":"campeonatos","table":"especialidad"},{"db":"campeonatos","table":"despodium"},{"db":"campeonatos","table":"podium"},{"db":"campeonatos","table":"inscritas"},{"db":"campeonatos","table":"inscripcion"},{"db":"campeonatos","table":"deportistas"},{"db":"campeonatos","table":"categorias"},{"db":"campeonatos","table":"campeonato"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-03-12 11:31:00', '{"lang":"es","collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
