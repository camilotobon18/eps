-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2019 a las 18:24:45
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcita`
--

CREATE TABLE `tblcita` (
  `id` bigint(20) NOT NULL,
  `paciente` bigint(20) NOT NULL,
  `medico` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `observacionescita` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblcita`
--

INSERT INTO `tblcita` (`id`, `paciente`, `medico`, `fecha`, `hora`, `observacionescita`, `fechar`, `fecham`) VALUES
(1, 1, 2, '2019-11-17', '08:00:00', '<p>\n	ninguna</p>\n', '2019-11-03 12:02:38', '2019-11-03 12:02:38'),
(2, 1, 3, '2019-11-19', '06:50:00', '<p>\n	primer cita</p>\n', '2019-11-17 13:06:01', '2019-11-17 13:06:01'),
(3, 1, 1, '2019-11-19', '07:00:00', '<p>\n	validacion, hora, fecha, medico</p>\n', '2019-11-17 13:10:46', '2019-11-17 13:10:46'),
(8, 1, 3, '2019-11-19', '06:10:00', '<p>\n	aa</p>\n', '2019-11-17 17:12:51', '2019-11-17 17:12:51'),
(11, 2, 3, '2019-11-19', '06:20:00', '<p>\n	a</p>\n', '2019-11-17 19:29:34', '2019-11-17 19:29:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblciudad`
--

CREATE TABLE `tblciudad` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblciudad`
--

INSERT INTO `tblciudad` (`id`, `nombre`, `fechar`, `fecham`) VALUES
(1, 'Barbosa', '2019-10-31 22:38:08', '2019-10-31 22:38:08'),
(2, 'Cali', '2019-10-31 22:43:46', '2019-10-31 22:43:46'),
(3, 'Manizalez', '2019-10-31 22:43:46', '2019-10-31 22:43:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblformulamedica`
--

CREATE TABLE `tblformulamedica` (
  `id` bigint(20) NOT NULL,
  `paciente` bigint(20) NOT NULL,
  `medico` int(11) NOT NULL,
  `observaciones` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `referencia1` bigint(20) NOT NULL,
  `cantidad1` int(11) NOT NULL,
  `referencia2` bigint(20) DEFAULT NULL,
  `cantidad2` int(11) DEFAULT NULL,
  `referencia3` bigint(20) DEFAULT NULL,
  `cantidad3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblformulamedica`
--

INSERT INTO `tblformulamedica` (`id`, `paciente`, `medico`, `observaciones`, `fechar`, `fecham`, `referencia1`, `cantidad1`, `referencia2`, `cantidad2`, `referencia3`, `cantidad3`) VALUES
(1, 1, 3, '<p>\n	gripe</p>\n', '2019-11-06 22:34:07', '2019-11-06 22:34:07', 2, 1, 1, 2, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhistoriaclinica`
--

CREATE TABLE `tblhistoriaclinica` (
  `id` bigint(20) NOT NULL,
  `paciente` bigint(20) NOT NULL,
  `medico` bigint(20) NOT NULL,
  `lugarnacimiento` bigint(20) NOT NULL,
  `estatura` decimal(10,0) NOT NULL,
  `peso` decimal(10,0) NOT NULL,
  `profesion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `motivoconsulta` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `antecedentes` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tratamiento` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fechaingreso` date NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblhistoriaclinica`
--

INSERT INTO `tblhistoriaclinica` (`id`, `paciente`, `medico`, `lugarnacimiento`, `estatura`, `peso`, `profesion`, `motivoconsulta`, `antecedentes`, `diagnostico`, `tratamiento`, `fechaingreso`, `fechar`, `fecham`) VALUES
(1, 1, 1, 0, '2', '50', 'Abogado', '<p>\n	gripe</p>\n', '<p>\n	le da mucha gripa seguido&nbsp;</p>\n', '<p>\n	tiene h1n1</p>\n', '<p>\n	acetaminofen</p>\n', '2019-11-01', '2019-11-03 12:19:27', '2019-11-03 12:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblhora`
--

CREATE TABLE `tblhora` (
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblhora`
--

INSERT INTO `tblhora` (`hora`) VALUES
('06:00:00'),
('06:10:00'),
('06:20:00'),
('06:30:00'),
('06:40:00'),
('06:50:00'),
('07:00:00'),
('07:10:00'),
('07:20:00'),
('07:30:00'),
('07:40:00'),
('07:50:00'),
('08:00:00'),
('08:10:00'),
('08:20:00'),
('08:30:00'),
('08:40:00'),
('08:50:00'),
('09:00:00'),
('09:10:00'),
('09:20:00'),
('09:30:00'),
('09:40:00'),
('09:50:00'),
('10:00:00'),
('10:10:00'),
('10:20:00'),
('10:30:00'),
('10:40:00'),
('10:50:00'),
('11:00:00'),
('11:10:00'),
('11:20:00'),
('11:30:00'),
('11:40:00'),
('11:50:00'),
('12:00:00'),
('12:10:00'),
('12:20:00'),
('12:30:00'),
('12:40:00'),
('12:50:00'),
('13:00:00'),
('13:10:00'),
('13:20:00'),
('13:30:00'),
('13:40:00'),
('13:50:00'),
('14:00:00'),
('14:10:00'),
('14:20:00'),
('14:30:00'),
('14:40:00'),
('14:50:00'),
('15:00:00'),
('15:10:00'),
('15:20:00'),
('15:30:00'),
('15:40:00'),
('15:50:00'),
('16:00:00'),
('16:10:00'),
('16:20:00'),
('16:30:00'),
('16:40:00'),
('16:50:00'),
('17:00:00'),
('17:10:00'),
('17:20:00'),
('17:30:00'),
('17:40:00'),
('17:50:00'),
('18:00:00'),
('18:10:00'),
('18:20:00'),
('18:30:00'),
('18:40:00'),
('18:50:00'),
('19:00:00'),
('19:10:00'),
('19:20:00'),
('19:30:00'),
('19:40:00'),
('19:50:00'),
('20:00:00'),
('20:10:00'),
('20:20:00'),
('20:30:00'),
('20:40:00'),
('20:50:00'),
('21:00:00'),
('21:10:00'),
('21:20:00'),
('21:30:00'),
('21:40:00'),
('21:50:00'),
('22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicamento`
--

CREATE TABLE `tblmedicamento` (
  `id` bigint(20) NOT NULL,
  `referencia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblmedicamento`
--

INSERT INTO `tblmedicamento` (`id`, `referencia`, `fechar`, `fecham`) VALUES
(1, 'dolex', '2019-11-06 22:32:35', '2019-11-06 22:32:35'),
(2, 'acetaminofen', '2019-11-06 22:32:47', '2019-11-06 22:32:47'),
(3, 'Citromizina', '2019-11-16 13:06:42', '2019-11-16 13:06:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedico`
--

CREATE TABLE `tblmedico` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` bigint(20) NOT NULL,
  `identificacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblmedico`
--

INSERT INTO `tblmedico` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `direccion`, `ciudad`, `identificacion`, `fechar`, `fecham`) VALUES
(1, 'Pedro', 'Infante', '43434343', 'pedroinfante@gmail.com', 'Cra 10A 20 30', 1, '1111111111111', '2019-11-03 11:20:04', '2019-11-03 11:20:04'),
(2, 'Carlos ', 'Pedraza', '1111222333', 'carlospedraza@gmail.com', 'Trans 38 50 50', 2, '123456789', '2019-11-03 11:29:13', '2019-11-03 11:29:13'),
(3, 'Oscar ', 'Perez', '30055555555', 'oscarperez@gmal.com', 'trans 50 50 50', 3, '98765', '2019-11-03 11:29:52', '2019-11-03 11:29:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpaciente`
--

CREATE TABLE `tblpaciente` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` bigint(20) NOT NULL,
  `identificacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `fechar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecham` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tblpaciente`
--

INSERT INTO `tblpaciente` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `direccion`, `ciudad`, `identificacion`, `observaciones`, `fechar`, `fecham`) VALUES
(1, 'Andres', 'Florez', '4065041', 'camilotobon21@gmail.com', 'CL 9 15 25', 1, '22225544', '<p>\n	Todo Ok</p>\n', '2019-10-31 22:38:50', '2019-10-31 22:38:50'),
(2, 'Juan', 'Gomez', '4065041', 'juan@yahoo.es', 'cl 9 15 20', 2, '1010101010', '<p>\n	a</p>\n', '2019-11-17 19:27:10', '2019-11-17 19:27:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `pkid` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `activo` int(1) NOT NULL,
  `fechar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecham` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`pkid`, `nombre`, `correo`, `telefono`, `clave`, `activo`, `fechar`, `fecham`, `foto`) VALUES
(1, 'camilo', 'camilo@gmail.com', '4061165', '$2y$10$f63D9s/aDBsPXmyTCEE6Ve0pJliIRziiI4R505aOB7r54NaPMEuEK', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0'),
(2, 'Daniel', 'daniel@gmail.com', '3008013743', '$2y$10$BR3l9ehPRCvR1FwZT/orLelJ4cs7h5viL0eSQ96/Kl.aLf2Ul0F0u', 0, '2019-11-03 19:43:08', '2019-11-03 19:43:08', '67a20-fotoperfildaniel.jpg'),
(3, 'Juan Gonzalez', 'administrador@gmail.com', '4061165', '$2y$10$dOGz2VH.fI1iShhxYD0TAO0YfdWmdZpBTLtUeyDkov1X6JpuEG/hC', 0, '2019-11-21 17:16:44', '2019-11-21 17:16:44', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcita`
--
ALTER TABLE `tblcita`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `medico_2` (`medico`,`fecha`,`hora`),
  ADD KEY `medico` (`medico`,`fecha`,`hora`);

--
-- Indices de la tabla `tblciudad`
--
ALTER TABLE `tblciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblformulamedica`
--
ALTER TABLE `tblformulamedica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblhistoriaclinica`
--
ALTER TABLE `tblhistoriaclinica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblhora`
--
ALTER TABLE `tblhora`
  ADD PRIMARY KEY (`hora`);

--
-- Indices de la tabla `tblmedicamento`
--
ALTER TABLE `tblmedicamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmedico`
--
ALTER TABLE `tblmedico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `por_identificacion` (`identificacion`),
  ADD KEY `por_correo` (`email`);

--
-- Indices de la tabla `tblpaciente`
--
ALTER TABLE `tblpaciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `por_identificacion` (`identificacion`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`pkid`),
  ADD UNIQUE KEY `porcorreo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcita`
--
ALTER TABLE `tblcita`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tblciudad`
--
ALTER TABLE `tblciudad`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblformulamedica`
--
ALTER TABLE `tblformulamedica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblhistoriaclinica`
--
ALTER TABLE `tblhistoriaclinica`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblmedicamento`
--
ALTER TABLE `tblmedicamento`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmedico`
--
ALTER TABLE `tblmedico`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblpaciente`
--
ALTER TABLE `tblpaciente`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `pkid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
