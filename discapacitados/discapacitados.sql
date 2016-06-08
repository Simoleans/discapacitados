-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2015 a las 04:52:31
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `discapacitados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_discapacitado`
--

CREATE TABLE IF NOT EXISTS `reg_discapacitado` (
  `ID` int(5) NOT NULL,
  `Cedula` varchar(8) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(150) NOT NULL,
  `Fecha` varchar(15) NOT NULL,
  `Edad` varchar(3) NOT NULL,
  `Direccion` varchar(220) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Carnet` varchar(2) NOT NULL,
  `Pensionado` varchar(2) NOT NULL,
  `Tipo` varchar(65) NOT NULL,
  `Observaciones` varchar(180) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reg_discapacitado`
--

INSERT INTO `reg_discapacitado` (`ID`, `Cedula`, `Nombre`, `Apellido`, `Fecha`, `Edad`, `Direccion`, `Sexo`, `Carnet`, `Pensionado`, `Tipo`, `Observaciones`) VALUES
(3, '12598789', 'Fran', 'rodriguez', '12/08/1978', '78', 'cagua', 'Femenino', 'Si', 'Si', 'Trastornos del habla y del lenguaje', 'ninguna'),
(4, '2033632', 'Jhoandri', 'Molina', '12/05/1972', '75', 'cagua', 'Masculino', 'Si', 'Si', 'Discapacidad intelectual', 'ninguna'),
(6, '20990397', 'fRANCISCO jOSE', 'hERNANDEZ cORDERO', '02/07/2015', '81', 'CAGUA', 'Masculino', 'Si', 'Si', 'PÃ©rdida de la memoria', 'NINGUNA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_usu`
--

CREATE TABLE IF NOT EXISTS `reg_usu` (
  `Cedula` int(8) NOT NULL,
  `Nivel` enum('a','u') NOT NULL DEFAULT 'u',
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Contrasena` varchar(10) NOT NULL,
  `Repetir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reg_usu`
--

INSERT INTO `reg_usu` (`Cedula`, `Nivel`, `Nombre`, `Apellido`, `Contrasena`, `Repetir`) VALUES
(8, 'u', 'Francisco Jose', 'ggggfgfgf', '12345', '12345'),
(9, 'u', 'Zulima', 'cordero', '9', '9'),
(121212, 'u', 'Franchesko', 'josefo', '121212', '121212'),
(123456, 'u', 'ronaldo', 'kaka', '123456', '123456'),
(456789, 'u', 'Zulima', 'jhoandri', '123456', '123456'),
(999999, 'u', 'Jose Gregorio', 'oquendo', '999999', '999999'),
(7288045, 'u', 'Zulima', 'cordero', '7288045', '7288045'),
(20336372, 'u', 'ORLANDO', 'PEREZ', '123456', '1234567'),
(20990397, 'a', 'Francisco', 'Hernandez', '20990397', '20990397');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reg_discapacitado`
--
ALTER TABLE `reg_discapacitado`
  ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `reg_usu`
--
ALTER TABLE `reg_usu`
  ADD PRIMARY KEY (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reg_discapacitado`
--
ALTER TABLE `reg_discapacitado`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
