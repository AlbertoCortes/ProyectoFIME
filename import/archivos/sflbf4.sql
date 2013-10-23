-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-10-2013 a las 02:48:15
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sflbf4`
--
CREATE DATABASE IF NOT EXISTS `sflbf4` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sflbf4`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Apellido_Paterno` varchar(40) NOT NULL,
  `Apellido_Materno` varchar(40) NOT NULL,
  `Usuario` varchar(15) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Telefono` bigint(20) NOT NULL,
  `Fecha_de_Nacimiento` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Privilegios` int(1) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla de administradores del sistema' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Usuario`, `Pass`, `Telefono`, `Fecha_de_Nacimiento`, `Email`, `Privilegios`) VALUES
(1, 'Alberto', 'Cortes', 'Blanco', 'AlbertoCortes', 'cortes', 10962100, '1993-08-03', 'c.n.albertocortes@hotmail.com', 1),
(2, 'Jonathan', 'Guerra', 'Virgilio', 'jguerra', '1107', 81157686, '1993-07-30', 'jona_fgv@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int(10) NOT NULL AUTO_INCREMENT,
  `Matricula` int(10) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido_Paterno` varchar(40) NOT NULL,
  `Apellido_Materno` varchar(40) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Pass` varchar(15) NOT NULL,
  `Telefono` bigint(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Fecha_de_Nacimiento` date NOT NULL,
  PRIMARY KEY (`id_alumno`),
  UNIQUE KEY `Matricula` (`Matricula`,`Usuario`,`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla de alumnos' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `Matricula`, `Nombre`, `Apellido_Paterno`, `Apellido_Materno`, `Usuario`, `Pass`, `Telefono`, `Email`, `Fecha_de_Nacimiento`) VALUES
(1, 1620453, 'Jose Guadalupe', 'Cortez', 'Blanco', 'jose', 'cortez', 12321233, 'acdc_jgcb@hotmail.com', '1995-12-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigadas`
--

CREATE TABLE IF NOT EXISTS `brigadas` (
  `id_brigada` int(5) NOT NULL,
  `Maestro` varchar(100) NOT NULL,
  `Dia` varchar(10) NOT NULL,
  `Hora` varchar(10) NOT NULL,
  `Salon` varchar(10) NOT NULL,
  `NumAlumnos` int(2) NOT NULL,
  `Disponibilidad` tinyint(1) NOT NULL,
  UNIQUE KEY `id_brigada` (`id_brigada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de todas las brigadas';

--
-- Volcado de datos para la tabla `brigadas`
--

INSERT INTO `brigadas` (`id_brigada`, `Maestro`, `Dia`, `Hora`, `Salon`, `NumAlumnos`, `Disponibilidad`) VALUES
(0, 'Maestro', 'Lunes', 'M1-M2', '', 0, 1),
(23, 'Maestro', 'Lunes', 'M1-M2', '', 0, 0),
(123, 'Alberto', 'Miercoles', 'V3-V4', '453', 30, 1),
(512, 'Sfs', 'Lunes', 'M1-M2', '123213', 23, 1),
(513, 'Alberto', 'Martes', 'M5-M6', '6f12', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigada_512`
--

CREATE TABLE IF NOT EXISTS `brigada_512` (
  `Matricula` int(12) DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `AperllidoPaterno` varchar(60) DEFAULT NULL,
  `ApellidoMaterno` varchar(60) DEFAULT NULL,
  `Asistencia` tinyint(1) DEFAULT NULL,
  `Retardo` tinyint(1) DEFAULT NULL,
  `Falta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigada_513`
--

CREATE TABLE IF NOT EXISTS `brigada_513` (
  `Matricula` int(12) DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `AperllidoPaterno` varchar(60) DEFAULT NULL,
  `ApellidoMaterno` varchar(60) DEFAULT NULL,
  `Asistencia` tinyint(1) DEFAULT NULL,
  `Retardo` tinyint(1) DEFAULT NULL,
  `Falta` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `id_docente` int(3) NOT NULL AUTO_INCREMENT,
  `NumerodeEmpleado` int(20) NOT NULL,
  `Maestro` varchar(100) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Pass` varchar(20) NOT NULL,
  `Telefono` bigint(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Fecha_de_Nacimiento` date NOT NULL,
  `Privilegios` int(1) NOT NULL,
  PRIMARY KEY (`id_docente`),
  UNIQUE KEY `NumerodeEmpleado` (`NumerodeEmpleado`,`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de docentes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inf_practicas`
--

CREATE TABLE IF NOT EXISTS `inf_practicas` (
  `id_practica` int(2) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Descripcion` varchar(80) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  PRIMARY KEY (`id_practica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Taba de informacion de las practicas';

--
-- Volcado de datos para la tabla `inf_practicas`
--

INSERT INTO `inf_practicas` (`id_practica`, `Nombre`, `Descripcion`, `FechaInicio`, `FechaFin`) VALUES
(1, 'Practica #1', 'Introduccion al laboratorio y discusión de video de optica', '2013-08-19', '2013-08-23'),
(2, 'Practica #2', 'Estudio del fenómeno de reflexión de la luz', '2013-08-26', '2013-08-30'),
(3, 'Practica #3', 'Estudio del fenomeno de refraccion de la luz', '2013-09-02', '2013-09-06'),
(4, 'Practica #4', 'Estudio de las lentes', '2013-09-09', '2013-09-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
