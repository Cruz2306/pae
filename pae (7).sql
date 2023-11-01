-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2023 a las 05:29:02
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int(11) NOT NULL,
  `nombre1` varchar(20) NOT NULL,
  `nombre2` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) DEFAULT NULL,
  `grado` tinyint(4) NOT NULL,
  `jornada` tinyint(4) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `documento` int(11) NOT NULL,
  `qrimage` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `grado`, `jornada`, `id_sede`, `documento`, `qrimage`) VALUES
(123, 'se', 'xo', 'es', 'good', 1, 1, 1, 1, 0x313639383435353834372e706e67),
(444, 'SA', 'JNJ', 'IUBBJ', 'LÑK NKKKM', 1, 1, 1, 3, 0x313639383435363233382e706e67),
(1109187086, 'andres', 'camilo', 'cruz', 'bust', 1, 1, 1, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `idGrado` tinyint(4) NOT NULL,
  `nomGrado` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`idGrado`, `nomGrado`) VALUES
(1, '1101'),
(2, '1002'),
(3, '901');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `idjornada` tinyint(4) NOT NULL,
  `nomjornada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`idjornada`, `nomjornada`) VALUES
(1, 'Única'),
(2, 'Mañana'),
(3, 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idRegistro` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `utilizaServicio` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=No, 1=Si utiliza servicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRoles` tinyint(4) NOT NULL,
  `nombreRol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRoles`, `nombreRol`) VALUES
(1, 'administrador'),
(2, 'docente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre_sede` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre_sede`) VALUES
(1, 'sede central'),
(2, 'sede oriente'),
(3, 'sede jardin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `idDocumento` int(11) NOT NULL,
  `tipoDocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`idDocumento`, `tipoDocumento`) VALUES
(1, 'cedula'),
(3, 'tarjeta extrajera'),
(2, 'tarjeta identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nomUsuario` varchar(30) NOT NULL,
  `apeUsuario` varchar(30) NOT NULL,
  `passUsuario` int(11) NOT NULL,
  `rolUsuario` tinyint(4) NOT NULL COMMENT '1=Administrador, 2=Docente',
  `idDocumento` int(11) NOT NULL COMMENT '1=extranjera 2=cedula 3=tarjeta',
  `numDocumentoo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Administran el sistema PAE';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nomUsuario`, `apeUsuario`, `passUsuario`, `rolUsuario`, `idDocumento`, `numDocumentoo`) VALUES
('santiago', 'escobar', 2323, 2, 2, 1075793620),
('andres', 'cruz', 1234, 1, 2, 1109187086);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `jornada` (`jornada`),
  ADD KEY `grado` (`grado`),
  ADD KEY `TipoDocument` (`documento`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`idjornada`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idRegistro`),
  ADD KEY `idEstudiante` (`idEstudiante`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`idDocumento`),
  ADD KEY `tipoDocumento` (`tipoDocumento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numDocumentoo`),
  ADD KEY `rolUsuario` (`rolUsuario`),
  ADD KEY `document` (`numDocumentoo`),
  ADD KEY `documento` (`numDocumentoo`),
  ADD KEY `Document_2` (`numDocumentoo`),
  ADD KEY `Document2` (`numDocumentoo`),
  ADD KEY `Document3` (`numDocumentoo`),
  ADD KEY `idDocumento` (`idDocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `idGrado` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `idjornada` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRoles` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`id_sede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`jornada`) REFERENCES `jornada` (`idjornada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`grado`) REFERENCES `grados` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante_ibfk_5` FOREIGN KEY (`documento`) REFERENCES `tipodocumento` (`idDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rolUsuario`) REFERENCES `roles` (`idRoles`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idDocumento`) REFERENCES `tipodocumento` (`idDocumento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
